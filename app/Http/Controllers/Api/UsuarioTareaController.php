<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsuarioTareaController extends Controller
{
    /**
     * Función para consultar un usuario con sus tareas, proyectos, horas, tarifa y valor y
     * retornar en un json
     */
    public function mostrar_tareas_json($usuarioId)
    {
        $usuario = User::with([
            'tareas.proyecto'
        ])->findOrFail($usuarioId);

        $resultado = $usuario->tareas->map(function ($tarea) {
            $tarifa = $tarea->proyecto
                ->usuarios
                ->where('id', $tarea->usuario_id)
                ->first()
                ->pivot
                ->tarifa;

            return [
                'tarea'     => $tarea->titulo,
                'horas'     => $tarea->horas,
                'proyecto'  => $tarea->proyecto->nombre,
                'tarifa'    => $tarifa,
                'valor'     => $tarea->horas * $tarifa
            ];
        });

        return response()->json($resultado);
    }
}
