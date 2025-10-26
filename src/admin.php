<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kape't Ani Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css" />
  <script src="main" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">
      <img src="assets/images/kape't_ani_logo_white.png" alt="Kape't Ani Logo">
      <h1>Kape’t Ani Admin</h1>
    </div>
    <ul class="nav-links">
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">Orders</a></li>
      <li><a href="#">Users</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="#" class="logout">Logout</a></li>
    </ul>
  </nav>

  <!-- MAIN CONTENT -->
  <main class="dashboard">
    <h2>Dashboard Overview</h2>
    <div class="cards">
      <div class="card">
        <i class="ri-shopping-bag-3-line"></i>
        <div>
          <h3>Sales</h3>
          <p>₱25,000</p>
        </div>
      </div>
      <div class="card">
        <i class="ri-file-list-line"></i>
        <div>
          <h3>Orders</h3>
          <p>320</p>
        </div>
      </div>
      <div class="card">
        <i class="ri-user-3-line"></i>
        <div>
          <h3>Users</h3>
          <p>150</p>
        </div>
      </div>
      <div class="card">
        <i class="ri-cup-line"></i>
        <div>
          <h3>Products</h3>
          <p>42</p>
        </div>
      </div>
    </div>
  </main>
</body>

</html>