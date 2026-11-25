const THEME_KEY = 'theme';

// Botón que alterna entre tema claro y oscuro cambiando la clase de <html>
export function initTheme() {
    const root = document.documentElement;
    const toggle = document.querySelector('[data-theme-toggle]');

    if (!toggle) {
        return;
    }

    const isDark = () => root.classList.contains('dark');

    // Indica la acción disponible (lo que pasará al pulsar)
    const updateLabel = () => {
        const label = isDark() ? 'Cambiar a modo claro' : 'Cambiar a modo oscuro';

        toggle.setAttribute('aria-label', label);
        toggle.title = label;
    };

    const saveTheme = (theme) => {
        try {
            localStorage.setItem(THEME_KEY, theme);
        } catch (error) {
            // Sin almacenamiento disponible: el tema solo dura esta visita
        }
    };

    toggle.addEventListener('click', () => {
        const theme = isDark() ? 'light' : 'dark';

        root.classList.remove('light', 'dark');
        root.classList.add(theme);

        updateLabel();
        saveTheme(theme);
    });

    updateLabel();
}
