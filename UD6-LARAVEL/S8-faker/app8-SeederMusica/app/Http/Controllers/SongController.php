<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SongController extends Controller
{
    // Responde a GET /songs y prepara los datos para la vista.
    public function index(Request $request): View
    {
        // Parámetros opcionales recibidos en la URL.
        $search = trim((string) $request->query('search', ''));
        $genre = (string) $request->query('genre', '');

        // Listado limitado de géneros aceptados.
        $genres = [
            'rock' => 'Rock',
            'pop' => 'Pop',
            'electronic' => 'Electrónica',
            'hip-hop' => 'Hip-hop',
            'jazz' => 'Jazz',
            'classical' => 'Clásica',
            'other' => 'Otros',
        ];

        // Se construye la consulta; todavía no se ejecuta.
        $query = Song::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('artist', 'like', '%' . $search . '%');
            });
        }

        if (array_key_exists($genre, $genres)) {
            $query->where('genre', $genre);
        } else {
            $genre = '';
        }

        // paginate() ejecuta la consulta y devuelve los resultados por páginas.
        $songs = $query
            ->orderByDesc('plays')
            ->paginate(12)
            ->withQueryString();

        // Estadísticas del catálogo completo, sin aplicar filtros de búsqueda.
        $totalSongs = Song::count();
        $publishedSongs = Song::where('published', true)->count();
        $totalPlays = Song::sum('plays');

        return view('songs.index', compact(
            'songs', 'genres', 'search', 'genre',
            'totalSongs', 'publishedSongs', 'totalPlays'
        ));
    }
}