<?php

use App\Models\Computer;
use App\Models\Mobile;
use Illuminate\Support\Facades\Route;

Route::get('/catalogo', function () {
    $computers = [
        [
            'codigo' => 101,
            'marca' => 'Lenovo',
            'modelo' => 'ThinkBook 14',
            'procesador' => 'Intel Core i5',
            'ram_gb' => 16,
            'precio' => 599.90,
        ],
        [
            'codigo' => 102,
            'marca' => 'HP',
            'modelo' => 'ProBook 450',
            'procesador' => 'Intel Core i7',
            'ram_gb' => 16,
            'precio' => 780.00,
        ],
        [
            'codigo' => 103,
            'marca' => 'ASUS',
            'modelo' => 'Vivobook 15',
            'procesador' => 'AMD Ryzen 5',
            'ram_gb' => 8,
            'precio' => 629.50,
        ],
    ];

    foreach ($computers as $data) {
        Computer::firstOrCreate(
            ['codigo' => $data['codigo']],
            $data
        );
    }

    $mobiles = [
        [
            'codigo' => 201,
            'marca' => 'Samsung',
            'modelo' => 'Galaxy A56',
            'sistema_operativo' => 'Android',
            'almacenamiento_gb' => 256,
            'imei' => '356789012345671',
            'precio' => 479.00,
        ],
        [
            'codigo' => 202,
            'marca' => 'Apple',
            'modelo' => 'iPhone 16',
            'sistema_operativo' => 'iOS',
            'almacenamiento_gb' => 128,
            'imei' => '356789012345672',
            'precio' => 959.00,
        ],
        [
            'codigo' => 203,
            'marca' => 'Xiaomi',
            'modelo' => 'Redmi Note 14',
            'sistema_operativo' => 'Android',
            'almacenamiento_gb' => 256,
            'imei' => '356789012345673',
            'precio' => 279.90,
        ],
    ];

    foreach ($mobiles as $data) {
        $mobile = Mobile::find($data['codigo']) ?? new Mobile();
        $mobile->codigo = $data['codigo'];
        $mobile->marca = $data['marca'];
        $mobile->modelo = $data['modelo'];
        $mobile->sistema_operativo = $data['sistema_operativo'];
        $mobile->almacenamiento_gb = $data['almacenamiento_gb'];
        $mobile->imei = $data['imei'];
        $mobile->precio = $data['precio'];
        $mobile->save();
    }

    // all() obtiene todos los registros de cada tabla.
    $ordenadores = Computer::all();
    $moviles = Mobile::all();

    return view('catalogo', compact('ordenadores', 'moviles'));
})->name('catalogo');

Route::get('/ordenadores/{codigo}', function (int $codigo) {
    // find() busca por la clave primaria configurada: codigo.
    $ordenador = Computer::find($codigo);

    if ($ordenador === null) {
        abort(404);
    }

    return view('ordenadores.show', compact('ordenador'));
})->name('ordenadores.show');

Route::get('/moviles/{codigo}', function (int $codigo) {
    $movil = Mobile::find($codigo);

    if ($movil === null) {
        abort(404);
    }

    return view('moviles.show', compact('movil'));
})->name('moviles.show');

Route::get('/resumen', function () {
    return view('resumen');
})->name('resumen');