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
  const carousels = document.querySelectorAll('.carousel-track');
  carousels.forEach(track => {
    const items = Array.from(track.children);
    const count = items.length;
    if (!count) return;

    let currentAngle = 0;
    const angleStep = 360 / count;
    // Calculate radius to ensure items roughly touch or have minimal gap
    // Circumference = width * count. r = C / 2pi.
    // Approximate card width 300px + gap
    const radius = Math.round((320 * count) / (2 * Math.PI)) + 50;

    // Initial positioning of items
    items.forEach((item, index) => {
      const angle = angleStep * index;
      item.style.transform = `rotateY(${angle}deg) translateZ(${radius}px)`;
      // Add index to dataset for click handling if needed
      item.dataset.index = index;
    });

    // Rotation function
    function rotateToIndex(index) {
      // Calculate target angle (negative to rotate correctly)
      currentAngle = -angleStep * index;
      track.style.transform = `translateZ(-${radius}px) rotateY(${currentAngle}deg)`;
    }

    // Auto-rotation (just increment angle)
    function rotateNext() {
      currentAngle -= angleStep;
      track.style.transform = `translateZ(-${radius}px) rotateY(${currentAngle}deg)`;
    }

    // Set initial depth to center the front item (camera is at 0, scene needs to be pushed back)
    // We move the track BACK by radius so the front item is at Z=0 (close to camera)
    track.style.transform = `translateZ(-${radius}px) rotateY(0deg)`;

    // Click to bring to front
    // Note: click logic is complex in cylinder because items rotate away. 
    // Simplified: Clicking an item opens modal. Auto-rotation continues.
    items.forEach((item) => {
      item.addEventListener('click', () => {
        // Open modal logic
        const img = item.querySelector('img');
        const caption = item.querySelector('.carousel-caption');
        openModalFromData({
          img: img?.src || '',
          title: caption?.querySelector('h3')?.textContent || '',
          desc: caption?.querySelector('p')?.textContent || ''
        });
      });
    });

    // Autoplay
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
