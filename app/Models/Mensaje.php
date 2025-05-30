<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = [
        'contenido', 'remitente_id', 'receptor_id', 'fecha_envio'
    ];

    public function emisor()
    {
        return $this->belongsTo(Usuario::class, 'remitente_id');
    }

    public function receptor()
    {
        return $this->belongsTo(Usuario::class, 'receptor_id');
    }
}
