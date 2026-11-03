<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen: migraciones y modelos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Resumen del proyecto</h1>

    <h2>1. Generación</h2>
    <p><code>php artisan make:model Computer -m</code> crea el modelo y su migración.</p>
    <p><code>php artisan make:model Mobile -m</code> hace lo mismo para el modelo Mobile.</p>

    <h2>2. Migraciones</h2>
    <p>Las migraciones describen la estructura de las tablas. En este proyecto se han creado
    <code>computers</code> y <code>mobiles</code>, con <code>codigo</code> como clave primaria.</p>

    <h2>3. Modelos y clave primaria</h2>
    <p>Los modelos Eloquent representan las tablas. Como la clave no se llama <code>id</code>,
    cada modelo declara <code>$primaryKey = 'codigo'</code>. También se configura que la clave
    no se autoincremente.</p>

    <h2>4. Asignación masiva</h2>
    <p><code>$fillable</code> define una lista permitida de atributos. <code>$guarded</code>
    define atributos protegidos. La protección se aplica a métodos de asignación masiva como
    <code>create()</code> y <code>fill()</code>, no a la asignación individual de propiedades.</p>

    <h2>5. Consultas y vistas</h2>
    <p><code>all()</code> recupera todos los registros. <code>find($codigo)</code> busca un
    registro por su clave primaria. Los datos se pasan desde la ruta a Blade mediante
    <code>view(..., compact(...))</code>.</p>

    <h2>6. ¿Por qué no usamos with()?</h2>
    <p><code>with()</code> sirve para cargar anticipadamente una relación Eloquent, por ejemplo
    <code>Computer::with('components')</code>, siempre que exista un método de relación
    <code>components()</code> en el modelo. Como este proyecto no crea relaciones, llamar a
    <code>with()</code> con un nombre de relación produciría un error. Se estudiará cuando se
    incorporen relaciones entre modelos.</p>

    <h2>7. Flujo de datos</h2>
    <p>El navegador solicita una ruta; la ruta consulta los modelos; la consulta devuelve
    modelos o colecciones; la ruta los entrega a una vista; Blade muestra los datos.</p>

    <p><a href="{{ route('catalogo') }}">Volver al catálogo</a></p>
</body>
</html>