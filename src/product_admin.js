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
              <button id="${id}" data-bs-toggle="modal" data-bs-target="#editModal" name ="${category}" class="btn btn-sm w-100 text-light mb-3" style="background-color:${ed};">Edit</button>
              <button id="${id}" data-bs-toggle="modal" data-bs-target="#deleteModal" name="${category}" class="btn btn-sm w-100 text-light" style="background-color:${del};">Delete</button>
            </div>
          </div>
        </div>`
    )
    .join("");
}

document.addEventListener("DOMContentLoaded", () => {
  renderProducts("coffee-products", coffeeProducts);
  renderProducts("kit-products", kitProducts);
  renderProducts("autumn-products", autumnProducts, "#b66d2f");
});

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



//Add Modal
const addModal = document.getElementById('addModal');
addModal.addEventListener('show.bs.modal', function (event) {

  const addButton = event.relatedTarget; // button that opened the modal
  const submit = document.getElementById("insert");

  const updatedButton = "insert" + addButton.id;	
  submit.name = updatedButton;

});

//Edit Modal 
const editModal = document.getElementById('editModal');
editModal.addEventListener('show.bs.modal', function (event){ 

  const editButton = event.relatedTarget; 
  const submit = document.getElementById("update");
  submit.name = "update" + editButton.name;

  document.getElementById('e_product_id').value = editButton.id; // set hidden input
  
});

//Delete Modal
const deleteModal= document.getElementById('deleteModal');
deleteModal.addEventListener('show.bs.modal', function (event){ 

  const deleteButton = event.relatedTarget; 
  const submit = document.getElementById("delete");
  submit.name = "delete" + deleteButton.name;

  document.getElementById('d_product_id').value = deleteButton.id; // set hidden input
  
});


