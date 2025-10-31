// ✅ Local Storage Cart
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// ✅ Render Products
function renderProducts(id, products, color="#442808") {
  document.getElementById(id).innerHTML = products
  .map(([id, name, desc, price, img, type]) => `
      <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm h-100">
          <img src="data:${type};base64,${img}" class="card-img-top" alt="${name}">
          <div class="card-body text-center">
            <h6 class="fw-bold">${name}</h6>
            <p class="small text-muted mb-1">${desc}</p>
            <p class="fw-semibold mb-2" style="color:${color};">${price}</p>
          <button class="btn btn-sm w-100 text-light add-to-cart-btn"
            style="background-color:${color};"
            data-name="${name}" data-price="${price}" data-img="${img}">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  `).join("");
}

renderProducts("coffee-products", coffeeProducts);
renderProducts("kit-products", kitProducts);
renderProducts("autumn-products", autumnProducts, "#b66d2f");

// ✅ Update Count
function updateCartCount() {
  document.getElementById("cart-count").textContent =
    cart.reduce((sum, item) => sum + item.qty, 0);
}

// ✅ Update Sidebar UI
function updateCartUI() {
  const container = document.getElementById("cartItemsContainer");
  const totalEl = document.getElementById("cartTotal");

  container.innerHTML = cart.map(item => `
    <div class="cart-item">
      <img src="assets/images/${item.img}">
      <div>
        <strong>${item.name}</strong><br>
        <small>${item.price}</small><br>
        <small>Qty: ${item.qty}</small>
      </div>
    </div>
  `).join("");

  let total = cart.reduce(
    (sum, item) => sum + item.qty * parseInt(item.price.replace("₱","")),
    0
  );
  totalEl.textContent = "₱" + total;
}

function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartCount();
  updateCartUI();
}

// ✅ Add to Cart
document.addEventListener("click", (e) => {
  if (!e.target.classList.contains("add-to-cart-btn")) return;

  const product = {
    name: e.target.dataset.name,
    price: e.target.dataset.price,
    img: e.target.dataset.img,
    qty: 1
  };

  let existing = cart.find(i => i.name === product.name);
  if (existing) existing.qty++;
  else cart.push(product);

  saveCart();
});

// ✅ Cart Sidebar Open/Close
document.getElementById("cartToggle").onclick = () =>
  document.getElementById("cartSidebar").classList.add("active");

document.getElementById("closeCart").onclick = () =>
  document.getElementById("cartSidebar").classList.remove("active");

// ✅ Initialize UI
saveCart();
