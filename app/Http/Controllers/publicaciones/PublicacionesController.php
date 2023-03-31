<?php

namespace App\Http\Controllers\publicaciones;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index(){
        $publicaciones =  DB::select("SELECT * FROM publicaciones WHERE tipo_publicaciones = 'Publicaciones' AND estado = 1
        ORDER BY id_publicaciones desc");
        
        return view('cliente.publicaciones.index', [
            'title' => 'Publicaciones',
            'publicaciones' => $publicaciones
        ]);
    }
}
