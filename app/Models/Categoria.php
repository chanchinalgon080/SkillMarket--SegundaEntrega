<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación: una categoría tiene muchos servicios
    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'categoria_id');
    }
}

