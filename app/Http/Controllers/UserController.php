<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Listado de usuarios.
     */
    public function index()
    {
        // Ordenar por ID y usar paginación (10 por página)
        $users = User::orderBy('id', 'asc')->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Formulario para crear usuario.
     */
    public function create()
    {
        // Roles válidos para el select
        $roles = ['admin', 'staff', 'client'];

        return view('users.create', compact('roles'));
    }

    /**
     * Guardar nuevo usuario.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'role'     => ['required', 'in:admin,staff,client'],
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['active']   = true;

        User::create($data);

        return redirect()
            ->route('users.index')
            ->with([
                'success' => '👤 Usuario creado correctamente.',
                'status'  => 'Usuario creado correctamente.',
            ]);
    }

    /**
     * Formulario de edición.
     */
    public function edit(User $user)
    {
        $roles = ['admin', 'staff', 'client'];

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Actualizar usuario.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'email'  => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role'   => ['required', 'in:admin,staff,client'],
            'active' => ['required', 'boolean'],
        ]);

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with([
                'success' => '✏️ Usuario actualizado correctamente.',
                'status'  => 'Usuario actualizado correctamente.',
            ]);
    }

    /**
     * Desactivar usuario (no borrarlo).
     * Este método lo seguimos usando si quieres "desactivar definitivo".
     */
    public function destroy(User $user)
    {
        // No permitir eliminarse a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('users.index')
                ->with([
                    'error'   => 'No puedes eliminar tu propio usuario.',
                    'status'  => 'No puedes eliminar tu propio usuario.',
                ]);
        }

        // No permitir eliminar administradores
        if ($user->role === 'admin') {
            return redirect()
                ->route('users.index')
                ->with([
                    'error'   => 'No se puede eliminar un usuario administrador.',
                    'status'  => 'No se puede eliminar un usuario administrador.',
                ]);
        }

        // Desactivar en lugar de borrar
        $user->active = false;
        $user->save();

        return redirect()
            ->route('users.index')
            ->with([
                'success' => '🚫 Usuario desactivado correctamente.',
                'status'  => 'Usuario desactivado correctamente.',
            ]);
    }

    /**
     * 👉 Activar / Desactivar (toggle) usuario desde la lista.
     */
    public function toggleStatus(User $user)
    {
        // No permitir cambiar tu propio estado
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('users.index')
                ->with([
                    'error'  => 'No puedes cambiar el estado de tu propio usuario.',
                    'status' => 'No puedes cambiar el estado de tu propio usuario.',
                ]);
        }

        // No permitir cambiar estado de administradores (si quieres protegerlos)
        if ($user->role === 'admin') {
            return redirect()
                ->route('users.index')
                ->with([
                    'error'  => 'No se puede cambiar el estado de un administrador.',
                    'status' => 'No se puede cambiar el estado de un administrador.',
                ]);
        }

        // Cambiar estado: si está activo -> inactivo, si está inactivo -> activo
        $user->active = ! $user->active;
        $user->save();

        $mensaje = $user->active
            ? '✅ Usuario activado correctamente.'
            : '🚫 Usuario desactivado correctamente.';

        return redirect()
            ->route('users.index')
            ->with([
                'success' => $mensaje,
                'status'  => $mensaje,
            ]);
    }
}
