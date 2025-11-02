<?php
// checkout.php
// Currency setup
$currency_symbol = "₱";
$currency_code = "PHP";

include 'config.php';
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

          <!-- Payment -->
          <div class="section-block mb-4">
            <h5>Shipping Details</h5>
            <form id="paymentForm" method="POST" action="">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="*Full Name" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Delivery Adress</label>
                <input type="email" class="form-control" name="address" placeholder="Street Name, Building, House No." required />
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" placeholder="09*********" maxlength="5" required />
                </div>
                <div class="col-6 mb-3">
                  <label class="form-label">Postal Code</label>
                  <input type="text" class="form-control" name="postalcode" maxlength="4" placeholder="Postal Code" required />
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