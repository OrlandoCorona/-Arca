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
   * UTIL: crear modal dinámico si no existe
   * ===================================== */
  function ensureModal() {
    let modal = document.getElementById('productModal');
    if (modal) return modal;

    modal = document.createElement('div');
    modal.id = 'productModal';
    modal.className = 'modal';
    modal.innerHTML = `
      <div class="modal-overlay"></div>
      <div class="modal-content">
        <button id="closeModal" class="btn">Cerrar</button>
        <img id="modalImg" src="" alt="" />
        <h3 id="modalTitle"></h3>
        <p id="modalDesc"></p>
      </div>
    `;
    document.body.appendChild(modal);
    return modal;
  }

  /* =====================================
   * PRODUCT MODAL (dinámico y seguro)
   * ===================================== */
  const modal = ensureModal();
  const modalImg = modal.querySelector('#modalImg');
  const modalTitle = modal.querySelector('#modalTitle');
  const modalDesc = modal.querySelector('#modalDesc');
  const closeBtn = modal.querySelector('#closeModal');
  const overlay = modal.querySelector('.modal-overlay');

  function openModalFromData(data) {
    modalImg.src = data.img || '';
    modalImg.alt = data.title || '';
    modalTitle.textContent = data.title || '';
    modalDesc.textContent = data.desc || '';
    modal.classList.add('active');
    document.body.classList.add('modal-open');
  }

  function closeModal() {
    modal.classList.remove('active');
    document.body.classList.remove('modal-open');
  }

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  if (overlay) overlay.addEventListener('click', closeModal);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  // Attach open-modal buttons (product cards)
  document.querySelectorAll('.open-modal').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const card = e.target.closest('.product-card');
      if (!card) return;
      openModalFromData({
        img: card.dataset.img || card.querySelector('img')?.src || '',
        title: card.dataset.name || card.querySelector('h3')?.textContent || '',
        desc: card.dataset.desc || card.querySelector('p')?.textContent || ''
      });
    });
  });

  /* =====================================
   * CAROUSEL COVERFLOW (Home) — CSS + JS
   * - Auto-play
   * - Click to open modal
   * - Subtle 3D transforms
   * ===================================== */
  /* =====================================
   * 3D CYLINDRICAL CAROUSEL
   * ===================================== */
  /* =====================================
   * 3D CYLINDRICAL CAROUSEL (Revised for 6 Items)
   * ===================================== */
  const carousels = document.querySelectorAll('.carousel-track');
  carousels.forEach(track => {
    const items = Array.from(track.children);
    const count = items.length;
    if (!count) return;

    // Fixed for 6 items as requested
    const angleStep = 360 / count;
    let currentAngle = 0;

    // Calculate radius. Setup for ~300px width cards with gap.
    // For 6 items, radius ~ 300-350px works well to show Side-Back items.
    const itemWidth = 320;
    const radius = Math.round((itemWidth * count) / (2 * Math.PI)) + 80; // Added spacing

    // Initial positioning
    items.forEach((item, index) => {
      const angle = angleStep * index;
      item.style.transform = `rotateY(${angle}deg) translateZ(${radius}px)`;
      item.dataset.index = index;
    });

    // Rotation function
    function rotateToIndex(index) {
      currentAngle = -angleStep * index;
      updateCarousel();
    }

    function rotateNext() {
      currentAngle -= angleStep;
      updateCarousel();
    }

    function updateCarousel() {
      // Rotate the track
      track.style.transform = `translateZ(-${radius}px) rotateY(${currentAngle}deg)`;

      // Update opacity/visibility based on angle relative to front
      // Front is where (angle + currentAngle) % 360 ~= 0
      /* 
         Complex logic to hide back items if requested strictly "3 items visible",
         but CSS backface-visibility typically handles valid "cylinder" feel.
         We will leave strict opacity out unless specifically needed to hide the back 3 completely.
         The prompt asks for "Tres tarjetas visibles", which in a 6-item hex layout, 
         the front 3 (0, +60, -60) are naturally the ones facing the camera. 
         The back 3 are facing away.
      */
    }

    // Set initial depth
    track.style.transform = `translateZ(-${radius}px) rotateY(0deg)`;

    // Click handler -> Open Modal OR Rotate to it? Prompt says "Da clic ... para conocer más"
    items.forEach((item) => {
      item.addEventListener('click', () => {
        const img = item.querySelector('img');
        const caption = item.querySelector('.carousel-caption');
        openModalFromData({
          img: img?.src || '',
          title: item.dataset.name || caption?.querySelector('h3')?.textContent || '',
          desc: item.dataset.desc || ''
        });
      });
    });

    // Autoplay: 5000ms
    let autoplayId = setInterval(rotateNext, 5000);

    // Pause on hover
    track.addEventListener('mouseenter', () => clearInterval(autoplayId));
    track.addEventListener('mouseleave', () => {
      clearInterval(autoplayId);
      autoplayId = setInterval(rotateNext, 5000);
    });

  });

  /* NAVBAR: ensure keyboard shows labels on focus */
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('focus', () => link.classList.add('focus'));
    link.addEventListener('blur', () => link.classList.remove('focus'));
  });

});
