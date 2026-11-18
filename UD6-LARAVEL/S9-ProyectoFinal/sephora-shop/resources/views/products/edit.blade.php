@extends('layouts.app')

@section('title', 'Editar ' . $product->name)

@section('content')
    <div class="page-header">
        <h1>Editar: {{ $product->name }}</h1>
    </div>

    <div class="card">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            @include('products._form')
        </form>
    </div>
@endsection