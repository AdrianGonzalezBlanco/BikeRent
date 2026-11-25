// Validación en el navegador del formulario de reserva (la definitiva la hace el servidor)

// Añade o quita el id del mensaje en aria-describedby sin tocar los demás
const setDescribedBy = (input, id, add) => {
    const ids = new Set((input.getAttribute('aria-describedby') ?? '').split(' ').filter(Boolean));

    if (add) {
        ids.add(id);
    } else {
        ids.delete(id);
    }

    if (ids.size > 0) {
        input.setAttribute('aria-describedby', [...ids].join(' '));
    } else {
        input.removeAttribute('aria-describedby');
    }
};

const showError = (input, message) => {
    const zone = document.getElementById(`${input.id}-client-error`);

    zone.textContent = message;
    zone.hidden = false;
    input.setAttribute('aria-invalid', 'true');
    setDescribedBy(input, zone.id, true);
};

const clearError = (input) => {
    const zone = document.getElementById(`${input.id}-client-error`);

    zone.textContent = '';
    zone.hidden = true;
    input.removeAttribute('aria-invalid');
    setDescribedBy(input, zone.id, false);
};

// Devuelve los errores encontrados como { input, message }
const validate = (startInput, endInput) => {
    const errors = [];
    const start = new Date(startInput.value);
    const end = new Date(endInput.value);
    const startIsValid = startInput.value !== '' && !Number.isNaN(start.getTime());
    const endIsValid = endInput.value !== '' && !Number.isNaN(end.getTime());

    if (!startIsValid) {
        errors.push({ input: startInput, message: 'Indica la fecha y hora de inicio.' });
    } else if (start < new Date()) {
        errors.push({ input: startInput, message: 'El inicio no puede ser anterior a ahora.' });
    }

    if (!endIsValid) {
        errors.push({ input: endInput, message: 'Indica la fecha y hora de fin.' });
    } else if (startIsValid && end <= start) {
        errors.push({ input: endInput, message: 'El fin debe ser posterior al inicio.' });
    }

    return errors;
};

export function initBookingValidation() {
    const form = document.querySelector('[data-booking-form]');

    if (!form) {
        return;
    }

    const { start_time: startInput, end_time: endInput } = form.elements;

    form.addEventListener('submit', (event) => {
        [startInput, endInput].forEach(clearError);

        const errors = validate(startInput, endInput);

        if (errors.length === 0) {
            return;
        }

        event.preventDefault();
        errors.forEach(({ input, message }) => showError(input, message));
        errors[0].input.focus();
    });

    // Al corregir un campo se quita su error
    [startInput, endInput].forEach((input) => {
        input.addEventListener('input', () => clearError(input));
    });
}
