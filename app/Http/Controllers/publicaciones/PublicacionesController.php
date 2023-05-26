<?php

namespace App\Http\Controllers\publicaciones;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index()
    {
        $publicaciones =  DB::select("SELECT * FROM publicaciones WHERE tipo_publicaciones in ('Publicaciones')  AND estado = 1
        ORDER BY id_publicaciones desc");

        return view('cliente.publicaciones.index', [
            'title' => 'Publicaciones',
            'publicaciones' => $publicaciones
        ]);
    }
    public function noticiaPasantia()
    {
        $publicaciones =  DB::select("SELECT * FROM publicaciones WHERE tipo_publicaciones in ('Noticias', 'Pasantias')  AND estado = 1
        ORDER BY id_publicaciones desc");

        return view('cliente.publicaciones.notipasan', [
            'title' => 'Noticias y Pasantias',
            'publicaciones' => $publicaciones
        ]);
    }
}
