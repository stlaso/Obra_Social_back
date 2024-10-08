<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\NacionalidadController;
use App\Http\Controllers\AgrupamientoController;
use App\Http\Controllers\UglController;
use App\Http\Controllers\SeccionalController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\SubsidioController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\TipoDocumentacionController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\TramoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RolesController;




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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('personalista', [PersonaController::class,'listapersona']);
Route::get('personaAll', [PersonaController::class,'personaAll']);
Route::get('legajos', [PersonaController::class, 'legajos']);
Route::get('buscar-persona', [PersonaController::class,'buscarPersona']);
Route::get('seccionalAll', [SeccionalController::class,'seccionalAll']);
Route::get('buscar-seccional', [SeccionalController::class, 'buscarSeccional']);
Route::post('/cambiar-estado', [PersonaController::class, 'cambiarEstado']);
Route::apiResource('personas', PersonaController::class);
Route::apiResource('localidad', LocalidadController::class);
Route::get('buscar-localidad', [LocalidadController::class, 'buscarLocalidad']);
Route::get('localidades/{provincia_id}', [LocalidadController::class, 'obtenerPorProvincia']);
Route::apiResource('provincia', ProvinciaController::class);
Route::apiResource('nacionalidad', NacionalidadController::class);
Route::apiResource('agrupamiento', AgrupamientoController::class);
Route::apiResource('ugl', UglController::class);
Route::apiResource('seccional', SeccionalController::class);
Route::apiResource('estadocivil', EstadoCivilController::class);
Route::apiResource('agencia', AgenciaController::class);
Route::get('agenciaAll', [AgenciaController::class,'agenciaAll']);
Route::get('/agenciaDatos/{id}', [AgenciaController::class,'agenciaDatos']);
Route::get('buscar-agencia', [AgenciaController::class, 'buscarAgencia']);
Route::apiResource('subsidio', SubsidioController::class);
Route::apiResource('familia', FamiliaController::class);
Route::apiResource('documentacion', TipoDocumentacionController::class);
Route::apiResource('tramo', TramoController::class);
Route::apiResource('sexo', SexoController::class);
Route::apiResource('/user', UserController::class);
Route::apiResource('/roles',RolesController::class);
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
Route::post('/registrar', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('file', FileController::class);


/*
Route::post('/registrar', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');

// Rutas protegidas por middleware auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('personas', PersonaController::class);
    Route::apiResource('localidad', LocalidadController::class);
    Route::apiResource('provincia', ProvinciaController::class);
    Route::apiResource('nacionalidad', NacionalidadController::class);
    Route::apiResource('agrupamiento', AgrupamientoController::class);
    Route::apiResource('ugl', UglController::class);
    Route::apiResource('seccional', SeccionalController::class);
    Route::apiResource('estadocivil', EstadoCivilController::class);
    Route::apiResource('agencia', AgenciaController::class);
    Route::apiResource('subsidio', SubsidioController::class);
    Route::apiResource('familia', FamiliaController::class);
    Route::apiResource('documentacion', TipoDocumentacionController::class);
    Route::apiResource('tramo', TramoController::class);
    Route::apiResource('sexo', SexoController::class);
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/roles', RolesController::class);
});
*/

