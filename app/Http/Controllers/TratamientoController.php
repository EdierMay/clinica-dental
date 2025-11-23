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
     * Formulario para crear un nuevo tratamiento.
     */
    public function create()
    {
        return view('tratamientos.create');
    }

    /**
     * Guardar un nuevo tratamiento.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric', 'min:0'],
        ]);

        Tratamiento::create($data);

        return redirect()
            ->route('tratamientos.index')
            ->with('success', '🦷 Tratamiento creado correctamente.');
    }

    /**
     * Formulario de edición.
     */
    public function edit(Tratamiento $tratamiento)
    {
        return view('tratamientos.edit', compact('tratamiento'));
    }

    /**
     * Actualizar un tratamiento.
     */
    public function update(Request $request, Tratamiento $tratamiento)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric', 'min:0'],
        ]);

        // Si no cambia nada
        if ($tratamiento->nombre === $data['nombre'] &&
            $tratamiento->precio == $data['precio']) 
        {
            return redirect()
                ->route('tratamientos.index')
                ->with('error', '⚠️ No se realizaron cambios en el tratamiento.');
        }

        $tratamiento->update($data);

        return redirect()
            ->route('tratamientos.index')
            ->with('success', '📝 Tratamiento actualizado correctamente.');
    }

    /**
     * Eliminar tratamiento.
     */
    public function destroy(Tratamiento $tratamiento)
    {
        try {
            $tratamiento->delete();

            return redirect()
                ->route('tratamientos.index')
                ->with('success', '🗑️ Tratamiento eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('tratamientos.index')
                ->with('error', '❌ No se pudo eliminar el tratamiento.');
        }
    }
}
