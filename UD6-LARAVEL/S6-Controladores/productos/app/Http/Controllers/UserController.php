<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = trim((string) $request->query('buscar', ''));
        $usuarios = User::query()
            ->when($busqueda !== '', fn ($q) => $q->where(function ($sub) use ($busqueda) {
                $sub->where('name', 'like', "%{$busqueda}%")
                    ->orWhere('email', 'like', "%{$busqueda}%")
                    ->orWhere('curso_web', 'like', "%{$busqueda}%");
            }))
            ->orderBy('name')->paginate(10)->withQueryString();
        return view('usuarios.index', compact('usuarios', 'busqueda'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'curso_web' => ['required', Rule::in(['HTML y CSS', 'JavaScript', 'PHP y Laravel'])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $datos['password'] = Hash::make($datos['password']);
        $usuario = User::create($datos);
        return redirect()->route('usuarios.show', $usuario)->with('ok', 'Usuario creado correctamente.');
    }

    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'curso_web' => ['required', Rule::in(['HTML y CSS', 'JavaScript', 'PHP y Laravel'])],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        if (empty($datos['password'])) {
            unset($datos['password']);
        } else {
            $datos['password'] = Hash::make($datos['password']);
        }
        $user->update($datos);
        return redirect()->route('usuarios.show', $user)->with('ok', 'Usuario actualizado.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios.index')->with('ok', 'Usuario eliminado.');
    }
}