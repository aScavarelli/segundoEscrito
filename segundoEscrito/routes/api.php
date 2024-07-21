<?php

use App\Http\Controllers\controladorPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("/personas",[controladorPersona::class,"Listar"]);
Route::get("/personas/{d}",[controladorPersona::class,"ListarUno"]);
Route::post('/personas', [controladorPersona::class,'CrearPersona']);
Route::delete("/personas/{d}",[controladorPersona::class,"Eliminar"]);
Route::put("/personas/{d}",[controladorPersona::class,"Modificar"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
