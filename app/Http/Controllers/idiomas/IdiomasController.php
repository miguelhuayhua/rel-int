<?php

namespace App\Http\Controllers\idiomas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdiomasController extends Controller
{
    public function index()
    {
        $idiomas = DB::select("SELECT * FROM publicaciones_archivo pa RIGHT JOIN publicaciones  p on pa.id_publicaciones= p.id_publicaciones WHERE p.tipo_publicaciones = 'Idiomas'");

        return view(
            'cliente.idiomas.index',
            [
                'title' => 'Idiomas - Relaciones Internacionales UPEA',
                'idiomas' => $idiomas
            ]
        );
    }
}
