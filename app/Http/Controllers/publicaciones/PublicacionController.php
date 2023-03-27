<?php

namespace App\Http\Controllers\publicaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    public function index($id_publicaciones)
    {
        $publicacion = collect(DB::select("SELECT * FROM publicaciones WHERE id_publicaciones = ?", [$id_publicaciones]))->first();
        return view(
            'publicaciones.publicacion',
            [
                'title' => 'Publicación',
                'publicacion' => $publicacion
            ]
        );
    }
}
