<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Mostrar listado de tratamientos.
     */
    public function index()
    {
        $tratamientos = Tratamiento::orderBy('id', 'desc')->paginate(10);

        return view('tratamientos.index', compact('tratamientos'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('tratamientos.create');
    }

    /**
     * Guardar nuevo tratamiento.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        Tratamiento::create($data);

        return redirect()
            ->route('tratamientos.index')
            ->with('status', 'Tratamiento creado correctamente.');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(Tratamiento $tratamiento)
    {
        return view('tratamientos.edit', compact('tratamiento'));
    }

    /**
     * Actualizar tratamiento.
     */
    public function update(Request $request, Tratamiento $tratamiento)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $tratamiento->update($data);

        return redirect()
            ->route('tratamientos.index')
            ->with('status', 'Tratamiento actualizado correctamente.');
    }

    /**
     * Eliminar (borrar) tratamiento.
     * Si prefieres "desactivar" en lugar de borrar, se puede cambiar.
     */
    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()
            ->route('tratamientos.index')
            ->with('status', 'Tratamiento eliminado.');
    }
}
