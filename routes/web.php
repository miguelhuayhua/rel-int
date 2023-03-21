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

//MÉTODOS GET DE CADA RUTA
Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);

Route::get('/publicaciones',[\App\Http\Controllers\Publicaciones::class, 'index']);
Route::get('/contacto',[App\Http\Controllers\Galeria::class, 'index']);
Route::get('/convenios',[\App\Http\Controllers\convenios\ConveniosController::class,'index']);
Route::get('/convenios/nacionales',[\App\Http\Controllers\convenios\NacionalesController::class,'index']);
Route::get('/convenios/internacionales',[\App\Http\Controllers\convenios\InternacionalesController::class,'index']);
Route::get('/convenios/{tipo}/{id}',[\App\Http\Controllers\convenios\CarreraConvenio::class,'index']);
Route::get('/actividades',[\App\Http\Controllers\actividades\ActividadesController::class, 'index']);
Route::get('/becas',[App\Http\Controllers\becas\BecasController::class, 'index']);