<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo musical | Laravel</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f3f6fa; color: #243447; }
        header { background: #172b4d; color: white; padding: 28px 16px; }
        .container { max-width: 1180px; margin: auto; padding: 0 18px; }
        h1 { margin: 0 0 6px; font-size: 2rem; }
        header p { margin: 0; color: #d2dfef; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin: 22px 0; }
        .stat { background: white; border-radius: 12px; padding: 16px; border-left: 5px solid #2563eb; }
        .stat strong { display: block; font-size: 1.6rem; color: #153e75; margin-top: 5px; }
        .filters { display: flex; flex-wrap: wrap; gap: 10px; padding: 16px; border-radius: 12px; background: white; margin-bottom: 20px; }
        input, select, button, .clear { font: inherit; padding: 11px; border: 1px solid #cad5e2; border-radius: 7px; }
        input { flex: 1; min-width: 200px; }
        select { min-width: 170px; }
        button { background: #2563eb; color: white; border-color: #2563eb; cursor: pointer; }
        .clear { color: #243447; text-decoration: none; background: #f3f6fa; }
        .section-head { display: flex; align-items: baseline; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
        .section-head p { color: #64748b; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(245px, 1fr)); gap: 16px; margin: 16px 0 28px; }
        article { background: white; border-radius: 14px; padding: 18px; box-shadow: 0 3px 14px #152a4510; }
        .artwork { width: 54px; height: 54px; display: grid; place-items: center; background: #e7efff; color: #2455b5; border-radius: 12px; font-size: 26px; }
        article h3 { margin: 12px 0 4px; font-size: 1.12rem; }
        .artist { color: #526379; margin: 0 0 10px; }
        .badges { display: flex; flex-wrap: wrap; gap: 7px; margin: 10px 0; }
        .badge { background: #e8eef7; color: #284c73; font-size: .8rem; border-radius: 50px; padding: 5px 9px; }
        .badge.off { color: #985023; background: #fff0dc; }
        dl { display: grid; grid-template-columns: 1fr auto; gap: 9px; font-size: .92rem; }
        dt { color: #64748b; } dd { margin: 0; font-weight: 600; }
        .price { font-size: 1.25rem; color: #17694b; font-weight: bold; margin: 12px 0 0; }
        .empty { background: white; padding: 24px; border-radius: 10px; }
        nav.pagination { padding-bottom: 34px; }
        .pager { display: flex; flex-wrap: wrap; gap: 8px; }
        .pager a, .pager span { display: inline-block; padding: 9px 12px; background: white; border: 1px solid #cad5e2; border-radius: 6px; text-decoration: none; color: #243447; }
        .pager .current { background: #2563eb; color: white; border-color: #2563eb; }
        .pager .disabled { color: #9aa8b7; }
        footer { text-align: center; color: #64748b; font-size: .85rem; padding-bottom: 24px; }
        @media (max-width: 620px) { .stats { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>🎵 Catálogo musical</h1>
            <p>Proyecto Laravel 13 · Eloquent + Faker + Factory + Seeder + Controlador + Blade</p>
        </div>
    </header>

    <main class="container">
        <section class="stats" aria-label="Estadísticas">
            <div class="stat">Canciones totales <strong>{{ $totalSongs }}</strong></div>
            <div class="stat">Canciones publicadas <strong>{{ $publishedSongs }}</strong></div>
            <div class="stat">Reproducciones <strong>{{ number_format($totalPlays, 0, ',', '.') }}</strong></div>
        </section>

        {{-- El formulario usa GET: los filtros quedan reflejados en la URL. --}}
        <form class="filters" method="GET" action="{{ route('songs.index') }}">
            <input type="search" name="search" placeholder="Buscar título o artista"
                   value="{{ $search }}" aria-label="Buscar canciones">

            <select name="genre" aria-label="Filtrar por género">
                <option value="">Todos los géneros</option>
                @foreach ($genres as $value => $label)
                    <option value="{{ $value }}" @selected($genre === $value)>{{ $label }}</option>
                @endforeach
            </select>

            <button type="submit">Buscar</button>
            <a class="clear" href="{{ route('songs.index') }}">Limpiar</a>
        </form>

        <div class="section-head">
            <h2>Canciones del catálogo</h2>
            <p>{{ $songs->total() }} resultado(s)</p>
        </div>

        <section class="grid" aria-label="Listado de canciones">
            @forelse ($songs as $song)
                <article>
                    <div class="artwork" aria-hidden="true">♫</div>
                    <h3>{{ $song->title }}</h3>
                    <p class="artist">{{ $song->artist }}</p>

                    <div class="badges">
                        <span class="badge">{{ $genres[$song->genre] ?? $song->genre }}</span>
                        @if ($song->published)
                            <span class="badge">Publicada</span>
                        @else
                            <span class="badge off">Pendiente</span>
                        @endif
                    </div>

                    <dl>
                        <dt>Álbum</dt><dd>{{ $song->album ?? 'Sin álbum' }}</dd>
                        <dt>Año</dt><dd>{{ $song->release_year ?? '—' }}</dd>
                        <dt>Duración</dt>
                        <dd>{{ intdiv($song->duration_seconds, 60) }}:{{ str_pad((string) ($song->duration_seconds % 60), 2, '0', STR_PAD_LEFT) }} min</dd>
                        <dt>Reproducciones</dt><dd>{{ number_format($song->plays, 0, ',', '.') }}</dd>
                    </dl>
                    <p class="price">{{ number_format((float) $song->price, 2, ',', '.') }} €</p>
                </article>
            @empty
                <p class="empty">No hay canciones que coincidan con los filtros.</p>
            @endforelse
        </section>

        {{-- Paginación simple con enlaces anteriores, numerados y siguientes. --}}
        @if ($songs->hasPages())
            <nav class="pagination" aria-label="Páginas del catálogo">
                <div class="pager">
                    @if ($songs->onFirstPage())
                        <span class="disabled">Anterior</span>
                    @else
                        <a href="{{ $songs->previousPageUrl() }}">Anterior</a>
                    @endif

                    @foreach ($songs->getUrlRange(1, $songs->lastPage()) as $page => $url)
                        @if ($page === $songs->currentPage())
                            <span class="current" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($songs->hasMorePages())
                        <a href="{{ $songs->nextPageUrl() }}">Siguiente</a>
                    @else
                        <span class="disabled">Siguiente</span>
                    @endif
                </div>
            </nav>
        @endif
    </main>

    <footer>Práctica inicial 8.0 · Desarrollo Web en Entorno Servidor</footer>
</body>
</html>