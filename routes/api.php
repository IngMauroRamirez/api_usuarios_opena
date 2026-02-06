<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UsuarioTareaController;

Route::get('/usuarios/{usuario}/tareas', [UsuarioTareaController::class, 'mostrar_tareas_json']);