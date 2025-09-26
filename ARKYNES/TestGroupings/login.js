document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const navbar = document.querySelector(".navbar");

  // Fade-in navbar on load
  setTimeout(() => {
    navbar.classList.add("show");
  }, 100);

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (email && password) {
      alert(`Logged in as: ${email}`);
    } else {
      alert("Please fill out both fields.");
    }
  });
});
