<?php

namespace App\Http\Controllers\idiomas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdiomasController extends Controller
{
    public function index()
    {
        $idiomas = DB::select("SELECT * FROM publicaciones_archivo pa RIGHT JOIN publicaciones  p on pa.id_publicaciones= p.id_publicaciones WHERE p.tipo_publicaciones = 'Idiomas'");
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        return view(
            'cliente.idiomas.index',
            [
                'title' => 'Idiomas - Relaciones Internacionales UPEA',
                'idiomas' => $idiomas,
                'descripcion' => 'Conozca las ofertas de idiomas ofrecidas por Relaciones Internacionales de la Universidad Pública de El Alto',
                'palabrasClave' => 'Oferta Idiomas UPEA, Oferta Idiomas Relaciones Internacionales',
                'informacion' => $informacion
            ]
        );
    }
}
