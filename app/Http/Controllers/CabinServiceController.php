<?php

namespace App\Http\Controllers;

use App\Models\CabinService;
use Illuminate\Http\Request;

class CabinServiceController extends Controller
{
    /**
     * Muestra una lista de registros de cabin_service.
     */
    public function index()
    {
        // Obtener todas las relaciones entre cabinas y servicios
        $cabinServices = CabinService::with(['cabin', 'service'])->get();
        return response()->json($cabinServices);
    }

    /**
     * Guarda un nuevo registro en la tabla cabin_service.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id' => 'required|exists:cabin,id',         // Validar que el ID de cabaña exista
            'id_servicio' => 'required|exists:service,id'  // Validar que el ID de servicio exista
        ]);

        // Crear la relación entre cabina y servicio
        $cabinService = CabinService::create([
            'id' => $request->id,
            'id_servicio' => $request->id_servicio,
        ]);

        return response()->json($cabinService, 201);
    }

    /**
     * Muestra un registro específico.
     */
    public function show($id)
    {
        // Buscar la relación por ID
        $cabinService = CabinService::with(['cabin', 'service'])->findOrFail($id);
        return response()->json($cabinService);
    }

    /**
     * Actualiza un registro existente.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'id' => 'required|exists:cabin,id',
            'id_servicio' => 'required|exists:service,id'
        ]);

        // Buscar la relación y actualizarla
        $cabinService = CabinService::findOrFail($id);
        $cabinService->update([
            'id' => $request->id,
            'id_servicio' => $request->id_servicio,
        ]);

        return response()->json($cabinService);
    }

    /**
     * Elimina un registro.
     */
    public function destroy($id)
    {
        // Buscar la relación y eliminarla
        $cabinService = CabinService::findOrFail($id);
        $cabinService->delete();

        return response()->json(null, 204);
    }
}