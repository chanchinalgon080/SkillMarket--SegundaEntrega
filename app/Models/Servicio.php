<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'precio', 'usuario_id', 'categoria_id', 'activo'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function contrataciones()
    {
        return $this->hasMany(Contratacion::class, 'servicio_id');
    }

    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class, 'servicio_id');
    }

    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class, 'servicio_id');
    }
}
