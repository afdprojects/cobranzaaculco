<?php

use App\Http\Controllers\ConfiguracionesController;
use App\Http\Controllers\CatalogoCuentaController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\NuevoCobroDiversoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Registro;
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

Route::resource('registro', Registro::class)->middleware(['auth:sanctum','verified']);

Route::resource('configuraciones', ConfiguracionesController::class)->middleware(['auth:sanctum','verified']);

Route::resource('catalogodecuentas', CatalogoCuentaController::class)->middleware(['auth:sanctum','verified']);
Route::resource('nuevocobrodiverso', NuevoCobroDiversoController::class)->middleware(['auth:sanctum','verified']);
Route::resource('consultarcobro', ConsultasController::class)->middleware(['auth:sanctum','verified']);
