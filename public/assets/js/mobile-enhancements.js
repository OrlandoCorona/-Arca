/**
 * Mobile Enhancement Layer
 * - Scroll Animations
 * - Touch Ripple Effects
 * - Floating CTA Logic
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. RIPPLE EFFECT ---
    function createRipple(event) {
        const button = event.currentTarget;
        
        const circle = document.createElement("span");
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        const radius = diameter / 2;

        const rect = button.getBoundingClientRect();
        
        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${event.clientX - rect.left - radius}px`;
        circle.style.top = `${event.clientY - rect.top - radius}px`;
        circle.classList.add("ripple");

        const ripple = button.getElementsByClassName("ripple")[0];

        if (ripple) {
            ripple.remove();
        }

        button.appendChild(circle);
    }

    // Apply ripple to buttons and zones
    const buttons = document.querySelectorAll('.btn, .zone, .nav-link, .intro-card, .product-card');
    buttons.forEach(btn => {
        btn.style.position = 'relative'; // Ensure relative positioning
        btn.style.overflow = 'hidden';   // Ensure ripple is contained
        btn.addEventListener('click', createRipple);
    });


    // --- 2. SCROLL ANIMATIONS ---
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                // Optional: Stop observing once visible if we don't want toggle effect
                // observer.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.reveal-on-scroll');
    revealElements.forEach(el => observer.observe(el));


    // --- 3. FLOATING CTA VISIBILITY ---
    const floatingCTA = document.getElementById('mobile-floating-cta');
    const heroSection = document.querySelector('.hero');
    
    if (floatingCTA && heroSection) {
        window.addEventListener('scroll', () => {
            const heroBottom = heroSection.getBoundingClientRect().bottom;
            
            // Show CTA when user scrolls past hero
            if (heroBottom < 100) {
                floatingCTA.classList.add('show');
            } else {
                floatingCTA.classList.remove('show');
            }
        });
    }
});
