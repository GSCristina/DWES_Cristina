# 03 · Pruebas y evidencias

> Antes de entregar, **repite cada comprobación** y confirma que el «resultado obtenido» es cierto. Sustituye los nombres de captura y los hashes por los reales.

| Nº | Comprobación | Resultado esperado | Resultado obtenido | Evidencia |
|---|---|---|---|---|
| 1 | Migraciones | Tablas y claves foráneas correctas | `php artisan migrate:status` muestra las 4 migraciones propias como `Ran`; existen `brands`, `ingredients`, `products` e `ingredient_product` con sus claves foráneas | `evidencias/v1-migrate-status.png` · commit `v1-modelos-migraciones` |
| 2 | Relación 1:N | Se muestra la entidad padre en el catálogo | Cada fila del listado muestra la marca del producto | `evidencias/v2-index.png` |
| 3 | Relación N:M | Se muestran varias entidades asociadas | El detalle muestra varios ingredientes por producto; los alérgenos se destacan | `evidencias/v2-show.png` |
| 4 | Index | Listado visible y navegable | Listado de 10 productos por página con paginación | `evidencias/v4-paginacion.png` |
| 5 | Show | Detalle del registro | Se muestran marca, descripción, precio, stock, estado e ingredientes | `evidencias/v2-show.png` |
| 6 | Create/store | Nuevo registro persistido | Tras guardar, redirige al detalle con mensaje de éxito y el producto aparece en el listado | `evidencias/v3-create.png` |
| 7 | Edit/update | Cambios persistidos | El formulario aparece relleno; tras guardar se ven los cambios, incluidos los ingredientes (`sync`) | `evidencias/v3-edit.png` |
| 8 | Destroy | Registro eliminado o desactivado según diseño | El producto se elimina con confirmación, vuelve al listado con mensaje de éxito y las filas de la pivote se borran por `cascadeOnDelete` | `evidencias/v3-delete.png` |
| 9 | Validación | Error visible sin perder datos válidos del formulario | Con nombre vacío y precio negativo se muestran los errores y se conservan los demás campos gracias a `old()` | `evidencias/v3-validacion.png` |
| 10 | Factory/Seeder | Al menos 20 registros y relaciones válidas | `migrate:fresh --seed` genera 28 productos (3 fijos + 25 Factory), 10 marcas, 16 ingredientes y relaciones sin duplicados | `evidencias/v4-seed.png` · commit `v4-factories-seeders` |
| 11 | Filtro y paginación | Resultados correctos | El buscador y el filtro por marca devuelven solo las coincidencias y se mantienen al cambiar de página | `evidencias/v5-filtro.png` |
| 12 | Registro inexistente | Respuesta 404 controlada | `/products/9999` y el producto ya borrado devuelven 404 | `evidencias/v5-404.png` |

## Comprobaciones adicionales

### Carga anticipada (N+1)
Se activó `Model::preventLazyLoading(! app()->isProduction())` en `AppServiceProvider`. Se recorrió el listado, el detalle, la creación, la edición y el borrado sin que se lanzara ninguna excepción, por lo que todas las relaciones se cargan con `with()` o `load()`. El listado usa un número fijo de consultas (productos, marcas e ingredientes) independientemente del número de productos.

### Casos límite
| Caso | Resultado |
|---|---|
| Producto sin ingredientes (`sync([])`) | Se guarda y se muestra «Sin ingredientes» |
| Búsqueda sin coincidencias | Mensaje «No hay productos que coincidan.» |
| Producto sin stock | Aparece como «Agotado» |
| Eliminar marca con productos | Bloqueado por `restrictOnDelete` (no hay CRUD de marcas en la web) |

## Lista de capturas (12–18)

1. `v1-migrate-status.png`: estado de las migraciones.
2. `v1-tablas.png`: esquema de la base de datos (tablas y pivote).
3. `v2-routes.png`: `php artisan route:list`.
4. `v2-index.png`: listado con marca e ingredientes.
5. `v2-show.png`: detalle del producto.
6. `v2-404.png`: producto inexistente.
7. `v3-create.png`: formulario de creación.
8. `v3-validacion.png`: errores de validación con datos conservados.
9. `v3-edit.png`: formulario de edición con ingredientes marcados.
10. `v3-delete.png`: mensaje tras eliminar.
11. `v4-seed.png`: salida de `migrate:fresh --seed`.
12. `v4-paginacion.png`: catálogo paginado.
13. `v5-filtro.png`: búsqueda y filtro por marca.
14. `v5-404.png`: 404 controlado.

Cada captura debe llevar una línea de explicación en el diario o en esta tabla.
