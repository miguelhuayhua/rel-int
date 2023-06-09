<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    public function index()
    {
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();
        $imagenes = DB::select("SELECT * FROM galeria WHERE estado_galeria = 1");
        return view(
            'cliente.galeria.index',
            [
                "title" => "Galeria",
                "imagenes" => $imagenes,
                'descripcion' => 'Galería de imágenes de eventos llevados a cabo por Relaciones Internacionales de la Universidad Pública de El Alto',
                'palabrasClave' => 'Galeria Relaciones Internacionales, Galeria UPEA, Galeria Relaciones UPEA',
                'informacion' => $informacion,

            ]
        );
    }
}
