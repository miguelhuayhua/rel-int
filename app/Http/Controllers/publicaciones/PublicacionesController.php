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
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        return view('cliente.publicaciones.index', [
            'title' => 'Publicaciones',
            'publicaciones' => $publicaciones,
            'descripcion' => 'Vea algunas de las últimas publicaciones de la dirección de Relaciones Internacionales de la Universidad Pública de El Alto',
            'palabrasClave' => 'Publicaciones UPEA, Publicaciones Relaciones Internacionales UPEA',
            'informacion' => $informacion

        ]);
    }
    public function noticiaPasantia()
    {
        $publicaciones =  DB::select("SELECT * FROM publicaciones WHERE tipo_publicaciones in ('Noticias', 'Pasantias')  AND estado = 1
        ORDER BY id_publicaciones desc");
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        return view('cliente.publicaciones.notipasan', [
            'title' => 'Noticias y Pasantias',
            'publicaciones' => $publicaciones,
            'descripcion' => 'Entérece de las últimas noticias de brindadas por Relaciones Internacionales de la Universidad Pública de El Alto',
            'palabrasClave' => 'Noticias UPEA, Noticias Relaciones Internacionales UPEA',
            'informacion' => $informacion
        ]);
    }
}
