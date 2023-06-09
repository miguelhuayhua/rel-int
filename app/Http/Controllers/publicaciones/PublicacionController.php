<?php

namespace App\Http\Controllers\publicaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function index($id_publicaciones)
    {
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();
        $publicacion = collect(DB::select("SELECT * FROM publicaciones_archivo pa RIGHT JOIN publicaciones  p on pa.id_publicaciones= p.id_publicaciones WHERE p.id_publicaciones = ?", [$id_publicaciones]))->first();
        DB::insert('INSERT INTO publicacion_visita VALUES (?,now())', [$id_publicaciones]);
        DB::commit();
        return view(
            'cliente.publicaciones.publicacion',
            [
                'title' => 'Publicación',
                'publicacion' => $publicacion,
                'descripcion' => 'Publicación de Relaciones Internacionales UPEA, entre para ver más información',
                'palabrasClave' => 'Publicacion UPEA, Noticias UPEA, informacion relaciones internacionales',
                'informacion' => $informacion,

            ]
        );
    }
}
