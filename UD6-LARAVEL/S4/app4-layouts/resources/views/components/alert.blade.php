<div class="alert alert-{{ $tipo }}" role="status">
    <strong>
        @if ($tipo === 'error')
            Error:
        @elseif ($tipo === 'exito')
            Correcto:
        @else
            Información:
        @endif
    </strong>

    {{ $mensaje }}
    {{ $slot }}
</div>