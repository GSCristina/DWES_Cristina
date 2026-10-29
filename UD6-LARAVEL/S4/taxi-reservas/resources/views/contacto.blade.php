@extends('layouts.app')
@section('titulo', 'Solicitar reserva')

@section('contenido')
    <h1>Reserva tu taxi</h1>
    <p>Servicio: {{ $empresa }}. Selecciona una fecha desde hoy.</p>
    @include('partials.aviso-servicio')

    @if (session('reservaOk'))
        <x-alerta-taxi tipo="exito" titulo="Solicitud recibida"
            :mensaje="session('reservaOk')" />
    @endif

    <form class="formulario" method="POST" action="{{ route('reservas.store') }}">
        @csrf

        <label for="nombre">Nombre y apellidos</label>
        <input id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        @error('nombre')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="email">Correo electrónico</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <label for="telefono">Teléfono</label>
        <input id="telefono" name="telefono" value="{{ old('telefono') }}" required>
        @error('telefono') <span class="error">{{ $message }}</span> @enderror

        <label for="origen">Lugar de recogida</label>
        <input id="origen" name="origen" value="{{ old('origen') }}" required>
        @error('origen') <span class="error">{{ $message }}</span> @enderror

        <label for="destino">Destino</label>
        <input id="destino" name="destino" value="{{ old('destino') }}" required>
        @error('destino') <span class="error">{{ $message }}</span> @enderror

        <label for="fecha">Fecha</label>
        <input id="fecha" type="date" name="fecha" min="{{ $fechaMinima }}"
               value="{{ old('fecha') }}" required>
        @error('fecha') <span class="error">{{ $message }}</span> @enderror

        <label for="hora">Hora</label>
        <input id="hora" type="time" name="hora" value="{{ old('hora') }}" required>
        @error('hora') <span class="error">{{ $message }}</span> @enderror

        <label for="pasajeros">Pasajeros</label>
        <select id="pasajeros" name="pasajeros" required>
            @for ($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}" @selected(old('pasajeros', 1) == $i)>{{ $i }}</option>
            @endfor
        </select>
        @error('pasajeros') <span class="error">{{ $message }}</span> @enderror

        <label for="detalles">Observaciones (opcional)</label>
        <textarea id="detalles" name="detalles" rows="4">{{ old('detalles') }}</textarea>
        @error('detalles') <span class="error">{{ $message }}</span> @enderror

        <button class="boton" type="submit">Enviar solicitud</button>
    </form>
@endsection