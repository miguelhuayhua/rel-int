<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Console\BufferedConsoleOutput;
use Illuminate\Support\Facades\DB;

class ConveniosController extends Controller
{
    public function index()
    {
        $carreras = DB::select('SELECT * FROM sic_carrera WHERE estado = 1');
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        return view('cliente.convenios.index', [
            'title' => 'Convenios Relaciones Internacionales',
            'carreras' => $carreras,
            'descripcion' => 'Vea los convenios disponibles presentadas por Relaciones Internacionales de la Universidad Pública de El Alto',
            'palabrasClave' => 'Convenios UPEA, Convenios Relaciones Internacionales UPEA',
            'informacion' => $informacion
        ]);
    }
}
