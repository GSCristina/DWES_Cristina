@props(['tipo' => 'info', 'titulo' => 'Información', 'mensaje' => ''])

<div class="alerta alerta-{{ $tipo }}">
    <strong>{{ $titulo }}</strong>
    <p>{{ $mensaje }}</p>
    {{ $slot }}
</div>