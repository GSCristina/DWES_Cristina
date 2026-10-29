<section aria-labelledby="titulo-comentarios">
    <h2 id="titulo-comentarios">Comentarios</h2>

    @forelse ($comentarios as $comentario)
        <article class="comentario">
            <h3>{{ $comentario->autor }}</h3>
            <p>{{ $comentario->contenido }}</p>
        </article>
    @empty
        <p>Todavía no hay comentarios.</p>
    @endforelse
</section>