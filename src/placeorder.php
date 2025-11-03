<?php
session_start();
include 'config.php';

if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

$tracking_no = 'ANI' . rand(100000, 999999);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $user_email = $_SESSION['email'];

  $name = $_POST['first_name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $postalcode = $_POST['postalcode'];
  $cart_data = json_decode($_POST['cart_data'], true);

  $total_amount = 0;
  foreach ($cart_data as $item) {
    $price = floatval(str_replace("₱", "", $item['price']));
    $total_amount += $price * $item['qty'];
  }

  $shipping = 50;
  $total_amount += $shipping;

  $stmt = $conn->prepare("
    INSERT INTO orders (tracking_no, user_id, name, email, address, phone, postalcode, total_price, status, created_at) 
    VALUES (?, 0, ?, ?, ?, ?, ?, ?, 0, NOW())
  ");
  $stmt->bind_param("ssssssd", $tracking_no, $name, $user_email, $address, $phone, $postalcode, $total_amount);
  $stmt->execute();
  $order_id = $stmt->insert_id;
  $stmt->close();

  foreach ($cart_data as $item) {
    $prod_id = $item['id'];
    $qty = $item['qty'];
    $price = floatval(str_replace("₱", "", $item['price']));

    $stmt = $conn->prepare("
      INSERT INTO order_items (order_id, prod_id, qty, price, created_at)
      VALUES (?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("iiid", $order_id, $prod_id, $qty, $price);
    $stmt->execute();
    $stmt->close();
  }

  echo "<script>
          localStorage.removeItem('cart');
          alert('Order placed successfully! Your tracking number: $tracking_no');
          window.location.href = 'order_history.php';
        </script>";
}
