# 02 · Diario de desarrollo

> Sustituye los textos entre `[corchetes]` (fechas, nombres de capturas, hashes de commit) por tus datos reales.

---

## Versión 0 — Análisis y diseño — [fecha]

### Objetivo
Elegir tienda, definir los tres modelos, sus campos y las relaciones 1:N y N:M.

### Logros
- Tienda elegida: Cosmética (`Product`, `Brand`, `Ingredient`).
- Diagrama entidad-relación y tabla de campos en `docs/01-diseno.md`.
- Justificada la necesidad de tabla pivote solo en la relación N:M.

### Cambios realizados
- `docs/01-diseno.md`.

### Error o dificultad
Decidir qué representa `Ingredient`. Podía interpretarse como inventario de materias primas o como composición del producto.

### Diagnóstico y solución
La nota de diseño del enunciado aclara que describe composición, no inventario. Por eso no lleva stock y solo tiene `is_allergen` como atributo relevante.

### Evidencias
- `docs/01-diseno.md`
- Commit: `v0-diseno` [hash]

### Pendiente para la siguiente versión
Crear el proyecto Laravel, las migraciones, los modelos y las relaciones.

---

## Versión 1 — Proyecto, migraciones y modelos — [fecha]

### Objetivo
Crear el proyecto Laravel 13, las migraciones (incluida la pivote) y los modelos con sus relaciones.

### Logros
- Proyecto `sephora-shop` creado con Composer.
- Migraciones de `brands`, `ingredients`, `products` e `ingredient_product`.
- Modelos con `$fillable`, `$casts`, `belongsTo`, `hasMany` y `belongsToMany`.

### Cambios realizados
- Migraciones con `foreignId()->constrained()`, `restrictOnDelete()` en `brand_id` y `cascadeOnDelete()` en la pivote.
- Clave primaria compuesta en `ingredient_product`.
- Base de datos **SQLite** (autorizada por el profesor) en lugar de MySQL/MariaDB.

### Error o dificultad
Al lanzar un seeder de pruebas apareció:

```
SQLSTATE[HY000]: General error: 1 no such table: brands (Connection: sqlite ...)
```

### Diagnóstico y solución
Laravel 13 usa SQLite por defecto y las migraciones no se habían ejecutado sobre `database/database.sqlite`. Se comprobó con `php artisan migrate:status`, se verificó el orden de las migraciones (brands → ingredients → products → pivote) y se ejecutó `php artisan migrate:fresh`. Aprendizaje: comprobar siempre `migrate:status` y la conexión (`DB_CONNECTION`) antes de buscar fallos en el código.

### Evidencias
- `docs/evidencias/[v1-migrate-status.png]`: estado de las migraciones.
- Commit: `v1-modelos-migraciones` [hash]

### Pendiente para la siguiente versión
Resource Controller, layout Blade y vistas `index` y `show`.

---

## Versión 2 — Catálogo de lectura (READ) — [fecha]

### Objetivo
Mostrar el catálogo y el detalle con sus relaciones desde el navegador.

### Logros
- `Route::resource('products', ProductController::class)` con las siete rutas verificadas con `php artisan route:list`.
- `index` y `show` con `with(['brand', 'ingredients'])`.
- Layout reutilizable con menú y vistas de listado y detalle.
- Registro inexistente devuelve 404 (route model binding).
- CSS propio (`public/css/app.css`).

### Cambios realizados
- `ProductController`, `routes/web.php`, `layouts/app.blade.php`, `products/index.blade.php`, `products/show.blade.php`, `public/css/app.css`.

### Error o dificultad
1. Al intentar cambiar la vista de paginación con `Paginator::defaultView('pagination::default')` apareció `InvalidArgumentException: View [default] not found.`
2. La URL `/products/1/edit` devolvía una página en blanco.

### Diagnóstico y solución
1. El nombre de vista que se había indicado no existía. Se revirtió el cambio en `AppServiceProvider` y en las rutas, volviendo a un punto estable. Aprendizaje: no usar nombres de vista sin verificar que existen.
2. El método `edit()` generado por `make:controller --resource` estaba vacío, por lo que no devolvía ninguna vista. Se implementó en la versión 3.

### Evidencias
- `docs/evidencias/[v2-index.png]`: listado con marca e ingredientes.
- `docs/evidencias/[v2-show.png]`: detalle del producto.
- `docs/evidencias/[v2-404.png]`: producto inexistente.
- Commit: `v2-catalogo` [hash]

### Pendiente para la siguiente versión
Implementar `create`, `store`, `edit`, `update` y `destroy` con validación.

---

## Versión 3 — CRUD funcional — [fecha]

### Objetivo
CRUD completo del producto, con validación y sincronización de la relación N:M.

### Logros
- Form Requests `StoreProductRequest` y `UpdateProductRequest` con mensajes en español.
- Formulario reutilizable `_form.blade.php` con `@csrf`, `@method('PUT')`, `old()` y errores por campo.
- Selección de ingredientes con casillas y `sync()` en `store` y `update`.
- Mensajes flash tras crear, actualizar y eliminar.
- Botón «Eliminar» en el detalle con confirmación y `@method('DELETE')`.

### Cambios realizados
- `ProductController` completo, `StoreProductRequest`, `UpdateProductRequest`, `products/create.blade.php`, `products/edit.blade.php`, `products/_form.blade.php`.
- `sync([])` con array vacío permite dejar un producto sin ingredientes.

### Error o dificultad
El botón de eliminar no aparecía en el detalle, aunque la ruta `products.destroy` existía.

### Diagnóstico y solución
La vista `show.blade.php` que se estaba usando era la versión anterior, sin el formulario `DELETE`. Se añadió el formulario dentro del bloque de acciones y se refrescó con `php artisan view:clear` y `Ctrl+F5`.

### Evidencias
- `docs/evidencias/[v3-create.png]`, `[v3-edit.png]`, `[v3-validacion.png]`, `[v3-delete.png]`
- Commit: `v3-crud` [hash]

### Pendiente para la siguiente versión
Factories, Seeders y datos de demostración.

---

## Versión 4 — Factories y Seeders — [fecha]

### Objetivo
Generar un catálogo de al menos 20 productos con relaciones coherentes mediante `php artisan migrate:fresh --seed`.

### Logros
- `ProductFactory` con Faker y nombres plausibles; `is_available` se deriva del stock.
- `BrandSeeder` (10 marcas), `IngredientSeeder` (16 ingredientes, 4 alérgenos) y `ProductSeeder`.
- 3 productos fijos reconocibles (Capture Totale Sérum, Soft Pinch Blush, Retinol 0.5% en Escualano) y 25 generados: **28 productos**.
- Relaciones N:M sin duplicados mediante `sync()` y clave primaria compuesta.
- Seeders registrados en `DatabaseSeeder` y eliminado el seeder temporal.

### Cambios realizados
- `database/factories/ProductFactory.php`, `BrandFactory.php`, seeders y `DatabaseSeeder.php`.

### Error o dificultad
1. Al superar los 10 productos apareció la paginación con flechas SVG enormes.
2. Tras arreglarla, los botones mostraban los textos `pagination.previous` y `pagination.next`.

### Diagnóstico y solución
1. La vista de paginación por defecto está pensada para Tailwind, que el proyecto no usa. Solución: `Paginator::useBootstrapFive()` en `AppServiceProvider` y estilos propios en `app.css`.
2. Faltaban los archivos de idioma. Solución: `php artisan lang:publish`, `APP_LOCALE=es` y `lang/es/pagination.php`.

### Evidencias
- `docs/evidencias/[v4-seed.png]`: salida de `migrate:fresh --seed`.
- `docs/evidencias/[v4-paginacion.png]`: catálogo paginado.
- Commit: `v4-factories-seeders` [hash]

### Pendiente para la siguiente versión
Buscador, filtro por marca, casos límite, comprobación N+1 y documentación final.

---

## Versión 5 — Calidad y presentación final — [fecha]

### Objetivo
Pulir la aplicación, revisar casos límite y dejarla instalable desde el README.

### Logros
- Buscador por nombre y filtro por marca, combinables, con `withQueryString()` para conservarlos al paginar.
- Botón «Limpiar» y mensaje específico cuando no hay coincidencias.
- Comprobación de N+1 con `Model::preventLazyLoading()`: listado, detalle, creación, edición y borrado sin excepciones.
- Accesibilidad básica: `lang="es"`, enlace «saltar al contenido», etiquetas `label`, `role="status"`/`role="alert"`, foco visible.
- Casos límite revisados: producto inexistente (404), formulario inválido, borrado con pivote, producto sin ingredientes.

### Cambios realizados
- `ProductController@index`, `products/index.blade.php`, `AppServiceProvider`, `errors/404.blade.php` (si se creó), README y documentación.

### Error o dificultad
Al integrar el formulario de filtros en la vista del listado, se colocó dentro del contenedor `page-header` (flex), lo que desordenaba título, botón y formulario.

### Diagnóstico y solución
El formulario debe ir como bloque independiente entre la cabecera y la tabla. Aprendizaje: respetar la estructura de los contenedores flex del CSS.

### Evidencias
- `docs/evidencias/[v5-filtro.png]`: búsqueda y filtro por marca.
- `docs/evidencias/[v5-404.png]`: 404 controlado.
- Commit: `v5-calidad-final` [hash]

### Pendiente
Ampliaciones voluntarias (V6): CRUD de marcas e ingredientes, Soft Deletes, tests automatizados.
