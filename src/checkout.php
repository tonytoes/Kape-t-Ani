<?php
$currency_symbol = "₱";
$currency_code = "PHP";

include 'config.php';
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
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

          <div class="section-block mb-4">
            <h5>Shipping Details</h5>
            <form id="paymentForm" method="POST" action="placeorder.php">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="*Full Name" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Delivery Address</label>
                <input type="text" class="form-control" name="address" placeholder="Street Name, Building, House No." required />
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" placeholder="09*********" maxlength="11" required />
                </div>
                <div class="col-6 mb-3">
                  <label class="form-label">Postal Code</label>
                  <input type="text" class="form-control" name="postalcode" maxlength="4" placeholder="Postal Code" required />
                </div>
              </div>
              <input type="hidden" name="cart_data" id="cartData">
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
            <div id="orderItems" class="order-list"></div>

            <hr>
            <div class="d-flex justify-content-between">
              <span>Subtotal</span>
              <span id="subtotal"><?= $currency_symbol ?>0.00 Php</span>
            </div>
            <div class="d-flex justify-content-between">
              <span>Shipping</span>
              <span id="shipping"><?= $currency_symbol ?>0.00 Php</span>
            </div>
            <div class="d-flex justify-content-between">
              <span>Discount</span>
              <span id="discount"><?= $currency_symbol ?>0.00 Php</span>
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

  <!-- ============ PROMO DETECTION ============ -->
  <script>
    function isPromoActive() {
      const now = new Date();
      const day = now.getDay();
      const hour = now.getHours();
      return day === 2 && hour >= 20 && hour < 24;
    }
    window.isPromoActive = isPromoActive;
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const orderItemsEl = document.getElementById('orderItems');
      const subtotalEl = document.getElementById('subtotal');
      const shippingEl = document.getElementById('shipping');
      const discountEl = document.getElementById('discount');
      const totalEl = document.getElementById('total');
      const totalAmountEl = document.getElementById('totalAmount');

      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      let subtotal = 0;
      const shipping = 50;
      let discount = 0;

      // Check if promo is active
      if (window.isPromoActive && window.isPromoActive()) {
        discount = 50;
        discountEl.innerHTML = `<span class="text-success">₱50.00 Php</span>`;
      } else {
        // Promo expired → show visually “struck through ₱50” and new ₱0.00
        discountEl.innerHTML = `<span style="text-decoration: line-through; color: gray;">₱50.00</span> → <span class="text-danger">₱0.00 Php</span>`;
      }

      // Build order list and calculate subtotal
      orderItemsEl.innerHTML = cart.map(item => {
        const priceNumber = parseFloat(item.price.replace("₱", ""));
        const totalItem = priceNumber * item.qty;
        subtotal += totalItem;

        return `
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center">
              <img src="${item.img}" alt="${item.name}" width="65" height="65" class="me-2 rounded">
              <div>
                <strong>${item.name}</strong><br>
                <small>₱${priceNumber.toFixed(2)} x ${item.qty}</small>
              </div>
            </div>
            <div>₱${totalItem.toFixed(2)}</div>
          </div>
        `;
      }).join('');

      const total = subtotal + shipping - discount;

      subtotalEl.textContent = "₱" + subtotal.toFixed(2);
      shippingEl.textContent = "₱" + shipping.toFixed(2);
      totalEl.textContent = "₱" + total.toFixed(2);
      totalAmountEl.textContent = "₱" + total.toFixed(2) + " Php";

      // Handle form submission
      const form = document.getElementById('paymentForm');
      form.addEventListener('submit', (e) => {
        e.preventDefault();

        if (cart.length === 0) {
          alert("Your cart is empty!");
          return;
        }

        document.getElementById('cartData').value = JSON.stringify(cart);
        form.submit();
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="checkout.js"></script>
</body>
</html>
