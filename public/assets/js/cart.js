/**
 * =========================================
 * SHOPPING CART LOGIC — EL ARCA
 * Archivo: /assets/js/cart.js
 * =========================================
 */

const Cart = {
    items: JSON.parse(localStorage.getItem('arca_cart')) || [],

    init() {
        this.renderCartIcon();
        this.setupListeners();
        this.renderCartPanel();
    },

    save() {
        localStorage.setItem('arca_cart', JSON.stringify(this.items));
        this.renderCartIcon();
        this.renderCartPanel();
    },

    add(product) {
        const existing = this.items.find(i => i.name === product.name);
        if (existing) {
            existing.qty++;
        } else {
            this.items.push({ ...product, qty: 1 });
        }
        this.save();
        this.open();
    },

    remove(name) {
        this.items = this.items.filter(i => i.name !== name);
        this.save();
    },

    updateQty(name, change) {
        const item = this.items.find(i => i.name === name);
        if (!item) return;

        item.qty += change;
        if (item.qty <= 0) {
            this.remove(name);
        } else {
            this.save();
        }
    },

    clear() {
        this.items = [];
        this.save();
    },

    total() {
        // Assuming price is stored as number or we parse it
        // For this demo, since prices were "$--", we'll simulate logic or assume valid data
        // If logic changes to real prices, update parse logic here.
        // For now, let's assume item.price is a number.
        return this.items.reduce((sum, item) => sum + (item.price * item.qty), 0);
    },

    open() {
        document.body.classList.add('cart-open');
    },

    close() {
        document.body.classList.remove('cart-open');
    },

    setupListeners() {
        // Global delegation for Add to Cart buttons
        document.addEventListener('click', (e) => {
            if (e.target.closest('.add-to-cart') || e.target.closest('.add-to-cart-btn')) {
                const btn = e.target.closest('.add-to-cart') || e.target.closest('.add-to-cart-btn');
                const card = btn.closest('.product-card') || btn.closest('.modal-content');
                if (!card) return;

                // Try to get data from card dataset first
                let name = card.dataset.name;
                let price = parseFloat(card.dataset.price || 0);
                let img = card.dataset.img;

                // If in modal, might need fallback
                if (!name && card.querySelector('h3')) name = card.querySelector('h3').textContent;
                // Mock price if missing
                if (!price) price = 150;

                if (card.querySelector('img')) img = card.querySelector('img').src;

                this.add({ name, price, img });
            }

            // Close cart
            if (e.target.closest('.cart-close') || e.target.classList.contains('cart-overlay')) {
                this.close();
            }

            // Open cart
            if (e.target.closest('.nav-cart-trigger')) {
                e.preventDefault();
                this.open();
            }
        });

        // Delegated cart actions (inc, dec, remove)
        document.addEventListener('click', (e) => {
            const action = e.target.dataset.action;
            const name = e.target.dataset.name;
            if (!action || !name) return;

            if (action === 'inc') this.updateQty(name, 1);
            if (action === 'dec') this.updateQty(name, -1);
            if (action === 'remove') this.remove(name);
        });
    },

    renderCartIcon() {
        const count = this.items.reduce((sum, i) => sum + i.qty, 0);
        const badge = document.getElementById('cart-badge');
        if (badge) {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
            badge.classList.add('bump');
            setTimeout(() => badge.classList.remove('bump'), 300);
        }
    },

    renderCartPanel() {
        let panel = document.getElementById('cart-panel');
        if (!panel) return; // Panel not injected yet

        const container = panel.querySelector('.cart-items');
        const totalEl = panel.querySelector('.cart-total-amount');

        if (this.items.length === 0) {
            container.innerHTML = '<div class="empty-cart">Tu carrito está vacío</div>';
            if (totalEl) totalEl.textContent = '$0.00';
            return;
        }

        container.innerHTML = this.items.map(item => `
      <div class="cart-item">
        <img src="${item.img}" alt="${item.name}">
        <div class="cart-item-info">
          <h4>${item.name}</h4>
          <span class="cart-item-price">$${item.price.toFixed(2)}</span>
          <div class="cart-controls">
            <button data-action="dec" data-name="${item.name}">-</button>
            <span>${item.qty}</span>
            <button data-action="inc" data-name="${item.name}">+</button>
          </div>
        </div>
        <button class="cart-remove" data-action="remove" data-name="${item.name}">×</button>
      </div>
    `).join('');

        if (totalEl) totalEl.textContent = '$' + this.total().toFixed(2);
    }
};

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // Inject Cart HTML if missing
    if (!document.getElementById('cart-panel')) {
        const cartHTML = `
      <div class="cart-overlay"></div>
      <aside id="cart-panel" class="cart-panel">
        <header class="cart-header">
          <h3>Tu Orden</h3>
          <button class="cart-close">×</button>
        </header>
        <div class="cart-items"></div>
        <footer class="cart-footer">
          <div class="cart-total">
            <span>Total:</span>
            <span class="cart-total-amount">$0.00</span>
          </div>
          <button class="btn btn-animated btn-block" onclick="alert('Funcionalidad de pago próximamente')">
            <span class="text">Finalizar Compra</span>
          </button>
        </footer>
      </aside>
    `;
        document.body.insertAdjacentHTML('beforeend', cartHTML);
    }

    Cart.init();
});
