// ======== TOTAL PRICE CALCULATION ========
document.addEventListener("DOMContentLoaded", () => {
  const qtyInputs = document.querySelectorAll(".qty-input");
  const subtotalElement = document.getElementById("subtotal");
  const shippingElement = document.getElementById("shipping");
  const totalElement = document.getElementById("total");
  const totalAmountButton = document.getElementById("totalAmount");

  // Set shipping fee (change this later if you want a fixed rate)
  const shippingFee = 0.00; // Example: 50.00 for standard shipping

  function updateTotal() {
    let subtotal = 0;
    qtyInputs.forEach((input) => {
      const price = parseFloat(input.dataset.price);
      const qty = parseInt(input.value) || 0;
      subtotal += price * qty;
    });

    const total = subtotal + shippingFee;

    subtotalElement.textContent = `₱${subtotal.toFixed(2)} Php`;
    shippingElement.textContent = `₱${shippingFee.toFixed(2)} Php`;
    totalElement.textContent = `₱${total.toFixed(2)} Php`;
    totalAmountButton.textContent = `₱${total.toFixed(2)} Php`;
  }

  qtyInputs.forEach((input) => {
    input.addEventListener("input", updateTotal);
  });

  updateTotal();

  // ======== PAYMENT FORM ========
  const paymentForm = document.getElementById("paymentForm");
  paymentForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const cardName = document.getElementById("cardName").value.trim();
    const cardNumber = document.getElementById("cardNumber").value.trim();
    const validThrough = document.getElementById("validThrough").value.trim();
    const cvcCode = document.getElementById("cvcCode").value.trim();

    if (!cardName || !cardNumber || !validThrough || !cvcCode) {
      alert("Please fill in all payment details.");
      return;
    }

    alert("Payment successful! Thank you for your purchase.");
    paymentForm.reset();
    updateTotal();
  });

  // ======== RETURN BUTTON ========
  const returnBtn = document.querySelector(".btn-return");
  returnBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (window.history.length > 1) {
      window.history.back();
    } else {
      window.location.href = "shop.html";
    }
  });
});
