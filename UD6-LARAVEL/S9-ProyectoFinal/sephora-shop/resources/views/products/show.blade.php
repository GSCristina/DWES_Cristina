@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="page-header">
        <h1>{{ $product->name }}</h1>
        <div class="actions">
            <a class="btn btn-outline" href="{{ route('products.index') }}">← Volver</a>
            <a class="btn" href="{{ route('products.edit', $product) }}">Editar</a>

            <form action="{{ route('products.destroy', $product) }}" method="POST"
                    onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

    <div class="card">
        <dl class="details">
            <dt>Marca</dt>
            <dd>{{ $product->brand->name }}</dd>

            <dt>Descripción</dt>
            <dd>{{ $product->description ?? 'Sin descripción' }}</dd>

            <dt>Precio</dt>
            <dd><strong>{{ number_format($product->price, 2, ',', '.') }} €</strong></dd>

            <dt>Stock</dt>
            <dd>{{ $product->stock }} unidades</dd>

            <dt>Estado</dt>
            <dd>
                <span class="badge {{ $product->is_available ? 'badge-ok' : 'badge-off' }}">
                    {{ $product->is_available ? 'Disponible' : 'Agotado' }}
                </span>
            </dd>
        </dl>

        <h2>Ingredientes</h2>
        @forelse ($product->ingredients as $ingredient)
            <span class="tag {{ $ingredient->is_allergen ? 'tag-allergen' : '' }}">
                {{ $ingredient->name }}@if ($ingredient->is_allergen) (alérgeno)@endif
            </span>
        @empty
            <p class="muted">Sin ingredientes registrados.</p>
        @endforelse
    </div>
@endsection