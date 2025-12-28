/**
 * =========================================
 * UI INTERACTIONS — EL ARCA
 * Archivo: /assets/js/ui.js
 * =========================================
 * - Modales de productos
 * - Interacciones UI reutilizables
 * - Seguro si el elemento no existe
 * =========================================
 */

document.addEventListener("DOMContentLoaded", () => {

  /* =====================================
   * PRODUCT MODAL
   * ===================================== */

  const modal = document.getElementById("productModal");
  if (!modal) return;

  const modalImg   = modal.querySelector("#modalImg");
  const modalTitle = modal.querySelector("#modalTitle");
  const modalDesc  = modal.querySelector("#modalDesc");

  const openButtons = document.querySelectorAll(".open-modal");
  const closeBtn    = modal.querySelector("#closeModal");
  const overlay     = modal.querySelector(".modal-overlay");

  const openModal = (card) => {
    if (!card) return;

    modalImg.src = card.dataset.img || "";
    modalTitle.textContent = card.dataset.name || "";
    modalDesc.textContent = card.dataset.desc || "";

    modal.classList.add("active");
    document.body.classList.add("modal-open");
  };

  const closeModal = () => {
    modal.classList.remove("active");
    document.body.classList.remove("modal-open");
  };

  openButtons.forEach(btn => {
    btn.addEventListener("click", (e) => {
      const card = e.target.closest(".product-card");
      openModal(card);
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", closeModal);
  }

  if (overlay) {
    overlay.addEventListener("click", closeModal);
  }

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal.classList.contains("active")) {
      closeModal();
    }
  });

});
