<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

$order = isset($_SESSION['order_details']) ? $_SESSION['order_details'] : null;

if (!$order) {
  header("Location: index.php");
  exit();
}

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Confirmation | Kape’t Ani Coffee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="order_confirmation.css" />
</head>

<body>
  <section class="order-confirmation-container">
    <div class="order-confirmation-card">
      <div class="return-bar mb-4">
        <button class="btn-return" onclick="window.location.href='product_user.php'">← Back to Shop</button>
      </div>

      <h2 class="order-confirmation-title mb-4">Order Confirmed</h2>

      <!-- Order Details -->
      <div class="order-details">
        <p><strong>Order Number:</strong> <?= $order['tracking_no'] ?></p>
        <p><strong>Total Amount:</strong> ₱<?= number_format($order['total_amount'], 2) ?> Php</p>

        <h4 class="mt-4">Items Ordered:</h4>
        <ul class="order-items-list">
          <?php foreach ($order['cart_data'] as $item): ?>
            <li class="d-flex justify-content-between align-items-center mb-2">
              <div class="d-flex align-items-center">
                <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>" width="65" height="65" class="me-2 rounded">
                <div>
                  <strong><?= $item['name'] ?></strong><br>
                  <small>₱<?= number_format(floatval(str_replace("₱", "", $item['price'])), 2) ?> x <?= $item['qty'] ?></small>
                </div>
              </div>
              <div>₱<?= number_format(floatval(str_replace("₱", "", $item['price'])) * $item['qty'], 2) ?></div>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="order-summary">
          <h5>Total Amount:</h5>
          <p>₱<?= number_format($order['total_amount'], 2) ?> Php</p>
        </div>

        <div class="confirmation-message mt-4">
          <h3>Thank you for your purchase!</h3>
          <p>Your order is confirmed.</p>
          <p>We are processing your order and will notify you once it ships.</p>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>