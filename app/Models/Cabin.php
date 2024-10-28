<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'cabinlevel_id', 
        'capacity',
    ];

    public function CabinLevel  cabinLevel(): BelongsTo
    {
        return $this->belongsTo(CabinLevel::class);  // Relación 1:1 con CabinLevel
    }
}
