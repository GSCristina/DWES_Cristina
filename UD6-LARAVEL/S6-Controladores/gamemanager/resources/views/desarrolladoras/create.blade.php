@extends('layouts.app')

@section('title', 'Nueva desarrolladora')

@section('content')
    <div class="card">
        <h1>Nueva desarrolladora</h1>

        <form
            method="POST"
            action="{{ route(
                'desarrolladoras.store'
            ) }}"
        >
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>

                <input
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                >
            </div>

            <div class="form-group">
                <label for="pais">País</label>

                <input
                    id="pais"
                    name="pais"
                    value="{{ old('pais') }}"
                >
            </div>

            <div class="form-group">
                <label for="fundacion">
                    Año de fundación
                </label>

                <input
                    type="number"
                    id="fundacion"
                    name="fundacion"
                    value="{{ old('fundacion') }}"
                >
            </div>

            <button class="button" type="submit">
                Guardar
            </button>
        </form>
    </div>
@endsection