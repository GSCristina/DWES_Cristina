<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/ping', function () {
    return 'pong';
});
Route::match(['get', 'post'], '/formulario', function () {
    return 'Esto responde a GET y POST';
});
Route::get('/hola', function () {
    return 'Hola, soy Cristina!';
});
Route::get('/api/info', function () {
    return response()->json([
        'app'     => 'El blog de Cristina',
        'version' => '1.0',
        'status'  => 'ok',
    ]);
});
Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});

// Pasar datos a la vista
Route::get('/inicio', function () {
    $nombre = 'Curso Cristina';
    $articulos = ['Laravel', 'JavaScript', 'Diseño de interfaces'];

    return view('inicio', compact('nombre', 'articulos'));
    // equivalente a:
    // return view('inicio', ['nombre' => $nombre, 'articulos' => $articulos]);
});
// Redirigir con código de estado
Route::get('/antigua', function () {
    return redirect('/hola', 301);
    //301 es el codigo de estados permanentes.
});


// Un parámetro
Route::get('/articulos/{id}', function (int $id) {
    return "Mostrando artículo número: {$id}";
});

// Varios parámetros
Route::get('/usuarios/{userId}/articulos/{articleId}', function (int $userId, int $articleId) {
    return "Usuario {$userId}, artículo {$articleId}";
});
Route::get('/articulos2/{categoria?}', function (string $categoria = 'No se ha especificado categoria') {
    return "Categoría: {$categoria}";
});
// Solo acepta números
Route::get('/articulos3/{id}', function (int $id) {
    return "Artículo #{$id}";
})->where('id', '[0-9]+');

// Solo acepta letras
Route::get('/categoria/{nombre}', function (string $nombre) {
    return "Categoría: {$nombre}";
})->where('nombre', '[a-zA-Z]+');

// Usando atajos
//fn es un atajo para funciones anonimas, equivalente a function()
Route::get('/articulos4/{id}', fn(int $id) => $id)->whereNumber('id');
Route::get('/categoria2/{slug}', fn(string $slug) => $slug)->whereAlphaNumeric('slug');


// Definir una ruta con nombre
Route::get('/articulos/{id}', function (int $id) {
    return "Artículo #{$id}";
})->name('articulos.show');

Route::get('/articulos', function () {
    return 'Lista de artículos';
})->name('articulos.index');


Route::prefix('octubre')->group(function () {
    Route::get('/dashboard', fn() => 'Panel de admin')->name('admin.dashboard');
    Route::get('/usuarios', fn() => 'Lista de usuarios con el prefijo octubre')->name('admin.users');
    Route::get('/articulos', fn() => 'Gestión de artículos')->name('admin.articles');
});
// URLs: /admin/dashboard, /admin/usuarios, /admin/articulos
Route::middleware('auth')->group(function () {
    Route::get('/perfil', fn() => 'Mi perfil')->name('profile');
    Route::get('/configuracion', fn() => 'Configuración')->name('settings');
});
Route::resource('user', UserController::class);
Route::apiResource('apiuser', UserController::class);