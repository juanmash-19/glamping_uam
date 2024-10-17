<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations'; // Nombre de la tabla

    protected $primaryKey = 'id_reserva'; // Nombre de la clave primaria

    protected $fillable = [
        'fecha_reserva', // Fecha de reserva
        'fecha_inicio',  // Fecha de inicio
        'fecha_fin',     // Fecha de fin
        'cabin_id',      // ID de la cabaña relacionada
        'user_id',       // ID del usuario relacionado
    ];

    // Relación con el modelo Cabin
    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabin_id');
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}