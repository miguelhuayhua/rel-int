<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $idiomas = DB::select("SELECT * FROM publicaciones WHERE tipo_publicaciones = 'Idiomas' AND estado = 1");

        return view(
            'cliente.about.index',
            [
                'title' => 'Idiomas - Relaciones Internacionales UPEA',
                'idiomas' => $idiomas
            ]
        );
    }
}
