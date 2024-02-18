document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.navbar-toggler').addEventListener('click', function () {
        // Dapatkan target offcanvas dari data-bs-target
        var offcanvasTarget = this.getAttribute('data-bs-target');
        
        // Pastikan target offcanvas ada sebelum mencoba toggle
        if (offcanvasTarget) {
          var offcanvas = new bootstrap.Offcanvas(document.querySelector(offcanvasTarget));
          offcanvas.toggle(); // Toggle offcanvas ketika tombol toggler diklik
        }
      });
  });