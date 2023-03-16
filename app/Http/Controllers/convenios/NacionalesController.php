<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NacionalesController extends Controller
{
    public function index()
    {
        $vista = DB::select('SELECT * FROM vista_convenios_nacionales ORDER BY convenios DESC');//hace referencia al conteo que se genera en la vista para la cantidad de convenios por carrera
        return view('convenios.nac_inter', [
            'title' => 'Convocatorias Nacionales - UPEA',
            'vista' => $vista
        ]);
    }
}
