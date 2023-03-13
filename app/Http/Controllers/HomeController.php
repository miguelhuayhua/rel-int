<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //primera variable para mostrar el conteo de visitas;
        $visitas = DB::select('select COUNT(*) from relaciones.visita ');
        return view('home.index', [
            'title' => 'Relaciones Internacionales - UPEA', 'visitas' => $visitas
        ]);
    }
}
