# BeautyShop · Catálogo de cosmética

Proyecto final del módulo **Desarrollo Web en Entorno Servidor** (2.º DAW) · IES Francisco de los Ríos.
Alumna: Cristina · Tienda nº 9: **Cosmética** (`Product`, `Ingredient`, `Brand`).

## Temática

Aplicación web para gestionar el catálogo de una tienda de cosmética inspirada en una perfumería: productos, marcas y los ingredientes que componen cada producto. No incluye pagos, carrito, autenticación ni pedidos.

## Funcionalidades

- CRUD completo de productos (las 7 acciones de un Resource Controller).
- Relación 1:N (marca → productos) y N:M (productos ↔ ingredientes, tabla pivote `ingredient_product`).
- Validación con Form Requests y mensajes en español.
- Buscador por nombre, filtro por marca y paginación.
- Carga anticipada con `with()` y comprobación de N+1.
- Factory y Seeders con 28 productos (3 fijos reconocibles).

## Requisitos

- PHP [8.x: indica tu versión con `php -v`]
- Composer
- Laravel 13
- SQLite (extensión `pdo_sqlite` de PHP habilitada)

## Instalación

```powershell
git clone <url-del-repositorio>
cd sephora-shop
composer install
copy .env.example .env
php artisan key:generate
New-Item database\database.sqlite -ItemType File
php artisan migrate:fresh --seed
php artisan serve
```

Abre `http://127.0.0.1:8000`.

### Configuración de la base de datos

En `.env` debe aparecer:

```dotenv
DB_CONNECTION=sqlite
```

y las líneas `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD` comentadas o eliminadas. No se necesitan credenciales.

Para el idioma de la interfaz:

```dotenv
APP_LOCALE=es
APP_FALLBACK_LOCALE=es
```

> `php artisan migrate:fresh --seed` **borra todos los datos**: úsalo solo en una base de datos de desarrollo.

## Datos de demostración

Tras el seeder hay 10 marcas, 16 ingredientes y 28 productos. Registros fijos reconocibles:

| Producto | Marca | Nota |
|---|---|---|
| Capture Totale Sérum | Dior | 3 ingredientes |
| Soft Pinch Blush | Rare Beauty | Sin stock → «Agotado» |
| Retinol 0.5% en Escualano | The Ordinary | 2 ingredientes |

## Estructura

```
app/Http/Controllers/ProductController.php
app/Http/Requests/{Store,Update}ProductRequest.php
app/Models/{Brand,Ingredient,Product}.php
database/{factories,migrations,seeders}
resources/views/{layouts,products,errors}
routes/web.php
public/css/app.css
lang/es/pagination.php
docs/
```

## Decisiones técnicas

- **SQLite** en lugar de MySQL/MariaDB, con autorización del profesor: no requiere servidor y es el valor por defecto de Laravel 13.
- `Ingredient` representa composición, no inventario.
- Clave primaria compuesta en la pivote para evitar duplicados y `restrictOnDelete` en `brand_id` para proteger la integridad.
- `is_available` se deriva del stock en la Factory y los Seeders.
- `Model::preventLazyLoading()` activo fuera de producción para detectar N+1.

## Documentación

- [`docs/01-diseno.md`](docs/01-diseno.md): diseño, modelos, diagrama y justificación.
- [`docs/02-diario-desarrollo.md`](docs/02-diario-desarrollo.md): diario por versiones, con incidencias y soluciones.
- [`docs/03-pruebas.md`](docs/03-pruebas.md): las 12 comprobaciones y capturas.
- [`docs/evidencias/`](docs/evidencias/): capturas.

## Versiones

| Versión | Contenido | Commit |
|---|---|---|
| V0 | Análisis y diseño | `v0-diseno` |
| V1 | Proyecto, migraciones y modelos | `v1-modelos-migraciones` |
| V2 | Catálogo de lectura | `v2-catalogo` |
| V3 | CRUD funcional | `v3-crud` |
| V4 | Factories y Seeders | `v4-factories-seeders` |
| V5 | Calidad y presentación final | `v5-calidad-final` |

## Lista final de verificación

- [x] He elegido y justificado una tienda.
- [x] He creado tres modelos y ambas relaciones.
- [x] He implementado las siete acciones del Resource Controller principal.
- [x] Las vistas y formularios funcionan en el navegador.
- [x] La relación N:M se consulta y modifica desde el CRUD.
- [x] Los formularios validan los datos y muestran los errores.
- [x] Faker, Factory y Seeders generan un catálogo coherente.
- [x] He añadido filtro o búsqueda, paginación y `with()`.
- [x] He documentado cada versión y realizado sus pruebas.
- [x] El README permite reproducir la instalación sin credenciales privadas.
