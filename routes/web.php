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

Route::get('/', function () {
    return view('home.index',['title'=>'Relaciones Internacionales - UPEA']);
});

Route::get('/publicaciones',[\App\Http\Controllers\Publicaciones::class, 'index']);

Route::get('/contacto',[App\Http\Controllers\Galeria::class, 'index']);
