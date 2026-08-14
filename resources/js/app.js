import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* Theme: default dark, manual toggle persisted in localStorage.
   The <html> class is set pre-paint by an inline script in the layout <head>
   to avoid a flash of the wrong theme (FOUC). */
function applyTheme(theme) {
    document.documentElement.classList.toggle('dark', theme === 'dark');
    const btn = document.querySelector('[data-theme-toggle]');
    if (btn) {
        btn.setAttribute('aria-pressed', String(theme === 'dark'));
    }
}

document.addEventListener('alpine:init', () => {
    Alpine.data('themeToggle', () => ({
        theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
        toggle() {
            this.theme = this.theme === 'dark' ? 'light' : 'dark';
            localStorage.setItem('theme', this.theme);
            applyTheme(this.theme);
        },
    }));
});

/* Scroll reveal: add .is-visible when an element enters the viewport.
   No-ops gracefully when reduced motion is preferred (CSS already shows content). */
const reveals = document.querySelectorAll('.reveal');
if (reveals.length && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    reveals.forEach((el) => io.observe(el));
} else {
    reveals.forEach((el) => el.classList.add('is-visible'));
}
