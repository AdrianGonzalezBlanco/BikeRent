import Alpine from 'alpinejs';

const decimal = new Intl.NumberFormat('es-ES', { maximumFractionDigits: 2 });
const euros = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' });

// Calcula la duración y el importe estimado del formulario de reserva
Alpine.data('bookingEstimate', (pricePerHour, start = '', end = '') => ({
    start,
    end,

    get hours() {
        const ms = new Date(this.end) - new Date(this.start);

        return Number.isFinite(ms) && ms > 0 ? ms / 3600000 : 0;
    },

    get duration() {
        return this.hours ? `${decimal.format(this.hours)} h` : '—';
    },

    get total() {
        return this.hours ? euros.format(this.hours * pricePerHour) : '—';
    },
}));
