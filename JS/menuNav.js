const menuToggle = document.getElementById('menu-toggle');
const mainMenu = document.getElementById('main-menu');
const mobileMenu = document.getElementById('mobile-menu');

menuToggle.addEventListener('click', () => {
    // Toggle pour le menu hamburger (menu pour petits écrans)
    mobileMenu.classList.toggle('hidden');
});

// Masquer le menu mobile lorsque la fenêtre dépasse la taille "md"
window.addEventListener('resize', () => {
    if (window.innerWidth >= 768) {
        mobileMenu.classList.add('hidden');
    }
});