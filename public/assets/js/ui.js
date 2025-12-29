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
  const carousels = document.querySelectorAll('.carousel-track');
  carousels.forEach(track => {
    const items = Array.from(track.children);
    if (!items.length) return;

    let current = 0;
    const total = items.length;
    let autoplayId = null;

    function applyTransforms() {
      items.forEach((item, i) => {
        const offset = i - current;
        const abs = Math.abs(offset);
        const z = -Math.min(abs * 80, 200);
        const scale = Math.max(1 - abs * 0.08, 0.78);
        const rotateY = offset * -12;
        const tx = offset * 18;
        item.style.transform = `perspective(1000px) translateX(${tx}px) translateZ(${z}px) rotateY(${rotateY}deg) scale(${scale})`;
        item.style.opacity = abs > 2 ? '0.25' : '1';
        item.style.pointerEvents = abs > 2 ? 'none' : 'auto';
      });
    }

    function scrollToIndex(idx, smooth = true) {
      current = (idx + total) % total;
      const el = items[current];
      if (el) el.scrollIntoView({behavior: smooth ? 'smooth' : 'auto', inline: 'center', block: 'nearest'});
      applyTransforms();
    }

    // click item -> open modal
    items.forEach((it, idx) => {
      it.addEventListener('click', (e) => {
        // if item is not central, scroll to it
        if (idx !== current) {
          scrollToIndex(idx);
          return;
        }
        // central -> open modal with content
        const img = it.querySelector('img');
        const caption = it.querySelector('.carousel-caption');
        openModalFromData({
          img: img?.src || '',
          title: caption?.querySelector('h3')?.textContent || '',
          desc: caption?.querySelector('p')?.textContent || ''
        });
      });
    });

    // autoplay
    function startAutoplay() {
      if (autoplayId) return;
      autoplayId = setInterval(() => {
        scrollToIndex(current + 1);
      }, 6000);
    }

    function stopAutoplay() {
      if (!autoplayId) return;
      clearInterval(autoplayId);
      autoplayId = null;
    }

    // pause on hover/focus
    track.addEventListener('mouseenter', stopAutoplay);
    track.addEventListener('mouseleave', startAutoplay);
    track.addEventListener('focusin', stopAutoplay);
    track.addEventListener('focusout', startAutoplay);

    // initialize
    // ensure first item centered
    items[0].scrollIntoView({inline: 'center'});
    applyTransforms();
    startAutoplay();
  });

  /* NAVBAR: ensure keyboard shows labels on focus */
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('focus', () => link.classList.add('focus'));
    link.addEventListener('blur', () => link.classList.remove('focus'));
  });

});
