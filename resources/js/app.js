import Alpine from 'alpinejs';
import './booking-estimate';
import { initTheme } from './theme';
import { initCatalogFilter } from './catalog-filter';
import { initBookingValidation } from './booking-validation';

window.Alpine = Alpine;

initTheme();
initCatalogFilter();
initBookingValidation();

Alpine.start();
