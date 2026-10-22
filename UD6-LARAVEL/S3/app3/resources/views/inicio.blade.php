<h1>{{ $nombre }}</h1>

<ul>
    @foreach ($articulos as $articulo)
        <li>{{ $articulo }}</li>
    @endforeach
</ul>