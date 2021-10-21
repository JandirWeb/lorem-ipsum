<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\projetoController;

Route::get('/', [projetoController::class, 'index']);

Route::get('/projetos/create', [projetoController::class, 'create']);
Route::get('/projetos/{id}', [projetoController::class, 'edit']);
Route::put('/projetos/update/{id}', [projetoController::class, 'update']);
Route::post('projetos', [projetoController::class, 'store']);

Route::delete('/projetos/{id}', [projetoController::class, 'destroy']);
