<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Servicio extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'precio', 'usuario_id', 'activo'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categoria_servicio', 'servicio_id', 'categoria_id');
    }

    public function contrataciones(): HasMany
    {
        return $this->hasMany(Contratacion::class, 'servicio_id');
    }

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidad::class, 'servicio_id');
    }

    public function valoraciones(): HasMany
    {
        return $this->hasMany(Valoracion::class, 'servicio_id');
    }

    public function scopeSearch(Builder $query, ?string $searchTerm): Builder
    {
        if ($searchTerm) {
            $query->where('titulo', 'like', '%' . $searchTerm . '%')
                  ->orWhere('descripcion', 'like', '%' . $searchTerm . '%');
        }
        return $query;
    }

    public function scopeGlobalSearch(Builder $query, ?string $searchTerm): Builder
    {
        if ($searchTerm) {
            $query->where(function (Builder $q) use ($searchTerm) {
                $q->where('titulo', 'like', '%' . $searchTerm . '%')
                  ->orWhere('descripcion', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('categorias', function (Builder $qCategoria) use ($searchTerm) {
                      $qCategoria->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('usuario', function (Builder $qUsuario) use ($searchTerm) {
                      $qUsuario->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }
        return $query;
    }
}
