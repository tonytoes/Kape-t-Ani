const carouselElement = document.querySelector('#coffeeCarousel');
  if (carouselElement) {
    // Initialize a Bootstrap Carousel instance if present
    // (ensures correct autoplay/controls when reused elsewhere)
    const carousel = new bootstrap.Carousel(carouselElement, {
      interval: 4000,      // auto-slide every 4 seconds
      ride: 'carousel',
      pause: 'hover'
    });
    console.log("Product carousel initialized ✅", carousel);
  }