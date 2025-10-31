<?php

  include "config.php";
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kape't Ani | Products</title>
    <link rel="icon" href="assets/images/coffee.png" type="image/x-icon" >
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    >
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet"
    >
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    >
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    >
    <link rel="stylesheet" href="product_admin.css" >
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid position-relative">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
          <img
            src="assets/images/coffee.png"
            alt="Kape't Ani Logo"
            height="40"
            class="me-2"
          >
          <span class="fw-semibold">Kape't Ani</span>
        </a>

        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbarNav"
        >
          <ul class="navbar-nav gap-3">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="product.html">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="review.html">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
          </ul>
        </div>

        <div class="nav-actions d-flex align-items-center gap-3">
          <a href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
            <img
              src="assets/icons/material-symbols_search.png"
              alt="Search"
              width="22"
            >
          </a>
          <a class="nav-link" href="login.html">
            <img src="assets/icons/uil_user.png" alt="User" width="22" >
          </a>
          <a
            href="#"
            data-bs-toggle="offcanvas"
            data-bs-target="#cartOffcanvas"
            class="position-relative"
          >
            <img src="assets/icons/bi_bag (1).png" alt="Cart" width="22" >
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
          </button>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content text-center">
        <h1>Kape’t Ani</h1>
        <p>
          Empowering Local Farmers and Sharing Filipino Coffee Culture with the
          World
        </p>
      </div>
    </section>

    <!-- Product Section -->
    <section class="py-5">
      <div class="container">
        <h2 class="fw-bold mb-4 text-center" style="color: #442808">
          Our Products
        </h2>
        <p class="text-center mb-5 text-muted">
          Discover the heart of Filipino coffee and artisan culture — now
          featuring our cozy Autumn Specials!
        </p>

        <!-- Coffee -->
        <h4 class="fw-bold mb-4" style="color: #442808">Coffee and Matcha</h4>
        <div class="row g-4" id="coffee-products"></div>

        <!-- Add Button -->
        <div class="row g-4 mt-3">
          <div class="col-md-3 col-sm-6">
              <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                  <button type="button" id="Coffee" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-sm w-100 text-light" style="background-color:green;"> Add</button>
                </div>
              </div>
          </div>
        </div>

        <hr class="my-5" style="border-top: 2px solid #dcb764; opacity: 0.5" >

        <!-- Cultural Kits -->
        <h4 class="fw-bold mb-4" style="color: #442808">Cultural Kits</h4>
        <div class="row g-4" id="kit-products"></div>
        
        <!-- Add Button -->
        <div class="row g-4 mt-3">
          <div class="col-md-3 col-sm-6">
              <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                  <button type="button" id="Cultural" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-sm w-100 text-light" style="background-color:green;"> Add</button>
                </div>
              </div>
          </div>
        </div>

        <hr class="my-5" style="border-top: 3px dashed #b66d2f; opacity: 0.8" >

        <!-- Autumn Specials -->
        <div class="text-center mb-4">
          <h4 class="fw-bold" style="color: #b66d2f">Seasonal Specials</h4>
          <p class="text-muted">
            Limited edition flavors and cultural kits to celebrate the cozy
            season!
          </p>
        </div>
        <div class="row g-4" id="autumn-products"> </div>
        
        <!-- Add Button -->
        <div class="row g-4 mt-3">
          <div class="col-md-3 col-sm-6">
              <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                  <button type="button" id="Seasonal" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-sm w-100 text-light" style="background-color:green;"> Add</button>
                </div>
              </div>
          </div>
        </div>
            
      </div>
    </section>
    
    <!-- Modal -->
     <!-- Add -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
              <div class="col-12 col-md-10 mx-auto "> 
                <form action="product_admin.php" name ="addForm" method="POST" enctype="multipart/form-data">


                  <input type="hidden" class="form-control" id="product_category" name="product_category">  

                  <div class= mb-3>
                  <label for="product_name" class="form-label">Product Name: </label>
                  <input type="text" class="form-control" id="product_name" name="product_name">  
                  </div>

                  <div class= mb-3>
                  <label for="product_description" class="form-label">Description </label>
                  <input type="text" class="form-control" id="product_description" name="product_description">  
                  </div>

                  <div class= mb-3>
                  <label for="product_price" class="form-label">Price: </label>
                  <input type="text" class="form-control" id="product_price" name="product_price">  
                  </div>

                  <div class= "mb-3">
                  <label for="product_image" class="form-label">Image: </label>
                  <input type="file" id="product_image" name="product_image" accept="image/*" required>  
                  </div>

                  <div class="modal-footer">
                  
                  <button type="submit" class="btn btn-success"  id="insert" name="insert">Submit</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  </div>
                 
                </form>
              </div> 
            </div> <!-- End of Modal Body -->
          </div>
        </div>
      </div>

    

      <!-- Edit -->
       
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-12 col-md-10 mx-auto "> 
                <form action="product_admin.php" name ="addForm" method="POST" enctype="multipart/form-data">
                  
                  <div class= "mb-3">
                  <input type="hidden" id="e_product_id" name="product_id">  
                  </div>  

                  <div class= mb-3>
                  <label for="product_name" class="form-label">Product Name: </label>
                  <input type="text" class="form-control" id="product_name" name="product_name">  
                  </div>

                  <div class= mb-3>
                  <label for="product_description" class="form-label">Description </label>
                  <input type="text" class="form-control" id="product_description" name="product_description">  
                  </div>

                  <div class= mb-3>
                  <label for="product_price" class="form-label">Price: </label>
                  <input type="text" class="form-control" id="product_price" name="product_price">  
                  </div>

                  <div class= "mb-3">
                  <label for="product_image" class="form-label">Image: </label>
                  <input type="file" id="product_image" name="product_image" accept="image/*" required>  
                  </div>

                  

                  <div class="modal-footer">
                  <button type="submit" class="btn btn-success" id="update" name="update">Submit</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  </div>
                 
                </form>
              </div> 
            </div> <!-- End of Modal Body -->

          </div>
        </div>
      </div>


      <!-- Delete -->
       
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-12 col-md-10 mx-auto "> 
                <form action="product_admin.php" name ="addForm" method="POST" enctype="multipart/form-data">
                  
                  <div class= "mb-3">
                    <label>Are you sure you want to delete? </label>
                    <input type="hidden" id="d_product_id" name="d_product_id">  
                  </div>  

                  <button type="submit" class="btn btn-success" id="delete" name="delete" >Delete</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                 
                </form>
              </div> 
            </div> <!-- End of Modal Body -->

          </div>
        </div>
      </div>

      <?php

        if(isset($_POST["insertCoffee"])){ 
          // To escape special chars. 
          $image = file_get_contents($_FILES['product_image']['tmp_name']);

          $name = mysqli_real_escape_string($conn, $_POST['product_name']);
          $description = mysqli_real_escape_string($conn, $_POST['product_description']);
          $price = mysqli_real_escape_string($conn, $_POST['product_price']);
          $imageName = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
          $imageData = mysqli_real_escape_string($conn, $image);
          $imageType = mysqli_real_escape_string($conn, $_FILES['product_image']['type']); 
          

          //Insert values to table 
          mysqli_query($conn, "INSERT INTO coffee_products (id, name, description, price, image_name, image_blob, image_type)
          VALUES(NULL, '$name', '$description', '$price', '$imageName', '$imageData', '$imageType')");
          ?> 
          <script type="text/javascript"> window.location.href=window.location.href; </script> 
          <?php 
        }

        if(isset($_POST["insertCultural"])){ 
          
          // To escape special chars. 
          $image = file_get_contents($_FILES['product_image']['tmp_name']);

          $name = mysqli_real_escape_string($conn, $_POST['product_name']);
          $description = mysqli_real_escape_string($conn, $_POST['product_description']);
          $price = mysqli_real_escape_string($conn, $_POST['product_price']);
          $imageName = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
          $imageData = mysqli_real_escape_string($conn, $image);
          $imageType = mysqli_real_escape_string($conn, $_FILES['product_image']['type']); 
          

          //Insert values to table 
          mysqli_query($conn, "INSERT INTO cultural_products (id, name, description, price, image_name, image_blob, image_type)
          VALUES(NULL, '$name', '$description', '$price', '$imageName', '$imageData', '$imageType')");
          ?> 
          <script type="text/javascript"> window.location.href=window.location.href; </script> 
          <?php 
        }

        if(isset($_POST["insertSeasonal"])){ 
          // To escape special chars. 
          $image = file_get_contents($_FILES['product_image']['tmp_name']);

          $name = mysqli_real_escape_string($conn, $_POST['product_name']);
          $description = mysqli_real_escape_string($conn, $_POST['product_description']);
          $price = mysqli_real_escape_string($conn, $_POST['product_price']);
          $imageName = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
          $imageData = mysqli_real_escape_string($conn, $image);
          $imageType = mysqli_real_escape_string($conn, $_FILES['product_image']['type']); 
          

          //Insert values to table 
          mysqli_query($conn, "INSERT INTO seasonal_products (id, name, description, price, image_name, image_blob, image_type)
          VALUES(NULL, '$name', '$description', '$price', '$imageName', '$imageData', '$imageType')");
          ?> 
          <script type="text/javascript"> window.location.href=window.location.href; </script> 
          <?php 
        }
        

        

        if(isset($_POST["updateCoffee"])){

          // To escape special chars. 
          $image = file_get_contents($_FILES['product_image']['tmp_name']);

          $name = mysqli_real_escape_string($conn, $_POST['product_name']);
          $description = mysqli_real_escape_string($conn, $_POST['product_description']);
          $price = mysqli_real_escape_string($conn, $_POST['product_price']);
          $imageName = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
          $imageData = mysqli_real_escape_string($conn, $image);
          $imageType = mysqli_real_escape_string($conn, $_FILES['product_image']['type']); 
          
          //Insert values to table
          mysqli_query($conn, "UPDATE coffee_products SET 

            `name` = '$name', 
            `description` = '$description',  
            `price` = '$price',  
            `image_name` = '$imageName',
            `image_blob` = '$imageData',
            `image_type` = '$imageType' 
            WHERE id=$_POST[product_id]");
          ?>
          <script type="text/javascript">
          window.location.href=window.location.href;
          </script>

          <?php
        }
        
        if(isset($_POST["updateCultural"])){

          // To escape special chars. 
          $image = file_get_contents($_FILES['product_image']['tmp_name']);

          $name = mysqli_real_escape_string($conn, $_POST['product_name']);
          $description = mysqli_real_escape_string($conn, $_POST['product_description']);
          $price = mysqli_real_escape_string($conn, $_POST['product_price']);
          $imageName = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
          $imageData = mysqli_real_escape_string($conn, $image);
          $imageType = mysqli_real_escape_string($conn, $_FILES['product_image']['type']); 
          
          //Insert values to table
          mysqli_query($conn, "UPDATE cultural_products SET 

            `name` = '$name', 
            `description` = '$description',  
            `price` = '$price',  
            `image_name` = '$imageName',
            `image_blob` = '$imageData',
            `image_type` = '$imageType' 
            WHERE id=$_POST[product_id]");
          ?>
          <script type="text/javascript">
          window.location.href=window.location.href;
          </script>

          <?php
        }

        if(isset($_POST["updateSeasonal"])){

          // To escape special chars. 
          $image = file_get_contents($_FILES['product_image']['tmp_name']);

          $name = mysqli_real_escape_string($conn, $_POST['product_name']);
          $description = mysqli_real_escape_string($conn, $_POST['product_description']);
          $price = mysqli_real_escape_string($conn, $_POST['product_price']);
          $imageName = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
          $imageData = mysqli_real_escape_string($conn, $image);
          $imageType = mysqli_real_escape_string($conn, $_FILES['product_image']['type']); 
          
          //Insert values to table
          mysqli_query($conn, "UPDATE seasonal_products SET 

            `name` = '$name', 
            `description` = '$description',  
            `price` = '$price',  
            `image_name` = '$imageName',
            `image_blob` = '$imageData',
            `image_type` = '$imageType' 
            WHERE id=$_POST[product_id]");
          ?>
          <script type="text/javascript">
          window.location.href=window.location.href;
          </script>

          <?php
        }

        if(isset($_POST["deleteCoffee"])){

          //Insert values to table
          mysqli_query($conn, "DELETE FROM coffee_products WHERE id=$_POST[d_product_id]");
          ?>
          <script type="text/javascript">
          window.location.href=window.location.href;
          </script>

          <?php
        }

        if(isset($_POST["deleteCultural"])){

          //Insert values to table
          mysqli_query($conn, "DELETE FROM cultural_products WHERE id=$_POST[d_product_id]");
          ?>
          <script type="text/javascript">
          window.location.href=window.location.href;
          </script>

          <?php
        }

        if(isset($_POST["deleteSeasonal"])){

          //Insert values to table
          mysqli_query($conn, "DELETE FROM seasonal_products WHERE id=$_POST[d_product_id]");
          ?>
          <script type="text/javascript">
          window.location.href=window.location.href;
          </script>

          <?php
        }


      ?> 

    <footer class="footer_section text-light pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-4 text-center">
            <img
              src="assets/images/kape't_ani_logo_white.png"
              alt=""
              style="width: 250px"
            >
            <div class="d-flex justify-content-center gap-3 my-3">
              <a href="#" class="text-light fs-5"
                ><i class="fab fa-facebook"></i
              ></a>
              <a href="#" class="text-light fs-5"
                ><i class="fab fa-twitter"></i
              ></a>
              <a href="#" class="text-light fs-5"
                ><i class="fab fa-tiktok"></i
              ></a>
              <a href="#" class="text-light fs-5"
                ><i class="fab fa-instagram"></i
              ></a>
            </div>
            <p class="small">&copy; 2025 All rights reserved</p>
          </div>

          <div class="col-md-3 mb-4">
            <h5 class="fw-bold mb-3">About</h5>
            <ul class="list-unstyled">
              <li class="pt-2">
                <a href="#" class="text-light text-decoration-none">Menu</a>
              </li>
              <li class="pt-2">
                <a href="room.html" class="text-light text-decoration-none"
                  >Features</a
                >
              </li>
              <li class="pt-2">
                <a href="room.html" class="text-light text-decoration-none"
                  >Blogs</a
                >
              </li>
              <li class="pt-2">
                <a href="room.html" class="text-light text-decoration-none"
                  >Help & Supports</a
                >
              </li>
            </ul>
          </div>

          <div class="col-md-3 mb-4">
            <h5 class="fw-bold mb-3">Company</h5>
            <ul class="list-unstyled">
              <li class="pt-2">
                <a href="#" class="text-light text-decoration-none"
                  >Terms of Service</a
                >
              </li>
              <li class="pt-2">
                <a href="room.html" class="text-light text-decoration-none"
                  >How we work</a
                >
              </li>
              <li class="pt-2">
                <a href="room.html" class="text-light text-decoration-none"
                  >Pricing</a
                >
              </li>
              <li class="pt-2">
                <a href="room.html" class="text-light text-decoration-none"
                  >FAQS</a
                >
              </li>
            </ul>
          </div>

          <div class="col-md-3 mb-4">
            <h5 class="fw-bold mb-3">Our Location</h5>
            <p class="mb-1">938 Aurora Boulevard,</p>
            <p class="mb-3">Cubao, Quezon City, Metro Manila</p>
            <ul class="list-unstyled">
              <li class="pt-2">
                <a href="#" class="text-light text-decoration-none"
                  >+1 202-918-2132</a
                >
              </li>
              <li class="pt-2">
                <a href="#" class="text-light text-decoration-none"
                  >kapetani@gmail.com</a
                >
              </li>
              <li class="pt-2">
                <a href="#" class="text-light text-decoration-none"
                  >www.kapetani.com</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script> 
      const coffeeProducts = [
        <?php
          $table = mysqli_query($conn, "SELECT * FROM coffee_products");
          while ($row = mysqli_fetch_array($table)) {
              $imgBase64 = base64_encode($row["image_blob"]);
              $imageType = $row["image_type"];

              echo '[';
                echo '"'.$row["id"].'",';
                echo '"'.$row["name"].'",';
                echo '"'.$row["description"].'",';
                echo '"₱'.$row["price"].'",';
                echo '"'.$imgBase64.'",';
                echo '"'.$imageType.'",';
                echo '"Coffee"';
              echo '],';
          }
        ?>
      ];


      const kitProducts = [
        <?php
          $table = mysqli_query($conn, "SELECT * FROM cultural_products");
          while ($row = mysqli_fetch_array($table)) {
              $imgBase64 = base64_encode($row["image_blob"]);
              $imageType = $row["image_type"];

              echo '[';
                echo '"'.$row["id"].'",';
                echo '"'.$row["name"].'",';
                echo '"'.$row["description"].'",';
                echo '"₱'.$row["price"].'",';
                echo '"'.$imgBase64.'",';
                echo '"'.$imageType.'",';
                echo '"Cultural"';
              echo '],';
          }
        ?>
      ];

      const autumnProducts = [
        <?php
          $table = mysqli_query($conn, "SELECT * FROM seasonal_products");
          while ($row = mysqli_fetch_array($table)) {
              $imgBase64 = base64_encode($row["image_blob"]);
              $imageType = $row["image_type"];

              echo '[';
                echo '"'.$row["id"].'",';
                echo '"'.$row["name"].'",';
                echo '"'.$row["description"].'",';
                echo '"₱'.$row["price"].'",';
                echo '"'.$imgBase64.'",';
                echo '"'.$imageType.'",';
                echo '"Seasonal"';
              echo '],';
          }
        ?>
      ];
    </script>
    <script src="product_admin.js"></script>

    
  

</script>
  </body>
</html>
