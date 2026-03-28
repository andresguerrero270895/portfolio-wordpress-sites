'use strict';
const MPAnimations = {
    init() {
        this.setupObserver();
        this.setupParallax();
    },

    setupObserver() {
        const els = document.querySelectorAll('.mp-fade-in,.mp-fade-in-left,.mp-fade-in-right,.mp-scale-in');
        if (els.length === 0) return;
        if (window.matchMedia('(prefers-reduced-motion:reduce)').matches) {
            els.forEach(el => { var cls = ['mp-fade-in','mp-fade-in-left','mp-fade-in-right','mp-scale-in']; cls.forEach(c => { if(el.classList.contains(c)) el.classList.add(c+'--visible'); }); });
            return;
        }
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    var cls = ['mp-fade-in','mp-fade-in-left','mp-fade-in-right','mp-scale-in'];
                    cls.forEach(c => { if(entry.target.classList.contains(c)) entry.target.classList.add(c+'--visible'); });
                    observer.unobserve(entry.target);
                }
            });
        }, { rootMargin:'0px 0px -50px 0px', threshold:0.15 });
        els.forEach(el => observer.observe(el));
    },

    setupParallax() {
        const floats = document.querySelectorAll('.mp-hero__float');
        if (floats.length === 0 || window.innerWidth < 768) return;
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const y = window.scrollY;
                    floats.forEach((f,i) => { f.style.transform = 'translateY('+y*(0.1+i*0.05)+'px)'; });
                    ticking = false;
                });
                ticking = true;
            }
        });
    }
};
document.addEventListener('DOMContentLoaded', () => MPAnimations.init());
