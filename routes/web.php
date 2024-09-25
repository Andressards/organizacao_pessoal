<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;

// Remova ou comente a rota duplicada abaixo
// Route::get('/', function () {
//     return view('welcome');
// });

// Defina as rotas utilizando o TarefasController
Route::get('/', [TarefasController::class, 'index']);
Route::post('/cadastroTarefas', [TarefasController::class, 'store']);
Route::patch('/cadastroTarefas/{tarefa}', [TarefasController::class, 'update']);
Route::delete('/cadastroTarefas/{tarefa}', [TarefasController::class, 'destroy']);