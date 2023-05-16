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
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/galeria', [App\Http\Controllers\GaleriaController::class, 'index']);
Route::get('/contacto', function () {
    return view('cliente.contacto.index', ['title' => 'Contacto - Relaciones Internacionales UPEA']);
});
Route::get('/convenios', [\App\Http\Controllers\convenios\ConveniosController::class, 'index']);
Route::get('/convenios/nacionales', [\App\Http\Controllers\convenios\NacionalesController::class, 'index']);
Route::get('/convenios/internacionales', [\App\Http\Controllers\convenios\InternacionalesController::class, 'index']);
Route::get('/convenios/{tipo}/{id}', [\App\Http\Controllers\convenios\CarreraConvenio::class, 'index']);
Route::get('/actividades', [\App\Http\Controllers\actividades\ActividadesController::class, 'index']);
Route::get('/becas', [App\Http\Controllers\becas\BecasController::class, 'index']);
Route::get('/idiomas', [App\Http\Controllers\idiomas\IdiomasController::class, 'index']);
Route::get('/publicaciones', [\App\Http\Controllers\publicaciones\PublicacionesController::class, 'index']);
Route::get('/publicaciones/{id_publicaciones}', [\App\Http\Controllers\publicaciones\PublicacionController::class, 'index']);
Route::get('/carrera/{id_carrera}', [\App\Http\Controllers\carrera\CarreraController::class, 'index']);
Route::get('/login', [\App\Http\Controllers\login\LoginController::class, 'index']);


//RUTAS PARA EL ADMINISTRADOR
Route::get('/dashboard', [\App\Http\Controllers\admin\dashboard\DashboardController::class, 'index'])->name('dashboard');
//convenios
Route::get('dashboard/aconvenio', [\App\Http\Controllers\admin\convenios::class, 'index']);
Route::post('aconvenio', [App\Http\Controllers\admin\convenios::class, 'insertar'])->middleware('web');
Route::get('dashboard/asconvenio', [\App\Http\Controllers\admin\convenios::class, 'asconvenio']);
Route::post('dashboard/asconvenio', [\App\Http\Controllers\admin\convenios::class, 'asignarConvenio'])->middleware('web');
Route::get('/dashboard/convenios', [\App\Http\Controllers\admin\convenios::class, 'listar'])->name('lista-convenios');
Route::get('/dashboard/convenios/{id_convenios}', [\App\Http\Controllers\admin\convenios::class, 'mostrar']);
//publicaciones

Route::get('dashboard/apublicacion', [\App\Http\Controllers\admin\publicaciones::class, 'index']);
Route::get('dashboard/publicaciones', [\App\Http\Controllers\admin\publicaciones::class, 'mostrar']);
Route::post('dashboard/apublicacion', [\App\Http\Controllers\admin\publicaciones::class, 'insertar']);
//usuarios
Route::get('dashboard/ausuario', [\App\Http\Controllers\admin\usuarios::class, 'index']);
Route::post('dashboard/ausuario', [\App\Http\Controllers\admin\usuarios::class, 'insertar']);
Route::get('dashboard/usuarios', [\App\Http\Controllers\admin\usuarios::class, 'mostrar']);
//personas
Route::get('dashboard/apersona', [\App\Http\Controllers\admin\usuarios::class, 'apersona']);
Route::post('dashboard/apersona', [\App\Http\Controllers\admin\usuarios::class, 'insertarPersona']);
//carreras
Route::get('dashboard/acarrera', [\App\Http\Controllers\admin\carreras::class, 'index']);
Route::post('dashboard/acarrera', [\App\Http\Controllers\admin\carreras::class, 'insertar']);
//RUTAS DE LOGUEO
Route::post('/login', [\App\Http\Controllers\login\LoginController::class, 'iniciarSesion'])->name('login');
Route::get('/cerrarsesion', [\App\Http\Controllers\login\LoginController::class, 'cerrarSesion']);


//PERFIL
Route::get('/dashboard/perfil', [\App\Http\Controllers\admin\dashboard\perfil::class, 'index']);
