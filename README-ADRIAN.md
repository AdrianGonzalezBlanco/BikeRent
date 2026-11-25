## Cómo ejecutar el proyecto

Uso Laravel Sail (Docker), así que no hace falta tener PHP ni Node instalados en el ordenador. Todos los comandos se escriben desde la carpeta del proyecto.

**La primera vez:**

```bash
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail npm install
./vendor/bin/sail artisan migrate --seed
```

**Cada vez que quiera trabajar:**

```bash
./vendor/bin/sail up -d
./vendor/bin/sail npm run dev
```

`npm run dev` deja Vite funcionando: cada vez que guardo un archivo de CSS o JS, el navegador se actualiza solo.

Después se abre `http://localhost/bikes`. Para entrar se puede usar el usuario de prueba: `test@example.com` con la contraseña `password`.

## Cómo está organizado el JavaScript

Todo el JavaScript está en la carpeta `resources/js`. Cada archivo se encarga de una sola cosa:

| Archivo | Qué hace |
|---|---|
| `app.js` | Es el punto de entrada. Solo importa los demás archivos y los arranca. |
| `theme.js` | El botón de la navbar que cambia entre tema claro y oscuro. Cambia la clase de `<html>` y guarda la elección en `localStorage`. |
| `modal.js` | Abre y cierra la ventana de confirmación para eliminar la cuenta (en el perfil). |
| `catalog-filter.js` | El filtro por modelo del catálogo. Oculta o muestra las tarjetas sin recargar la página. |
| `booking-estimate.js` | En el formulario de reserva, calcula la duración y el total estimado mientras se rellenan las fechas. |
| `booking-validation.js` | Comprueba el formulario de reserva antes de enviarlo: el inicio no puede ser anterior a ahora y el fin tiene que ser posterior al inicio. Si hay errores, los muestra junto a los campos. |

Cada archivo exporta una función (`initTheme`, `initModals`, `initCatalogFilter`...) y `app.js` las llama todas.

Para no mezclar el JavaScript con el HTML, las vistas de Blade solo llevan atributos `data-...` (por ejemplo `data-catalog-select` o `data-booking-form`). El JavaScript busca esos atributos con `querySelector`. Si en la página actual no existe el elemento, la función no hace nada, así que `app.js` se puede cargar en todas las páginas sin dar errores.

No uso ninguna librería de JavaScript: todo es JavaScript normal con `addEventListener`, `classList` y `textContent`.

Hay un único script dentro del HTML, en `resources/views/components/layout/base.blade.php`. Es muy corto y sirve para poner el tema (claro u oscuro) antes de que se pinte la página. Si esperara a que cargue `app.js`, se vería un parpadeo del tema equivocado.

La validación del navegador solo sirve para avisar al usuario al momento. La validación definitiva (fechas, disponibilidad, solapamientos) la sigue haciendo el servidor con Laravel.

## Cómo se carga con Vite

- En `vite.config.js` están las dos entradas de la aplicación: `resources/css/app.css` y `resources/js/app.js`.
- En el layout base (`resources/views/components/layout/base.blade.php`) se cargan con una sola línea: `@vite(['resources/css/app.css', 'resources/js/app.js'])`. Como todas las páginas usan ese layout, no hay que repetirla en ninguna vista.
- Con `npm run dev`, Vite sirve los archivos y los actualiza al guardar.
