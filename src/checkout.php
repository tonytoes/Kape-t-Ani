<?php
// checkout.php
// Currency setup
$currency_symbol = "₱";
$currency_code = "PHP";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout | Kape’t Ani Coffee</title>

  <link rel="icon" href="assets/images/coffee.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="checkout.css" />
</head>

<body>
  <!-- BRAND LOGO -->
  <header class="brand-header">
    <img src="assets/images/KA LOGO.png" alt="Kape’t Ani Logo" class="brand-logo" onclick="window.location.href='index.php'">
  </header>

  <section class="checkout-container">
    <div class="checkout-card">
      <div class="return-bar mb-4">
        <button class="btn-return" onclick="history.back()">← Return</button>
      </div>

      <div class="row g-5">
        <!-- LEFT SIDE: SHIPPING + PAYMENT -->
        <div class="col-lg-7 col-md-12">
          <h2 class="checkout-title mb-4">Checkout</h2>

          <!-- Shipping -->
          <div class="section-block mb-4">
            <h5>Shipping Details</h5>
            <p id="shipping-info">
              <?php
                // Replace with session or database data later
                // echo htmlspecialchars($_SESSION['user_name'] ?? 'John Doe') . "<br>";
                // echo htmlspecialchars($_SESSION['user_address'] ?? '123 Street, City, Philippines');
              ?>
            </p>
          </div>

          <!-- Payment -->
          <div class="section-block mb-4">
            <h5>Payment Details</h5>
            <form id="paymentForm" method="POST" action="">
              <div class="mb-3">
                <label class="form-label">Name on Card</label>
                <input type="text" id="cardName" class="form-control" name="cardName" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Card Number</label>
                <input type="text" id="cardNumber" class="form-control" name="cardNumber" placeholder="4534 5555 5555 5555" maxlength="19" required />
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <label class="form-label">Valid Through</label>
                  <input type="text" id="validThrough" class="form-control" name="validThrough" placeholder="MM/YY" maxlength="5" required />
                </div>
                <div class="col-6 mb-3">
                  <label class="form-label">CVC Code</label>
                  <input type="text" id="cvcCode" class="form-control" name="cvcCode" maxlength="3" required />
                </div>
              </div>
              <button type="submit" class="btn btn-custom w-100 mt-3">
                PURCHASE <span id="totalAmount"><?= $currency_symbol ?>0.00 Php</span>
              </button>
            </form>
          </div>
        </div>

        <!-- RIGHT SIDE: ORDER SUMMARY -->
        <div class="col-lg-5 col-md-12">
          <div class="section-block">
            <h5>Your Order</h5>
            <div id="orderItems" class="order-list">
              <!-- Example cart items can be rendered here dynamically later -->
            </div>

            <hr>
            <div class="d-flex justify-content-between">
              <span>Subtotal</span>
              <span id="subtotal"><?= $currency_symbol ?>0.00 Php</span>
            </div>
            <div class="d-flex justify-content-between">
              <span>Shipping</span>
              <span id="shipping"><?= $currency_symbol ?>0.00 Php</span>
            </div>
            <div class="d-flex justify-content-between fw-bold mt-2">
              <span>Total</span>
              <span id="total"><?= $currency_symbol ?>0.00 Php</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="checkout.js"></script>
</body>
</html>
