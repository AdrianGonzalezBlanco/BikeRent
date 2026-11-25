// Filtra por modelo las tarjetas que Blade ya ha pintado en el catálogo
export function initCatalogFilter() {
    const select = document.querySelector('[data-catalog-select]');
    const items = document.querySelectorAll('[data-catalog-item]');
    const status = document.querySelector('[data-catalog-status]');

    if (!select || !status) {
        return;
    }

    const describe = (model, count) => {
        if (count === 0) {
            return `No hay bicicletas del modelo ${model}.`;
        }

        return `Mostrando ${count} ${count === 1 ? 'bicicleta' : 'bicicletas'}.`;
    };

    const applyFilter = () => {
        const model = select.value;
        let visible = 0;

        items.forEach((item) => {
            const matches = model === '' || item.dataset.model === model;

            item.hidden = !matches;

            if (matches) {
                visible++;
            }
        });

        status.textContent = describe(model, visible);
    };

    select.addEventListener('change', applyFilter);
}
