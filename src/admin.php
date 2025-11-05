<?php
session_start();
date_default_timezone_set('Asia/Manila');

if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

include 'config.php';

$sales_result = $conn->query("SELECT SUM(total_sales) AS total_sales FROM sales");
$sales_row = $sales_result->fetch_assoc();
$total_sales = $sales_row['total_sales'] ?? 0;

$orders_result = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$orders_row = $orders_result->fetch_assoc();
$total_orders = $orders_row['total_orders'] ?? 0;

$users_result = $conn->query("SELECT COUNT(*) AS total_users FROM users");
$users_row = $users_result->fetch_assoc();
$total_users = $users_row['total_users'] ?? 0;

$coffee_result = $conn->query("SELECT COUNT(*) AS total_coffee_products FROM coffee_products");
$coffee_row = $coffee_result->fetch_assoc();
$total_coffee_products = $coffee_row['total_coffee_products'] ?? 0;

$seasonal_result = $conn->query("SELECT COUNT(*) AS total_seasonal_products FROM seasonal_products");
$seasonal_row = $seasonal_result->fetch_assoc();
$total_seasonal_products = $seasonal_row['total_seasonal_products'] ?? 0;

$cultural_result = $conn->query("SELECT COUNT(*) AS total_cultural_products FROM cultural_products");
$cultural_row = $cultural_result->fetch_assoc();
$total_cultural_products = $cultural_row['total_cultural_products'] ?? 0;

$total_products = $total_coffee_products + $total_seasonal_products + $total_cultural_products;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="assets/images/coffee.png" type="image/x-icon" />
  <title>Kape't Ani Admin | Dashboard</title>
  <link rel="stylesheet" href="admin.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar">
    <div class="logo">
      <img src="assets/images/kape't_ani_logo_white.png" alt="Kape't Ani Logo">
      <h1>Kape’t Ani Admin</h1>
    </div>
    <ul class="nav-links">
      <li><a href="admin.php" class="active">Dashboard</a></li>
      <li><a href="user_admin.php">Users</a></li>
      <li><a href="product_admin.php">Products</a></li>
      <li><a href="order_admin.php">Orders</a></li>
      <li><a href="inventory.php">Alerts</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </nav>

  <main class="dashboard">
    <h2>Dashboard Overview</h2>
    <p class="last-updated">Last updated: <?= date("F j, Y, g:i a") ?></p>

    <div class="cards">
      <div class="card">
        <i class="ri-shopping-bag-3-line"></i>
        <div>
          <h3>Sales</h3>
          <p>₱<?= number_format($total_sales, 2) ?></p>
        </div>
      </div>
      <div class="card">
        <i class="ri-file-list-line"></i>
        <div>
          <h3>Orders</h3>
          <p><?= $total_orders ?></p>
        </div>
      </div>
      <div class="card">
        <i class="ri-user-3-line"></i>
        <div>
          <h3>Users</h3>
          <p><?= $total_users ?></p>
        </div>
      </div>
      <div class="card">
        <i class="ri-cup-line"></i>
        <div>
          <h3>Products</h3>
          <p><?= $total_products ?></p>
        </div>
      </div>
    </div>
  </main>
</body>

</html>