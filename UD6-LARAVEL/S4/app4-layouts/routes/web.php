<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    $posts = [
        (object) [
            'id' => 1,
            'titulo' => 'Diseño de interfaces',
            'resumen' => 'Asignatura de Javier.',
        ],
        (object) [
            'id' => 2,
            'titulo' => 'Desarrollo web entorno servidor',
            'resumen' => 'Asignatura de Marín.',
        ],
        (object) [
            'id' => 3,
            'titulo' => 'Desarrollo web entorno cliente',
            'resumen' => 'Asignatura de Alfonso.',
        ],
    ];

    return view('posts.index', compact('posts'));
})->name('posts.index');

Route::get('/posts/{id}', function (int $id) {
    $post = (object) [
        'id' => $id,
        'titulo' => 'Mi primer artículo',
        'contenido' => 'Este es el contenido completo del artículo.',
        'comentarios' => [
            (object) [
                'autor' => 'Lucía',
                'contenido' => 'Me ha resultado muy útil.',
            ],
            (object) [
                'autor' => 'Mario',
                'contenido' => 'La explicación es clara.',
            ],
        ],
    ];

    return view('posts.show', compact('post'));
})->name('posts.show');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');