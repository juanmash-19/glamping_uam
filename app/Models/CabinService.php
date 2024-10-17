<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinService extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'cabin_service';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_cabin_service';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'id',           // ID de la cabaña relacionada
        'id_servicio',  // ID del servicio relacionado
    ];

    // Relación con el modelo Cabin
    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'id');
    }

    // Relación con el modelo Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_servicio');
    }
}