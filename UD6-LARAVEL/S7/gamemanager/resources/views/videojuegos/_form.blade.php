<div class="form-group">
    <label for="titulo">Título</label>

    <input
        type="text"
        id="titulo"
        name="titulo"
        value="{{ old(
            'titulo',
            $videojuego->titulo ?? ''
        ) }}"
    >

    @error('titulo')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>

    <textarea
        id="descripcion"
        name="descripcion"
        rows="5"
    >{{ old(
        'descripcion',
        $videojuego->descripcion ?? ''
    ) }}</textarea>

    @error('descripcion')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="anio">Año</label>

    <input
        type="number"
        id="anio"
        name="anio"
        value="{{ old(
            'anio',
            $videojuego->anio ?? ''
        ) }}"
    >

    @error('anio')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="precio">Precio</label>

    <input
        type="number"
        step="0.01"
        id="precio"
        name="precio"
        value="{{ old(
            'precio',
            $videojuego->precio ?? ''
        ) }}"
    >

    @error('precio')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="desarrolladora_id">
        Desarrolladora
    </label>

    <select
        id="desarrolladora_id"
        name="desarrolladora_id"
    >
        <option value="">
            Selecciona una desarrolladora
        </option>

        @foreach ($desarrolladoras as $desarrolladora)
            <option
                value="{{ $desarrolladora->id }}"
                @selected(
                    old(
                        'desarrolladora_id',
                        $videojuego->desarrolladora_id ?? ''
                    ) == $desarrolladora->id
                )
            >
                {{ $desarrolladora->nombre }}
            </option>
        @endforeach
    </select>

    @error('desarrolladora_id')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Géneros</label>

    @php
        $generosSeleccionados = old(
            'generos',
            isset($videojuego)
                ? $videojuego->generos->pluck('id')->toArray()
                : []
        );
    @endphp

    <div class="checkbox-list">
        @foreach ($generos as $genero)
            <label>
                <input
                    type="checkbox"
                    name="generos[]"
                    value="{{ $genero->id }}"
                    @checked(
                        in_array(
                            $genero->id,
                            $generosSeleccionados
                        )
                    )
                >

                {{ $genero->nombre }}
            </label>
        @endforeach
    </div>

    @error('generos')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<h2>Ficha técnica</h2>

<div class="form-group">
    <label for="plataforma">Plataforma</label>

    <input
        type="text"
        id="plataforma"
        name="plataforma"
        value="{{ old(
            'plataforma',
            $videojuego->fichaTecnica->plataforma
                ?? ''
        ) }}"
    >
</div>

<div class="form-group">
    <label for="motor_grafico">
        Motor gráfico
    </label>

    <input
        type="text"
        id="motor_grafico"
        name="motor_grafico"
        value="{{ old(
            'motor_grafico',
            $videojuego->fichaTecnica->motor_grafico
                ?? ''
        ) }}"
    >
</div>

<div class="form-group">
    <label for="edad_recomendada">
        Edad recomendada
    </label>

    @php
        $edadActual = old(
            'edad_recomendada',
            $videojuego->fichaTecnica->edad_recomendada
                ?? ''
        );
    @endphp

    <select
        id="edad_recomendada"
        name="edad_recomendada"
    >
        @foreach ([3, 7, 12, 16, 18] as $edad)
            <option
                value="{{ $edad }}"
                @selected($edadActual == $edad)
            >
                PEGI {{ $edad }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="espacio_gb">
        Espacio necesario en GB
    </label>

    <input
        type="number"
        id="espacio_gb"
        name="espacio_gb"
        value="{{ old(
            'espacio_gb',
            $videojuego->fichaTecnica->espacio_gb
                ?? ''
        ) }}"
    >
</div>

<div class="form-group">
    <label for="modo_juego">Modo de juego</label>

    <input
        type="text"
        id="modo_juego"
        name="modo_juego"
        value="{{ old(
            'modo_juego',
            $videojuego->fichaTecnica->modo_juego
                ?? ''
        ) }}"
    >
</div>

<div class="form-group">
    <label>
        <input
            type="checkbox"
            name="publicado"
            value="1"
            @checked(
                old(
                    'publicado',
                    $videojuego->publicado ?? true
                )
            )
        >

        Publicado
    </label>
</div>

<button class="button" type="submit">
    Guardar
</button>

<a
    class="button button-secondary"
    href="{{ route('videojuegos.index') }}"
>
    Cancelar
</a>