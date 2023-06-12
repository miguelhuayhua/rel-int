<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NacionalesController extends Controller
{
    public function index()
    {
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        $vista = DB::select("SELECT * FROM sic_carrera where estado = 1 ORDER BY 1;"); //hace referencia al conteo que se genera en la vista para la cantidad de convenios por carrera
        return view('cliente.convenios.nac_inter', [
            'title' => 'Convocatorias Nacionales - UPEA',
            'vista' => $vista,
            'tipo' => 'Nacionales',
            'descripcion' => 'Conozca los convenios nacionales de la Universidad Pública de El Alto',
            'palabrasClave' => 'Convenios Nacionales UPEA, Convenios Nacionales',
            'informacion' => $informacion
        ]);
    }
}
