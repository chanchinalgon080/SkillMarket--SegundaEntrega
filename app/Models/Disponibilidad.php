<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $fillable = ['servicio_id', 'dia', 'hora_inicio', 'hora_fin'];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
