<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PracticaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('roles', [RolController::class, 'store'])
    ->name("roles.store");
Route::get('roles', [RolController::class, 'rolesAll'])
    ->name("roles.rolesAll");
Route::get('proyectos', [ProyectoController::class, 'proyectosAll'])
->name("proyectos.proyectosAll"); 
Route::get('practicas', [PracticaController::class, 'practicasAll'])
->name("practicas.practicasAll");    