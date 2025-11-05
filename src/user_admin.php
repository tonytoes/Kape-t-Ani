<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="assets/images/coffee.png" type="image/x-icon" />
  <title>Kape't Ani Admin | Users</title>

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="user_admin.css" />
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
      <li><a href="user_admin.php" class="active">Users</a></li>
      <li><a href="product_admin.php">Products</a></li>
      <li><a href="order_admin.php">Orders</a></li>
      <li><a href="inventory.php">Alerts</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </nav>

  <!-- MAIN CONTENT -->
  <section class="table-section py-5">
    <div class="container">
      <h2 class="mb-4">User Management</h2>

      <div class="table-container">
        <table class="styled-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $res = mysqli_query($conn, 'SELECT * FROM users');
            while ($row = mysqli_fetch_array($res)) {
              echo "<tr>";
              echo "<td>{$row['id']}</td>";
              echo "<td>{$row['first_name']}</td>";
              echo "<td>{$row['last_name']}</td>";
              echo "<td>{$row['email']}</td>";
              echo "<td>{$row['role']}</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

</body>
</html>
