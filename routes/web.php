<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TareasUsuarioController;

Route::get('/usuarios/{usuario}/tareas', [TareasUsuarioController::class, 'mostrar_tareas']);
