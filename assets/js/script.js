// assets/js/script.js
window.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".btn-delete").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      if (!confirm("Yakin ingin menghapus barang ini?")) e.preventDefault();
    });
  });
});
