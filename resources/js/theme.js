const root = document.documentElement;

document.querySelector('[data-theme-toggle]')?.addEventListener('click', () => {
    const next = root.classList.contains('dark') ? 'light' : 'dark';
    root.className = next;

    try {
        localStorage.setItem('theme', next);
    } catch (e) {}
});