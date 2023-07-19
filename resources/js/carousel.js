const carousel = document.getElementById('carousel');
if (carousel) {
    document.addEventListener('DOMContentLoaded', function () {
        const carouselContainer = document.querySelector('.carousel-container');
        const carouselSlides = Array.from(document.querySelectorAll('.carousel-slide'));
        const slideWidth = carouselSlides[0].offsetWidth;
        let currentIndex = 0;
    
        function slideTo(index) {
          const offset = -index * slideWidth;
          carouselContainer.style.transform = `translateX(${offset}px)`;
        }
    
        function nextSlide() {
          currentIndex++;
          if (currentIndex >= carouselSlides.length) {
            currentIndex = 0;
          }
          slideTo(currentIndex);
        }
    
        setInterval(nextSlide, 3000); // Change slide every 3 seconds (adjust as needed)
    
        slideTo(currentIndex);
      });
}