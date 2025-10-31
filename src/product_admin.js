<?php
  include "product-connection.php";
?>

  const coffeeProducts = [
    <?php
      $table = mysqli_query($linkToDB, "SELECT * FROM coffee_products");
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
      $table = mysqli_query($linkToDB, "SELECT * FROM cultural_products");
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
      $table = mysqli_query($linkToDB, "SELECT * FROM seasonal_products");
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

  function renderProducts(id, products, color = "#442808", ed = "#ffb157ff", del = "#20160aff") {
    document.getElementById(id).innerHTML = products
      .map(
        ([id, name, desc, price, img, type, category]) => `
          <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100"> 
              <img src="data:${type};base64,${img}" class="card-img-top" alt="${name}">
              <div class="card-body text-center">
                <h6 class="fw-bold">${name}</h6>
                <p class="small text-muted mb-1">${desc}</p>
                <p class="fw-semibold mb-2" style="color:${color};">${price}</p>
                <button id="${id}" data-bs-toggle="modal" data-bs-target="#editModal${category}" class="btn btn-sm w-100 text-light mb-3" style="background-color:${ed};">Edit</button>
                <button id="${id}" data-bs-toggle="modal" data-bs-target="#deleteModal${category}" class="btn btn-sm w-100 text-light" style="background-color:${del};">Delete</button>
             </div>
            </div>
          </div>`
      )
      .join("");
  }


  renderProducts("coffee-products", coffeeProducts);
  renderProducts("kit-products", kitProducts);
  renderProducts("autumn-products", autumnProducts, "#b66d2f");

  document.addEventListener("DOMContentLoaded", () => {
    const cartCount = document.getElementById("cart-count");
    const navbar = document.querySelector(".navbar");
    let cartItems = 0;

    document.body.addEventListener("click", (e) => {
      if (e.target && e.target.id === "addToCartBtn") {
        cartItems++;
        if (cartCount) cartCount.textContent = cartItems;
      }
    });

    window.addEventListener("scroll", () => {
      navbar.classList.toggle("shrink", window.scrollY > 50);
    });
  });

  //Edit Modal
  const editModalCoffee = document.getElementById('editModalCoffee');

  editModalCoffee.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget; // button that opened the modal
    const tempProductId = button.id;        // get the product ID
    document.getElementById('e_product_idCoffee').value = tempProductId; // set hidden input

  });

  const editModalCultural = document.getElementById('editModalCultural');

  editModalCultural.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget; // button that opened the modal
    const tempProductId = button.id;        // get the product ID
    document.getElementById('e_product_idCultural').value = tempProductId; // set hidden input

  });

  const editModalSeasonal = document.getElementById('editModalSeasonal');

  editModalSeasonal.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget; // button that opened the modal
    const tempProductId = button.id;        // get the product ID
    document.getElementById('e_product_idSeasonal').value = tempProductId; // set hidden input

  });
  

  //Delete Modal
  const deleteModalCoffee = document.getElementById('deleteModalCoffee');

  deleteModalCoffee.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget; // button that opened the modal
    const tempproductId = button.id;        // get the product ID
    document.getElementById('d_product_idCoffee').value = tempproductId; // set hidden input
  });

  //Delete Modal
  const deleteModalCultural = document.getElementById('deleteModalCultural');

  deleteModalCultural.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget; // button that opened the modal
    const tempproductId = button.id;        // get the product ID
    document.getElementById('d_product_idCultural').value = tempproductId; // set hidden input
  });

  //Delete Modal
  const deleteModalSeasonal = document.getElementById('deleteModalSeasonal');

  deleteModalSeasonal.addEventListener('show.bs.modal', function (event) {

    const button = event.relatedTarget; // button that opened the modal
    const tempproductId = button.id;        // get the product ID
    document.getElementById('d_product_idSeasonal').value = tempproductId; // set hidden input
  });