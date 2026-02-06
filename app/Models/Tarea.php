<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    protected $table = 'tareas';

    protected $fillable = [
        'usuario_id',
        'proyecto_id',
        'titulo',
        'descripcion',
        'horas',
    ];

    /**
     * Creamos la relacion 1:N que cada tarea pertenece a un unico usuario
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Creamos la relacion 1:N que cada tarea pertenece a un solo proyecto
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
