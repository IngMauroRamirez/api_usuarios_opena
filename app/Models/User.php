<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'nombre',
        'email',
        'password',
    ];

    /**
     * Creamos la relacion N:N que un usuario puede estar en muchos proyectos
     * y además que un proyecto puede tener muchos usuarios
     */
    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(
            Proyecto::class,
            'usuarios_proyectos',
            'usuario_id',
            'proyecto_id'
        )->withPivot('tarifa')
        ->withTimestamps();
    }

    /**
     * Creamos la relacion 1:N que un usuario puede tener muchas tareas
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'usuario_id');
    }
}
