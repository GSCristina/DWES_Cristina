@extends('layouts.app')

@section('title', 'Editar desarrolladora')

@section('content')
    <div class="card">
        <h1>Editar desarrolladora</h1>

        <form
            method="POST"
            action="{{ route(
                'desarrolladoras.update',
                $desarrolladora
            ) }}"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>

                <input
                    id="nombre"
                    name="nombre"
                    value="{{ old(
                        'nombre',
                        $desarrolladora->nombre
                    ) }}"
                >
            </div>

            <div class="form-group">
                <label for="pais">País</label>

                <input
                    id="pais"
                    name="pais"
                    value="{{ old(
                        'pais',
                        $desarrolladora->pais
                    ) }}"
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
                    value="{{ old(
                        'fundacion',
                        $desarrolladora->fundacion
                    ) }}"
                >
            </div>

            <button class="button" type="submit">
                Actualizar
            </button>
        </form>
    </div>
@endsection