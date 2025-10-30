// ✅ Product Lists
const coffeeProducts = [
  ["Benguet Arabica", "Rich, smooth, earthy taste", "₱250", "coffee1.png"],
  ["Sagada Medium Roast", "Balanced & aromatic", "₱260", "coffee2.png"],
  ["Mt. Apo Dark Roast", "Deep & bold roast flavor", "₱270", "coffee3.jpg"],
  ["Bukidnon Matcha Process", "Unique green aroma", "₱280", "coffee4.jpg"],
  ["Kalinga Robusta Blend", "Strong and full-bodied", "₱290", "coffee5.jpg"],
  ["Barako (Liberica) Bold Roast","Iconic Filipino taste","₱300","matcha3.jpg"],
  ["Davao Cacao-Infused", "Coffee + cocoa blend", "₱310", "coffee7.png"],
  ["Cordillera Peaberry", "Fruity and smooth", "₱320", "matcha1.png"],
  ["Mindoro Espresso Roast", "Rich crema espresso style", "₱330", "coffee8.jpg"],
  ["Antique Caramel-Notes Arabica", "Sweet and buttery finish", "₱340", "matcha22.jpg"],
];

const kitProducts = [
  ["Morning Harvest Kit","Native basket + coffee bag","₱480","kit1.jpg"],
  ["Cordillera Comfort","Ceramic mug + local beans","₱520","kit2.jpg"],
  ["Island Dawn","Mini sampler of heritage","₱600","kit3.jpg"],
  ["Farmer’s Pride","Eco-friendly coffee set","₱550","kit4.jpg"],
  ["Barako Heritage","Regional blends gift box","₱650","kit5.jpg"],
  ["Sweet Mountain","Assorted crafts & beans","₱700","kit6.jpg"],
  ["Terra & Clay","Handcrafted keepsakes","₱720","kit7.jpg"],
  ["Sunrise Duo","Luxury coffee & crafts","₱800","kit8.jpg"],
  ["Afternoon Delight","Cultural snacks + beans","₱760","kit9.jpg"],
  ["Evening Ritual","Local mug + ground beans","₱740","kit10.jpg"],
];

const autumnProducts = [
  ["Cozy Cacao Kit","Warm cocoa + spice blend","₱350","autumn.png"],
  ["Snowfall Sampler","Winter-inspired cocoa set","₱360","snowfall.png"],
  ["Holiday Heritage Kit","Festive gift edition","₱380","holiday.png"],
];

// ✅ Local Storage Cart
let cart = JSON.parse(localStorage.getItem("cart")) || [];

// ✅ Render Products
function renderProducts(id, products, color="#442808") {
  document.getElementById(id).innerHTML = products.map(([name, desc, price, img]) => `
    <div class="col-md-3 col-sm-6">
      <div class="card border-0 shadow-sm h-100">
        <img src="assets/images/${img}" class="card-img-top" alt="${name}">
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
