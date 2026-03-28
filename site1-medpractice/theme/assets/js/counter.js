'use strict';
const MPCounter = {
    init() {
        this.counters = document.querySelectorAll('.mp-counter');
        if (this.counters.length === 0) return;
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) { this.animate(entry.target); observer.unobserve(entry.target); }
            });
        }, { threshold: 0.5 });
        this.counters.forEach(c => observer.observe(c));
    },

    animate(el) {
        const target = parseInt(el.getAttribute('data-count'),10);
        const duration = 2000;
        const start = performance.now();
        const easeOut = (t) => 1 - Math.pow(1-t,4);
        const update = (now) => {
            const progress = Math.min((now-start)/duration,1);
            const current = Math.floor(easeOut(progress)*target);
            el.textContent = current >= 1000 ? current.toLocaleString('en-US') : current;
            if (progress < 1) requestAnimationFrame(update);
            else el.textContent = target >= 1000 ? target.toLocaleString('en-US') : target;
        };
        requestAnimationFrame(update);
    }
};
document.addEventListener('DOMContentLoaded', () => MPCounter.init());
