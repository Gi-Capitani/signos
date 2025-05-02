// assets/js/animations.js
document.addEventListener('DOMContentLoaded', function () {
    const resultSection = document.querySelector('.signo-info');
    if (resultSection) {
      resultSection.style.opacity = 0;
      resultSection.style.transform = 'translateY(20px)';
      setTimeout(() => {
        resultSection.style.transition = 'all 0.6s ease';
        resultSection.style.opacity = 1;
        resultSection.style.transform = 'translateY(0)';
      }, 100);
    }
  });