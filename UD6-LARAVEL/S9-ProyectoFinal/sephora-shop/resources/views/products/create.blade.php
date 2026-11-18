@extends('layouts.app')

@section('title', 'Nuevo producto')

@section('content')
    <div class="page-header">
        <h1>Nuevo producto</h1>
    </div>

    <div class="card">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            @include('products._form')
        </form>
    </div>
@endsection