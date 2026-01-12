// assets/js/main.js

// Jalankan saat dokumen HTML selesai dimuat
document.addEventListener('DOMContentLoaded', () => {

    const hamburger = document.getElementById('hamburger-btn');
    const navLinks = document.getElementById('nav-links');

    // Cek jika elemennya ada di halaman
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', () => {
            // Toggle class 'active' untuk menampilkan/menyembunyikan menu
            navLinks.classList.toggle('active');
        });
    }

});