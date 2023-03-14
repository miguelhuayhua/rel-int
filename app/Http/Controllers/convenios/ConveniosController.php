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
        $gestiones = DB::select(('SELECT * FROM sic_gestion ORDER BY nombre DESC'));
        
        return view('convenios.index', [
            'title' => 'Convenios Relaciones Internacionales',
            'gestiones' => $gestiones
        ]);
    }
}
