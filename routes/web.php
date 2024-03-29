<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::get('/notipas', [\App\Http\Controllers\publicaciones\PublicacionesController::class, 'noticiaPasantia']);
Route::get('/publicaciones/{id_publicaciones}', [\App\Http\Controllers\publicaciones\PublicacionController::class, 'index']);
Route::get('/carrera/{id_carrera}', [\App\Http\Controllers\carrera\CarreraController::class, 'index']);
Route::get('/login', [\App\Http\Controllers\login\LoginController::class, 'index']);
Route::get('/about', [\App\Http\Controllers\about\AboutController::class, 'index']);

//RUTAS PARA EL ADMINISTRADOR
Route::get('/dashboard', [\App\Http\Controllers\admin\dashboard\DashboardController::class, 'index'])->name('dashboard');
//convenios
Route::get('dashboard/aconvenio', [\App\Http\Controllers\admin\convenios::class, 'index']);
Route::post('aconvenio', [App\Http\Controllers\admin\convenios::class, 'insertar'])->middleware('web');
Route::get('dashboard/asconvenio', [\App\Http\Controllers\admin\convenios::class, 'asconvenio']);
Route::post('dashboard/asconvenio', [\App\Http\Controllers\admin\convenios::class, 'asignarConvenio'])->middleware('web');
Route::get('/dashboard/convenios', [\App\Http\Controllers\admin\convenios::class, 'listar'])->name('convenios');
Route::get('/dashboard/convenios/{id_convenios}', [\App\Http\Controllers\admin\convenios::class, 'mostrar']);
Route::post('/dashboard/econvenio', [\App\Http\Controllers\admin\convenios::class, 'editar']);
Route::post('/dashboard/bconvenio', [\App\Http\Controllers\admin\convenios::class, 'borrar']);

//publicaciones
Route::get('dashboard/apublicacion', [\App\Http\Controllers\admin\publicaciones::class, 'index']);
Route::get('dashboard/publicaciones', [\App\Http\Controllers\admin\publicaciones::class, 'listar'])->name('publicaciones');
Route::post('dashboard/apublicacion', [\App\Http\Controllers\admin\publicaciones::class, 'insertar']);
Route::get('dashboard/publicaciones/{id_publicaciones}', [\App\Http\Controllers\admin\publicaciones::class, 'mostrar']);
Route::post('dashboard/epublicacion', [\App\Http\Controllers\admin\publicaciones::class, 'editar']);
Route::post('dashboard/bpublicacion', [\App\Http\Controllers\admin\publicaciones::class, 'borrar']);

//usuarios
Route::get('dashboard/ausuario', [\App\Http\Controllers\admin\usuarios::class, 'index']);
Route::get('dashboard/usuarios', [\App\Http\Controllers\admin\usuarios::class, 'listar'])->name('usuarios');
Route::get('dashboard/usuario/{id_usuario}', [\App\Http\Controllers\admin\usuarios::class, 'mostrar']);
Route::post('dashboard/eusuario', [RegisteredUserController::class, 'editar']);
Route::post('dashboard/busuario', [\App\Http\Controllers\admin\usuarios::class, 'borrar']);
Route::post('dashboard/ausuario', RegisteredUserController::class)->name('register');

//personas
Route::get('dashboard/apersona', [\App\Http\Controllers\admin\personas::class, 'index']);
Route::get('dashboard/personas', [\App\Http\Controllers\admin\personas::class, 'listar'])->name('personas');
Route::post('dashboard/apersona', [\App\Http\Controllers\admin\personas::class, 'insertar']);
Route::get('dashboard/persona/{id_persona}', [\App\Http\Controllers\admin\personas::class, 'mostrar']);
Route::post('dashboard/epersona', [\App\Http\Controllers\admin\personas::class, 'editar']);


//carreras
Route::get('dashboard/acarrera', [\App\Http\Controllers\admin\carreras::class, 'index']);
Route::get('dashboard/carreras', [\App\Http\Controllers\admin\carreras::class, 'listar'])->name('carreras');
Route::post('dashboard/acarrera', [\App\Http\Controllers\admin\carreras::class, 'insertar']);
Route::get('dashboard/carreras/{id_carrera}', [\App\Http\Controllers\admin\carreras::class, 'mostrar']);
Route::post('dashboard/ecarrera', [\App\Http\Controllers\admin\carreras::class, 'editar']);
Route::post('dashboard/bcarrera', [\App\Http\Controllers\admin\carreras::class, 'borrar']);

//galeria
Route::get('dashboard/agaleria', [\App\Http\Controllers\admin\galeria::class, 'index']);
Route::get('dashboard/galeria', [\App\Http\Controllers\admin\galeria::class, 'listar'])->name('galeria');
Route::post('dashboard/agaleria', [\App\Http\Controllers\admin\galeria::class, 'insertar']);
Route::post('dashboard/egaleria', [\App\Http\Controllers\admin\galeria::class, 'editar']);
Route::get('dashboard/galeria/{id_galeria}', [\App\Http\Controllers\admin\galeria::class, 'mostrar']);
Route::post('dashboard/bgaleria', [\App\Http\Controllers\admin\galeria::class, 'borrar']);
//enlaces

Route::get('dashboard/aenlace', [\App\Http\Controllers\admin\enlaces::class, 'index']);
Route::get('dashboard/enlaces', [\App\Http\Controllers\admin\enlaces::class, 'listar'])->name('enlaces');
Route::post('dashboard/aenlace', [\App\Http\Controllers\admin\enlaces::class, 'insertar']);
Route::post('dashboard/eenlace', [\App\Http\Controllers\admin\enlaces::class, 'editar']);
Route::get('dashboard/enlace/{id_enlace}', [\App\Http\Controllers\admin\enlaces::class, 'mostrar']);
Route::post('dashboard/benlace', [\App\Http\Controllers\admin\enlaces::class, 'borrar']);



//RUTAS DE LOGUEO
Route::post('/login', [\App\Http\Controllers\login\LoginController::class, 'iniciarSesion'])->name('login');
Route::get('/cerrarsesion', [\App\Http\Controllers\login\LoginController::class, 'cerrarSesion']);


//PERFIL
Route::get('/dashboard/perfil', [\App\Http\Controllers\admin\dashboard\perfil::class, 'index'])->name('perfil');
Route::post('/dashboard/eppersona', [\App\Http\Controllers\admin\dashboard\perfil::class, 'editarPersona']);
Route::post('/dashboard/epusuario', [\App\Http\Controllers\admin\dashboard\perfil::class, 'editarUsuario']);
Route::get('/dashboard/informacion', [\App\Http\Controllers\admin\dashboard\perfil::class, 'informacion'])->name('informacion');
Route::post('/dashboard/einformacion', [\App\Http\Controllers\admin\dashboard\perfil::class, 'editarInformacion']);


//GRAFICOS
Route::get('/dashboard/chartdata', [\App\Http\Controllers\admin\dashboard\DashboardController::class, 'getDataCharts']);


//AUDITORIA
Route::get('/dashboard/auditoria', [\App\Http\Controllers\admin\auditoria::class, 'index']);
