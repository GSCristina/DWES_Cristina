@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')
    <div class="page-header">
        <form method="GET" action="{{ route('products.index') }}" class="filters" role="search">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar producto..." aria-label="Buscar producto">
    <select name="brand" aria-label="Filtrar por marca">
        <option value="">Todas las marcas</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" @selected(request('brand') == $brand->id)>{{ $brand->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn">Filtrar</button>
    @if (request()->hasAny(['q', 'brand']))
        <a class="btn btn-outline" href="{{ route('products.index') }}">Limpiar</a>
    @endif
</form>
        <h1>Catálogo</h1>
        <a class="btn" href="{{ route('products.create') }}">+ Nuevo producto</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Ingredientes</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th><span class="sr-only">Acciones</span></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>{{ $product->brand->name }}</td>
                        <td>
                            @forelse ($product->ingredients as $ingredient)
                                <span class="tag {{ $ingredient->is_allergen ? 'tag-allergen' : '' }}">{{ $ingredient->name }}</span>
                            @empty
                                <span class="muted">Sin ingredientes</span>
                            @endforelse
                        </td>
                        <td class="price">{{ number_format($product->price, 2, ',', '.') }} €</td>
                        <td>
                            <span class="badge {{ $product->is_available ? 'badge-ok' : 'badge-off' }}">
                                {{ $product->is_available ? 'Disponible' : 'Agotado' }}
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-outline btn-sm" href="{{ route('products.show', $product) }}">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">No hay productos.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
@endsection