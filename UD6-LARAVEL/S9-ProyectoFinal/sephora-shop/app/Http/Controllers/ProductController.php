<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['brand', 'ingredients'])
            ->when($request->filled('q'), fn ($query) =>
                $query->where('name', 'like', '%' . $request->q . '%'))
            ->when($request->filled('brand'), fn ($query) =>
                $query->where('brand_id', $request->brand))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('products.index', [
            'products' => $products,
            'brands'   => Brand::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('products.create', [
            'product'     => new Product(),
            'brands'      => Brand::orderBy('name')->get(),
            'ingredients' => Ingredient::orderBy('name')->get(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['is_available'] = $request->boolean('is_available');

        $product = Product::create($data);
        $product->ingredients()->sync($request->input('ingredients', []));

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $product)
    {
        $product->load(['brand', 'ingredients']);

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load('ingredients');

        return view('products.edit', [
            'product'     => $product,
            'brands'      => Brand::orderBy('name')->get(),
            'ingredients' => Ingredient::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['is_available'] = $request->boolean('is_available');

        $product->update($data);
        $product->ingredients()->sync($request->input('ingredients', []));

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}