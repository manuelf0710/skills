<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\SkillController;
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

Route::group([
	'prefix' => 'personas',
], function () {
    Route::get('personas', [PersonaController::class, 'lista'])
    ->name("personas.lista"); 
    Route::get('search', [PersonaController::class, 'index'])
    ->name("personas.index"); 
    
    Route::post('search', [PersonaController::class, 'searchPost'])
    ->name("personas.searchPost");     
});



Route::group([
    'prefix' => 'roles',
], function () {
    Route::post('roles', [RolController::class, 'store'])
    ->name("roles.store");

    Route::get('roles', [RolController::class, 'rolesAll'])
        ->name("roles.rolesAll");

    Route::get('search', [RolController::class, 'search'])
    ->name("roles.search");         
}); 

Route::group([
    'prefix' => 'skills',
], function () {  
    Route::get('search', [SkillController::class, 'search'])
    ->name("skills.search"); 
}); 



Route::group([
    'prefix' => 'proyectos',
], function () {
    Route::get('proyectos', [ProyectoController::class, 'proyectosAll'])
    ->name("proyectos.proyectosAll"); 
    
    Route::get('search', [ProyectoController::class, 'search'])
    ->name("proyectos.search"); 
}); 

Route::group([
    'prefix' => 'practicas',
], function () {
    Route::get('practicas', [PracticaController::class, 'practicasAll'])
    ->name("practicas.practicasAll");
    Route::get('search', [PracticaController::class, 'search'])
    ->name("practicas.search");     
}); 




 