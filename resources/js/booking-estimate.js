const decimal = new Intl.NumberFormat('es-ES', { maximumFractionDigits: 2 });
const euros = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' });
const EMPTY = '—';

// Horas entre inicio y fin (0 si las fechas no son válidas o el fin no es posterior)
const hoursBetween = (start, end) => {
    const ms = new Date(end) - new Date(start);

    return Number.isFinite(ms) && ms > 0 ? ms / 3600000 : 0;
};

// Muestra la duración y el importe estimado mientras se rellenan las fechas (el total real lo calcula el servidor)
export function initBookingEstimate() {
    const form = document.querySelector('[data-booking-form]');
    const duration = document.querySelector('[data-estimate-duration]');
    const total = document.querySelector('[data-estimate-total]');

    if (!form || !duration || !total) {
        return;
    }

    const pricePerHour = Number(form.dataset.pricePerHour);
    const { start_time: startInput, end_time: endInput } = form.elements;

    const update = () => {
        const hours = hoursBetween(startInput.value, endInput.value);

        duration.textContent = hours ? `${decimal.format(hours)} h` : EMPTY;
        total.textContent = hours ? euros.format(hours * pricePerHour) : EMPTY;
    };

    [startInput, endInput].forEach((input) => {
        input.addEventListener('input', update);
    });

    update();
}
