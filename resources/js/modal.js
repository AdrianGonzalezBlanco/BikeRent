// Ventanas modales con el elemento <dialog>: el navegador gestiona Escape, el foco y el fondo
const openModal = (dialog) => {
    dialog.showModal();
    document.body.classList.add('is-modal-open');
};

export function initModals() {
    document.querySelectorAll('[data-modal-open]').forEach((trigger) => {
        const dialog = document.getElementById(`modal-${trigger.dataset.modalOpen}`);

        if (dialog) {
            trigger.addEventListener('click', () => openModal(dialog));
        }
    });

    document.querySelectorAll('dialog[data-modal]').forEach((dialog) => {
        dialog.querySelectorAll('[data-modal-close]').forEach((button) => {
            button.addEventListener('click', () => dialog.close());
        });

        // Un clic en el fondo oscuro cierra la ventana
        dialog.addEventListener('click', (event) => {
            if (event.target === dialog) {
                dialog.close();
            }
        });

        dialog.addEventListener('close', () => {
            document.body.classList.remove('is-modal-open');
        });

        // Se abre sola cuando el servidor devuelve errores de su formulario
        if (dialog.hasAttribute('data-modal-open-on-load')) {
            openModal(dialog);
        }
    });
}
