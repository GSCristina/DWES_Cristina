# 03 · Pruebas y evidencias

| Nº | Comprobación        | Resultado esperado                                     | Resultado obtenido                                                                                                                                                                 |
| --- | -------------------- | ------------------------------------------------------ | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 1   | Migraciones          | Tablas y claves foráneas correctas                    | `php artisan migrate:status` muestra las 4 migraciones propias como `Ran`; existen `brands`, `ingredients`, `products` e `ingredient_product` con sus claves foráneas |
| 2   | Relación 1:N        | Se muestra la entidad padre en el catálogo            | Cada fila del listado muestra la marca del producto                                                                                                                                |
| 3   | Relación N:M        | Se muestran varias entidades asociadas                 | El detalle muestra varios ingredientes por producto; los alérgenos se destacan                                                                                                    |
| 4   | Index                | Listado visible y navegable                            | Listado de 10 productos por página con paginación                                                                                                                                |
| 5   | Show                 | Detalle del registro                                   | Se muestran marca, descripción, precio, stock, estado e ingredientes                                                                                                              |
| 6   | Create/store         | Nuevo registro persistido                              | Tras guardar, redirige al detalle con mensaje de éxito y el producto aparece en el listado                                                                                        |
| 7   | Edit/update          | Cambios persistidos                                    | El formulario aparece relleno; tras guardar se ven los cambios, incluidos los ingredientes (`sync`)                                                                              |
| 8   | Destroy              | Registro eliminado o desactivado según diseño        | El producto se elimina con confirmación, vuelve al listado con mensaje de éxito y las filas de la pivote se borran por `cascadeOnDelete`                                       |
| 9   | Validación          | Error visible sin perder datos válidos del formulario | Con nombre vacío y precio negativo se muestran los errores y se conservan los demás campos gracias a `old()`                                                                   |
| 10  | Factory/Seeder       | Al menos 20 registros y relaciones válidas            | `migrate:fresh --seed` genera 28 productos (3 fijos + 25 Factory), 10 marcas, 16 ingredientes y relaciones sin duplicados                                                        |
| 11  | Filtro y paginación | Resultados correctos                                   | El buscador y el filtro por marca devuelven solo las coincidencias y se mantienen al cambiar de página                                                                            |
| 12  | Registro inexistente | Respuesta 404 controlada                               | `/products/9999` y el producto ya borrado devuelven 404                                                                                                                          |

## Comprobaciones adicionales

### Carga anticipada (N+1)

Se activó `Model::preventLazyLoading(! app()->isProduction())` en `AppServiceProvider`. Se recorrió el listado, el detalle, la creación, la edición y el borrado sin que se lanzara ninguna excepción, por lo que todas las relaciones se cargan con `with()` o `load()`. El listado usa un número fijo de consultas (productos, marcas e ingredientes) independientemente del número de productos.

### Casos límite

| Caso                                     | Resultado                                                            |
| ---------------------------------------- | -------------------------------------------------------------------- |
| Producto sin ingredientes (`sync([])`) | Se guarda y se muestra «Sin ingredientes»                          |
| Búsqueda sin coincidencias              | Mensaje «No hay productos que coincidan.»                          |
| Producto sin stock                       | Aparece como «Agotado»                                             |
| Eliminar marca con productos             | Bloqueado por `restrictOnDelete` (no hay CRUD de marcas en la web) |
