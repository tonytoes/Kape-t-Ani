document.addEventListener("DOMContentLoaded", () => {
  console.log("Coffee Shop site loaded ✅");

  const cartCount = document.getElementById("cart-count");
  const addToCartBtn = document.getElementById("addToCartBtn");
  const navbar = document.querySelector(".navbar");
  const navLinks = document.querySelectorAll(".nav-link");

  let cartItems = 0;

  // Add sample item to cart
  addToCartBtn.addEventListener("click", () => {
    cartItems++;
    cartCount.textContent = cartItems;
  });

  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });

  // Navbar shrink effect
  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      navbar.classList.add("shrink");
    } else {
      navbar.classList.remove("shrink");
    }
  });
});
