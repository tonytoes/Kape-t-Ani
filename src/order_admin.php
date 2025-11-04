<?php
include "config.php";

// Start session and check if the admin is logged in
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

// Fetch all pending orders
$orders_result = $conn->query("SELECT * FROM orders WHERE status = 0 ORDER BY created_at DESC");

$orders = [];

while ($order = $orders_result->fetch_assoc()) {
  $order_id = $order['id'];

  $items_result = $conn->query("
        SELECT oi.qty, oi.price, oi.prod_id,
               COALESCE(cp.name, 'Unknown Product') AS product_name
        FROM order_items oi
        LEFT JOIN coffee_products cp ON oi.prod_id = cp.id
        WHERE oi.order_id = $order_id
    ");

  $items = [];
  while ($item = $items_result->fetch_assoc()) {
    $items[] = $item;
  }
  $order['items'] = $items;
  $orders[] = $order;
}

if (isset($_POST['accept_order'])) {
  $order_id = $_POST['order_id'];

  $stock_check_failed = false;
  $order_items_result = $conn->query("SELECT * FROM order_items WHERE order_id = $order_id");

  while ($item = $order_items_result->fetch_assoc()) {
    $prod_id = $item['prod_id'];
    $ordered_qty = $item['qty'];

    $product_result = $conn->query("SELECT qty FROM coffee_products WHERE id = $prod_id");
    $product = $product_result->fetch_assoc();

    if ($product['qty'] < $ordered_qty) {
      $stock_check_failed = true;
      echo "<script>alert('Not enough stock for product ID $prod_id.');</script>";
      break;
    }
  }

  if (!$stock_check_failed) {

    $update_order_status = $conn->prepare("UPDATE orders SET status = 1 WHERE id = ?");
    $update_order_status->bind_param("i", $order_id);
    $update_order_status->execute();
    $update_order_status->close();

    $order_result = $conn->query("SELECT total_price FROM orders WHERE id = $order_id");
    $order = $order_result->fetch_assoc();
    $total_price = $order['total_price'];

    // Update the total sales in the database (only after confirmation)
    $update_sales = $conn->prepare("UPDATE sales SET total_sales = total_sales + ? WHERE id = 1");
    $update_sales->bind_param("d", $total_price);  // Assuming there's a sales table with id=1
    $update_sales->execute();
    $update_sales->close();

    $order_items_result->data_seek(0);
    while ($item = $order_items_result->fetch_assoc()) {
      $prod_id = $item['prod_id'];
      $qty = $item['qty'];

      $product_result = $conn->query("SELECT * FROM coffee_products WHERE id = $prod_id");
      $product = $product_result->fetch_assoc();

      $new_qty = $product['qty'] - $qty;
      $update_product_stock = $conn->prepare("UPDATE coffee_products SET qty = ? WHERE id = ?");
      $update_product_stock->bind_param("ii", $new_qty, $prod_id);
      $update_product_stock->execute();
      $update_product_stock->close();
    }

    echo "<script>
              alert('Order accepted and inventory updated!');
              window.location.href = 'order_admin.php';
          </script>";
  }
}

// Handle order cancellation
if (isset($_POST['cancel_order'])) {
  $order_id = $_POST['order_id'];

  // Mark the order as cancelled (status = 2)
  $update_order_status = $conn->prepare("UPDATE orders SET status = 2 WHERE id = ?");
  $update_order_status->bind_param("i", $order_id);
  $update_order_status->execute();
  $update_order_status->close();

  echo "<script>
              alert('Order cancelled!');
              window.location.href = 'order_admin.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Admin | Kape't Ani</title>
  <link rel="icon" href="assets/images/coffee.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="product_admin.css">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">
      <img src="assets/images/kape't_ani_logo_white.png" alt="Kape't Ani Logo">
      <h1>Kape’t Ani Admin</h1>
    </div>
    <ul class="nav-links">
      <li><a href="admin.php">Dashboard</a></li>
      <li><a href="user_admin.php">Users</a></li>
      <li><a href="product_admin.php">Products</a></li>
      <li><a href="order_admin.php">Orders</a></li>
      <li><a href="inventory.php">Alerts</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </nav>

  <!-- Orders List Section -->
  <div class="container my-5">
    <h2 class="fw-bold text-brown mb-4">Manage Orders</h2>

    <?php if (empty($orders)): ?>
      <p class="text-center">No pending orders found.</p>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Tracking No</th>
              <th>Date Ordered</th>
              <th>Products</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $order): ?>
              <tr>
                <td><?= htmlspecialchars($order['tracking_no']) ?></td>
                <td><?= date("M d, Y H:i", strtotime($order['created_at'])) ?></td>
                <td>
                  <ul class="mb-0">
                    <?php foreach ($order['items'] as $item): ?>
                      <li><?= htmlspecialchars($item['product_name']) ?> x <?= $item['qty'] ?> (<?= '₱' . number_format($item['price'], 2) ?>)</li>
                    <?php endforeach; ?>
                  </ul>
                </td>
                <td><?= '₱' . number_format($order['total_price'], 2) ?></td>
                <td>
                  <?php if ($order['status'] == 0): ?>
                    <span class="badge bg-warning">Pending</span>
                  <?php else: ?>
                    <span class="badge bg-success">Completed</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($order['status'] == 0): ?>
                    <form method="POST" class="d-inline">
                      <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                      <button type="submit" name="accept_order" class="btn btn-success btn-sm">Accept</button>
                      <button type="submit" name="cancel_order" class="btn btn-danger btn-sm">Cancel</button>
                    </form>
                  <?php else: ?>
                    <span class="badge bg-secondary">Completed</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>