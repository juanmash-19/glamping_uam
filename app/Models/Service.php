<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'service';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_servicio';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'nombre_servicio'
    ];

    // Relación con CabinService (una servicio puede estar relacionado con muchas cabañas)
    public function cabinServices()
    {
        return $this->hasMany(CabinService::class, 'id_servicio');
    }
}