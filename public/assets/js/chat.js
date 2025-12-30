/**
 * =========================================
 * AI CHAT WIDGET — EL ARCA
 * Archivo: /assets/js/chat.js
 * =========================================
 */

const AIChat = {
    isOpen: false,
    history: [],

    init() {
        this.injectHTML();
        this.cacheDOM();
        this.bindEvents();
        // Welcome message
        setTimeout(() => this.addMessage('assistant', '¡Hola! Soy el asistente virtual de El Arca. 🌿 ¿En qué puedo ayudarte hoy?'), 800);
    },

    injectHTML() {
        const html = `
      <div id="ai-chat-widget" class="ai-widget">
        <button id="chat-toggle" class="chat-toggle-btn">
          <span class="icon">💬</span>
        </button>
        
        <div class="chat-window">
          <header class="chat-header">
            <div class="chat-avatar">🤖</div>
            <div class="chat-title">
              <h3>Asistente El Arca</h3>
              <span class="status">En línea</span>
            </div>
            <button id="chat-close" class="chat-close-btn">×</button>
          </header>
          
          <div id="chat-messages" class="chat-messages">
            <!-- Messages go here -->
          </div>

          <div class="chat-input-area">
            <input type="text" id="chat-input" placeholder="Escribe tu duda..." autocomplete="off">
            <button id="chat-send">➤</button>
          </div>
        </div>
      </div>
    `;
        document.body.insertAdjacentHTML('beforeend', html);
    },

    cacheDOM() {
        this.widget = document.getElementById('ai-chat-widget');
        this.toggleBtn = document.getElementById('chat-toggle');
        this.closeBtn = document.getElementById('chat-close');
        this.window = this.widget.querySelector('.chat-window');
        this.messagesContainer = document.getElementById('chat-messages');
        this.input = document.getElementById('chat-input');
        this.sendBtn = document.getElementById('chat-send');
    },

    bindEvents() {
        this.toggleBtn.addEventListener('click', () => this.toggle());
        this.closeBtn.addEventListener('click', () => this.toggle());

        this.sendBtn.addEventListener('click', () => this.handleSend());
        this.input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.handleSend();
        });
    },

    toggle() {
        this.isOpen = !this.isOpen;
        this.widget.classList.toggle('open', this.isOpen);
        if (this.isOpen) {
            setTimeout(() => this.input.focus(), 300);
        }
    },

    handleSend() {
        const text = this.input.value.trim();
        if (!text) return;

        // User message
        this.addMessage('user', text);
        this.input.value = '';

        // AI thinking simulation
        this.showTyping();

        // Response logic
        setTimeout(() => {
            this.hideTyping();
            const response = this.generateResponse(text);
            this.addMessage('assistant', response);
        }, 1500);
    },

    addMessage(sender, text) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `message ${sender}`;
        msgDiv.innerHTML = `<p>${text}</p>`;
        this.messagesContainer.appendChild(msgDiv);
        this.scrollToBottom();
    },

    showTyping() {
        const typing = document.createElement('div');
        typing.id = 'typing-indicator';
        typing.className = 'message assistant typing';
        typing.innerHTML = `<span>•</span><span>•</span><span>•</span>`;
        this.messagesContainer.appendChild(typing);
        this.scrollToBottom();
    },

    hideTyping() {
        const el = document.getElementById('typing-indicator');
        if (el) el.remove();
    },

    scrollToBottom() {
        this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
    },

    generateResponse(input) {
        const lower = input.toLowerCase();

        if (lower.includes('reserv') || lower.includes('mesa')) {
            return 'Puedes reservar directamente en nuestra sección de <a href="/?view=reservaciones">Reservaciones</a>. Recuerda que abrimos de Martes a Sábado (12-7PM) y Domingo (12-6PM).';
        }

        if (lower.includes('horario') || lower.includes('hora') || lower.includes('abierto')) {
            return 'Nuestro horario es:<br>Martes a Sábado: 12:00 PM - 7:00 PM<br>Domingo: 12:00 PM - 6:00 PM<br>Lunes: Cerrado.';
        }

        if (lower.includes('menu') || lower.includes('comida') || lower.includes('carta')) {
            return 'Contamos con una deliciosa variedad de platillos. ¡No te pierdas nuestros tacos de asada y las micheladas especiales! Puedes ver el menú completo <a href="/?view=menu">aquí</a>.';
        }

        if (lower.includes('ubicacion') || lower.includes('donde') || lower.includes('llegar')) {
            return 'Estamos ubicados en una zona natural privilegiada. Puedes encontrarnos fácilmente usando Google Maps buscando "Restaurante Bar El Arca".';
        }

        return '¡Qué interesante! Si tienes dudas específicas sobre el menú o reservaciones, estoy aquí para ayudar. También puedes contactarnos por teléfono para atención personalizada.';
    }
};

document.addEventListener('DOMContentLoaded', () => {
    AIChat.init();
});
