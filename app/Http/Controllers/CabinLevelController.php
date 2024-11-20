<?php

namespace App\Http\Controllers;

use App\Models\CabinLevel;
use Illuminate\Http\Request;

class CabinLevelController extends Controller
{
    // Obtener todos los niveles de cabañas
    public function index()
    {
        return CabinLevel::all();
    }

    // Crear un nuevo nivel de cabaña
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string|max:7', // Validación para colores hexadecimales
        ]);

        $cabinLevel = CabinLevel::create($validatedData);

        return response()->json($cabinLevel, 201);
    }

    // Mostrar un nivel de cabaña específico
    public function show(CabinLevel $cabinLevel)
    {
        return $cabinLevel;
    }

    // Actualizar un nivel de cabaña
    public function update(Request $request, CabinLevel $cabinLevel)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'required|string|max:7',
        ]);

        $cabinLevel->update($validatedData);

        return response()->json($cabinLevel, 200);
    }

    // Eliminar un nivel de cabaña
    public function destroy(CabinLevel $cabinLevel)
    {
        $cabinLevel->delete();

        return response()->json(['message' => 'Nivel de cabaña eliminado con éxito'], 200);
    }
}