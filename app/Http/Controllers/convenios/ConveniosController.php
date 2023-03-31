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
        $carreras = DB::select('SELECT * FROM sic_carrera');

        return view('cliente.convenios.index', [
            'title' => 'Convenios Relaciones Internacionales',
            'carreras' => $carreras
        ]);
    }
}
