<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    /**
     * Creamos la relacion N:N que un proyecto tiene muchos usuarios
     * y un usuario puede estar en muchos proyectos
     */
    public function usuarios(): BelongsToMany {
        return $this->belongsToMany(
            User::class,
            'usuarios_proyectos',
            'proyecto_id',
            'usuario_id',
        )->withPivot('tarifa')
        ->withTimestamps();
    }

    /**
     * Creamos la relacion 1:N que un proyecto puede contener muchas tareas
     */
    public function tareas(): HasMany {
        return $this->hasMany(Tarea::class, 'proyecto_id');
    }

}
