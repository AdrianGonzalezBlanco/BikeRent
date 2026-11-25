const root = document.documentElement;
const toggle = document.querySelector('[data-theme-toggle]');

// El botón indica si el modo oscuro está activado
const sync = () => toggle?.setAttribute('aria-pressed', String(root.classList.contains('dark')));

sync();

toggle?.addEventListener('click', () => {
    const next = root.classList.contains('dark') ? 'light' : 'dark';
    root.className = next;
    sync();

    try {
        localStorage.setItem('theme', next);
    } catch (e) {}
});
