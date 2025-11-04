/* Local storage of the item cart */
let cart = JSON.parse(localStorage.getItem("cart")) || [];

/* Card of the product on the side cart*/
function renderProducts(id, products, color = "#442808") {
  document.getElementById(id).innerHTML = products
    .map(([pid, name, desc, price, img, type]) => `
      <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm h-100">
          <img src="data:${type};base64,${img}" class="card-img-top" alt="${name}">
          <div class="card-body text-center">
            <h6 class="fw-bold">${name}</h6>
            <p class="small text-muted mb-1">${desc}</p>
            <p class="fw-semibold mb-2" style="color:${color};">${price}</p>
            <button class="btn btn-sm w-100 text-light add-to-cart-btn"
              style="background-color:${color};"
              data-id="${pid}" data-name="${name}"
              data-price="${price}" data-img="data:${type};base64,${img}">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
    `)
    .join("");
}


renderProducts("coffee-products", coffeeProducts);
renderProducts("kit-products", kitProducts);
renderProducts("autumn-products", autumnProducts, "#b66d2f");

/* Add to side cart */
document.addEventListener("click", (e) => {
  if (!e.target.classList.contains("add-to-cart-btn")) return;

  const product = {
    id: e.target.dataset.id,
    name: e.target.dataset.name,
    price: e.target.dataset.price,
    img: e.target.dataset.img,
    qty: 1,
  };

  const existing = cart.find((item) => item.id === product.id);
  if (existing) existing.qty++;
  else cart.push(product);

  saveCart();
});

/* Remove from cart*/
function removeFromCart(id) {
  cart = cart.filter((item) => item.id !== id);
  saveCart();
}

/* qnty change */
function changeQuantity(id, qty) {
  const item = cart.find((i) => i.id === id);
  if (item) item.qty = Math.max(1, parseInt(qty) || 1);
  saveCart();
}

/* Updating the cart ui */
function updateCartUI() {
  const cartList = document.getElementById("cartItems");
  const totalEl = document.getElementById("cartTotal");
  const countEl = document.getElementById("cart-count");

  cartList.innerHTML = "";
  let total = 0;
  let count = 0;

  cart.forEach((item) => {
    total += item.qty * parseInt(item.price.replace("₱", ""));
    count += item.qty;

    const li = document.createElement("li");
    li.className = "list-group-item d-flex align-items-center justify-content-between";
    li.innerHTML = `
      <div class="d-flex align-items-center">
        <img src="${item.img}" alt="${item.name}" width="50" height="50" class="me-2 rounded">
        <div>
          <strong>${item.name}</strong><br>
          <small>${item.price}</small>
        </div>
      </div>
      <div class="d-flex align-items-center">
        <input type="number" min="1" value="${item.qty}" class="form-control form-control-sm me-2" style="width:70px"
          onchange="changeQuantity('${item.id}', this.value)">
        <button class="btn btn-danger btn-sm" onclick="removeFromCart('${item.id}')">
          <i class="bi bi-trash"></i>
        </button>
      </div>
    `;
    cartList.appendChild(li);
  });

  totalEl.textContent = "₱" + total.toFixed(2);
  countEl.textContent = count;
}


function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartUI();
}

updateCartUI();

if (cart.length > 0 && coffeeProducts.length + kitProducts.length + autumnProducts.length === 0) {
  localStorage.removeItem("cart");
  cart = [];
  updateCartUI();
}

