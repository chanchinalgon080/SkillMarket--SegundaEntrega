<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contratacion extends Model
{
    use HasFactory;

    // Especifica el nombre correcto de la tabla
    protected $table = 'contrataciones';

    protected $fillable = ['usuario_id', 'servicio_id', 'fecha_contratacion', 'estado'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
