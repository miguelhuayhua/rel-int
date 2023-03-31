<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    public function index()
    {
        $imagenes = DB::select("SELECT * FROM galeria WHERE estado_galeria = 1");
        return view(
            'cliente.galeria.index',
            [
                "title" => "Galeria",
                "imagenes" => $imagenes
            ]
        );
    }
}
