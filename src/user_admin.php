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
  <title>Kape't Ani Admin | Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="admin.css" />
</head>

<body>
  <nav class="navbar">
    <div class="logo">
      <img src="assets/images/kape't_ani_logo_white.png" alt="Kape't Ani Logo">
      <h1>Kape’t Ani Admin</h1>
    </div>
    <ul class="nav-links">
      <li><a href="admin.php">Dashboard</a></li>
      <li><a href="user_admin.php">Users</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">Orders</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </nav>


  <section class="table-section py-5">
    <div class="container">
      <div class="row align-items-start">

        <div class="col-lg-6">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $res = mysqli_query($conn, 'select * from users');
              while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['role']}</td>";
                echo "<td><a href='edit.php?id={$row['id']}' class='btn btn-success'>Edit</a></td>";
                echo "<td><a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </section>
</body>

</html>