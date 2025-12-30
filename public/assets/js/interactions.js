/**
 * =========================================
 * ADVANCED INTERACTIONS — EL ARCA
 * Archivo: /assets/js/interactions.js
 * =========================================
 * - 3D Tilt Effect (Cards)
 * - Hero Parallax
 * - Text Wave Animation
 * - Fly-to-Cart Animation
 * =========================================
 */

document.addEventListener('DOMContentLoaded', () => {

  /* =====================================
   * 1. 3D TILT EFFECT
   * ===================================== */
  const tiltCards = document.querySelectorAll('.product-card, .intro-card, .carousel-item');

  tiltCards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      
      const rotateX = ((y - centerY) / centerY) * -5; // Max 5deg tilt
      const rotateY = ((x - centerX) / centerX) * 5;

      card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
    });
  });

  /* =====================================
   * 2. HERO PARALLAX
   * ===================================== */
  const hero = document.querySelector('.hero');
  if (hero) {
    hero.addEventListener('mousemove', (e) => {
      const x = (window.innerWidth - e.pageX) / 50;
      const y = (window.innerHeight - e.pageY) / 50;
      
      // Update CSS variables if blobs use them, or direct transform if pseudo-elements
      // Since pseudo-elements are hard to target in JS without CSS vars:
      hero.style.setProperty('--mouse-x', `${x}px`);
      hero.style.setProperty('--mouse-y', `${y}px`);
    });
  }

  /* =====================================
   * 3. FLY TO CART ANIMATION
   * ===================================== */
  document.addEventListener('click', (e) => {
    // Check for our new specific button class
    if (e.target.closest('.add-to-cart-btn')) {
      const btn = e.target.closest('.add-to-cart-btn');
      const card = btn.closest('.product-card') || btn.closest('.modal-content'); // Fallback to modal
      
      if (!card) return;

      // Find image to fly
      let img = card.querySelector('img');
      // If no img found in card, try finding it via data attribute or modal logic fallback
      if (!img && card.id === 'productModal') {
          img = card.querySelector('#modalImg');
      }

      const cartIcon = document.querySelector('.nav-cart-trigger img');
      if (!cartIcon || !img) return;

      // Clone image
      const flyImg = img.cloneNode();
      flyImg.classList.add('fly-img');
      
      const rect = img.getBoundingClientRect();
      const endRect = cartIcon.getBoundingClientRect();

      flyImg.style.position = 'fixed';
      flyImg.style.left = `${rect.left}px`;
      flyImg.style.top = `${rect.top}px`;
      flyImg.style.width = `${rect.width}px`;
      flyImg.style.height = `${rect.height}px`;
      flyImg.style.zIndex = '9999';
      flyImg.style.transition = 'all 0.8s cubic-bezier(0.19, 1, 0.22, 1)';
      flyImg.style.borderRadius = '50%';
      flyImg.style.pointerEvents = 'none';
      flyImg.style.opacity = '0.8';
      
      document.body.appendChild(flyImg);

      // Trigger animation
      requestAnimationFrame(() => {
        flyImg.style.left = `${endRect.left}px`;
        flyImg.style.top = `${endRect.top}px`;
        flyImg.style.width = '20px';
        flyImg.style.height = '20px';
        flyImg.style.opacity = '0';
      });

      // Cleanup
      setTimeout(() => {
        flyImg.remove();
        // Here we could manually trigger the cart update if the event bubbling didn't catch it
        // But cart.js delegation should handle it if the class matches.
        // We will update cart.js to also listen for 'add-to-cart-btn'.
      }, 800);
    }
  });

});
