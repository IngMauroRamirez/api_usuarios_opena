<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TareasUsuarioController extends Controller
{
    /**
     * Función para retornar la vista con la informacion de un usuario con sus tareas, proyectos, horas, tarifa y valor
     */
    public function mostrar_tareas($id_usuario){
        $usuario = User::with(['tareas.proyecto.usuarios'])->findOrFail($id_usuario);
        return view('usuario.tareas', compact('usuario'));
    }
}
