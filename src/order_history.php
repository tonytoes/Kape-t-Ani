<?php
// order_history.php
$currency_symbol = "₱";
$currency_code = "PHP";

// Example data (replace later with database query)
$orders = [
  ["2025-10-21", "Kape’t Ani Arabica Blend", "2025-10-25", "★★★★★"],
  ["2025-09-15", "Barako Brew", "2025-09-20", "★★★★☆"],
  ["2025-08-05", "Hazelnut Coffee", "2025-08-09", "★★★☆☆"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order History | Kape’t Ani Coffee</title>

  <link rel="icon" href="assets/images/coffee.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="order_history.css" />
</head>

<body>
  <!-- ===== BRAND LOGO (top-right) ===== -->
  <header class="brand-header">
    <img src="assets/images/KA LOGO.png" alt="Kape’t Ani Logo" class="brand-logo" onclick="window.location.href='index.php'">
  </header>

  <!-- ===== RETURN BUTTON ===== -->
  <div class="return-bar">
    <button class="btn-return" onclick="window.location.href='product_user.php'">← Return to Shop</button>
  </div>

  <!-- ===== ORDER HISTORY SECTION ===== -->
  <section class="history-container">
    <div class="history-card">
      <h2 class="history-title mb-4">Your Order History</h2>

      <div class="table-responsive">
        <table class="table table-hover align-middle table-custom">
          <thead>
            <tr>
              <th>Date Ordered</th>
              <th>Product</th>
              <th>Date Received</th>
              <th>Ratings</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $order): ?>
              <tr>
                <td><?= htmlspecialchars($order[0]) ?></td>
                <td><?= htmlspecialchars($order[1]) ?></td>
                <td><?= htmlspecialchars($order[2]) ?></td>
                <td><?= htmlspecialchars($order[3]) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
