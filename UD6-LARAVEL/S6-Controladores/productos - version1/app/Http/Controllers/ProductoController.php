<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // GET /productos: consulta y muestra el catálogo.
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->get();
        return view('productos.index', compact('productos'));
    }

    // GET /productos/crear: presenta el formulario.
    public function create()
    {
        return view('productos.create');
    }

    // POST /productos: valida y guarda el nuevo producto.
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        Producto::create($datos);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto almacenado correctamente.');
    }
}