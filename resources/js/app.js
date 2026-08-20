import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* Theme: default dark, manual toggle persisted in localStorage.
   The <html> class is set pre-paint by an inline script in the layout <head>
   to avoid a flash of the wrong theme (FOUC). The toggle itself is a plain
   global function (not Alpine-scoped) so it can never fail to bind. */
window.toggleTheme = function toggleTheme() {
    const next = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
    document.documentElement.classList.toggle('dark', next === 'dark');
    try {
        localStorage.setItem('theme', next);
    } catch (e) { /* storage may be unavailable; ignore */ }
    const btn = document.querySelector('[data-theme-toggle]');
    if (btn) {
        btn.setAttribute('aria-pressed', String(next === 'dark'));
    }
};

/* Header solidifies on scroll so it never becomes unreadable over content. */
const header = document.querySelector('[data-site-header]');
if (header) {
    const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

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
