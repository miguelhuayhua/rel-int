<?php

namespace App\Http\Controllers\idiomas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdiomasController extends Controller
{
    public function index()
    {
        $idiomas = DB::select("SELECT * FROM publicaciones WHERE tipo_publicaciones = 'Idiomas' AND estado = 1");

        return view(
            'cliente.idiomas.index',
            ['title' => 'Idiomas - Relaciones Internacionales UPEA',
            'idiomas'=>$idiomas]
        );
    }
}
