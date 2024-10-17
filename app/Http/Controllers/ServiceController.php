<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Muestra una lista de todos los servicios.
     */
    public function index()
    {
        // Obtener todos los servicios
        $services = Service::all();
        return response()->json($services);
    }

    /**
     * Guarda un nuevo servicio.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_servicio' => 'required|string|max:100'
        ]);

        // Crear el nuevo servicio
        $service = Service::create([
            'nombre_servicio' => $request->nombre_servicio,
        ]);

        return response()->json($service, 201);
    }

    /**
     * Muestra un servicio específico.
     */
    public function show($id)
    {
        // Buscar el servicio por ID
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    /**
     * Actualiza un servicio existente.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre_servicio' => 'required|string|max:100'
        ]);

        // Buscar el servicio y actualizarlo
        $service = Service::findOrFail($id);
        $service->update([
            'nombre_servicio' => $request->nombre_servicio,
        ]);

        return response()->json($service);
    }

    /**
     * Elimina un servicio.
     */
    public function destroy($id)
    {
        // Buscar el servicio y eliminarlo
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(null, 204);
    }
}