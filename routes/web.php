<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdeneController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FrecuenciaController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PdfController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::apiResource('/ordenes', OrdeneController::class);

Route::get('/orden/{ordene}', [OrdenController::class, 'show']);

Route::get('/pdf/{id}', [PdfController::class, 'pdf']);

Route::apiResource('/equipos', EquipoController::class);
Route::apiResource('/frecuencias', FrecuenciaController::class);
Route::apiResource('/actividades', ActividadController::class);
Route::apiResource('/materiales', MaterialController::class);