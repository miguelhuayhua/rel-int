<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\Controller;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class publicaciones extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.publicaciones.index',
            [
                'title' => 'Agregar Publicación',
                "usuario" => $user,
                "prueba" => null
            ]
        )->with('replace', true);
    }
    public function insertar(Request $request)
    {
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $correlativo = $request->input('correlativo');
        $url = $request->input('url');
        $links = $request->input('links');
        $tipo = $request->input('tipo');

        $publicacion = new Publicacion;
        $publicacion->titulo = $titulo;
        $publicacion->descripcion = $descripcion;
        $publicacion->correlativo = $correlativo;
        $publicacion->url = $url;
        $publicacion->links = $links;
        $publicacion->tipo_publicaciones = $tipo;
        $publicacion->fecha = now()->toDate();
        $publicacion->estado = 1;
        $publicacion->save();
        $id_publicaciones = $publicacion->getKey();
        $archivos = $request->files;
    }
}
