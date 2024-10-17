<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Muestra una lista de todas las reservas.
     */
    public function index()
    {
        // Obtener todas las reservas con relaciones de usuario y cabaña
        $reservations = Reservation::with(['cabin', 'user'])->get();
        return response()->json($reservations);
    }

    /**
     * Guarda una nueva reserva.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_reserva' => 'required|date_format:Y-m-d H:i:s',
            'fecha_inicio'  => 'required|date',
            'fecha_fin'     => 'required|date|after_or_equal:fecha_inicio',
            'cabin_id'      => 'required|exists:cabins,id',
            'user_id'       => 'required|exists:users,id',
        ]);

        // Crear la nueva reserva
        $reservation = Reservation::create([
            'fecha_reserva' => $request->fecha_reserva,
            'fecha_inicio'  => $request->fecha_inicio,
            'fecha_fin'     => $request->fecha_fin,
            'cabin_id'      => $request->cabin_id,
            'user_id'       => $request->user_id,
        ]);

        return response()->json($reservation, 201);
    }

    /**
     * Muestra una reserva específica.
     */
    public function show($id)
    {
        // Buscar la reserva por ID y cargar relaciones de cabaña y usuario
        $reservation = Reservation::with(['cabin', 'user'])->findOrFail($id);
        return response()->json($reservation);
    }

    /**
     * Actualiza una reserva existente.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_reserva' => 'required|date_format:Y-m-d H:i:s',
            'fecha_inicio'  => 'required|date',
            'fecha_fin'     => 'required|date|after_or_equal:fecha_inicio',
            'cabin_id'      => 'required|exists:cabins,id',
            'user_id'       => 'required|exists:users,id',
        ]);

        // Buscar la reserva y actualizarla
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'fecha_reserva' => $request->fecha_reserva,
            'fecha_inicio'  => $request->fecha_inicio,
            'fecha_fin'     => $request->fecha_fin,
            'cabin_id'      => $request->cabin_id,
            'user_id'       => $request->user_id,
        ]);

        return response()->json($reservation);
    }

    /**
     * Elimina una reserva.
     */
    public function destroy($id)
    {
        // Buscar la reserva y eliminarla
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json(null, 204);
    }
}