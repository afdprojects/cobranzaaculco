<?php

use App\Http\Controllers\ConfiguracionesController;
use App\Http\Controllers\CatalogoCuentaController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\NuevoCobroDiversoController;
use App\Http\Controllers\NuevoComercioEnElPadron;
use App\Http\Controllers\ImpresionCobrosController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ConsultarPadronComerciosController;
use App\Http\Controllers\ImpresionPadronDeComercios;
use App\Http\Controllers\ExportExcelPadronController;
use App\Http\Controllers\ExportadorComerciosExcelController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\ExportadorDiariosFechaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Registro;
use App\Http\Controllers\ImprimirReciboController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('register', RegisteredUserController::class)->middleware(['auth:sanctum','verified']);

Route::resource('registro', Registro::class)->middleware(['auth:sanctum','verified']);

Route::resource('configuraciones', ConfiguracionesController::class)->middleware(['auth:sanctum','verified']);

Route::resource('catalogodecuentas', CatalogoCuentaController::class)->middleware(['auth:sanctum','verified']);
Route::resource('nuevocobrodiverso', NuevoCobroDiversoController::class)->middleware(['auth:sanctum','verified']);

Route::resource('padrondecomercios', NuevoComercioEnElPadron::class)->middleware(['auth:sanctum','verified']);

Route::resource('impresiondecobros',ImpresionCobrosController::class)->middleware(['auth:sanctum','verified']);

Route::resource('consultarcobro', ConsultasController::class)->middleware(['auth:sanctum','verified']);

Route::resource('consultarpadroncomercio', ConsultarPadronComerciosController::class)->middleware(['auth:sanctum','verified']);

Route::resource('impresionpadrondecomercios',ImpresionPadronDeComercios::class)->middleware(['auth:sanctum','verified']);




Route::resource('exportarpadroncomercioxls', ExportExcelPadronController::class)->middleware(['auth:sanctum','verified']);


Route::resource('imprimirrecibo', ImprimirReciboController::class)->middleware(['auth:sanctum','verified']);

Route::resource('exportarhoy', ExportExcelController::class)->middleware(['auth:sanctum','verified']);



Route::resource('exportadordiariosfecha', ExportadorDiariosFechaController::class)->middleware(['auth:sanctum','verified']);