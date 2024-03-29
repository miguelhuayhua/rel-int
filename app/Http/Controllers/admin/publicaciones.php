<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\Controller;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class publicaciones extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $publicacion = new Publicacion;
        return view(
            'admin.publicaciones.index',
            [
                'title' => 'Agregar Publicación',
                "usuario" => $user,
                "prueba" => null,
                'publicacion' => $publicacion
            ]
        )->with('replace', true);
    }
    public function insertar(Request $request)
    {
        $publicacion = new Publicacion;

        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $correlativo = $request->input('correlativo');
        if ($request->hasFile('url')) {
            $url = $request->file('url');
            $url->move(public_path('assets/img_publicaciones'), $url->getClientOriginalName());
            $publicacion->url = 'assets/img_publicaciones/' . $url->getClientOriginalName();
        }
        $links = $request->input('links');
        $tipo = $request->input('tipo');
        $subtitulo = $request->input('subtitulo');
        $publicacion->titulo = strtoupper($titulo);
        $publicacion->descripcion = $descripcion;
        $publicacion->subtitulo = $subtitulo;
        $publicacion->correlativo = $correlativo;
        $publicacion->links = $links;
        $publicacion->tipo_publicaciones = $tipo;
        $publicacion->fecha = now()->toDate();
        $publicacion->estado = 1;
        $publicacion->save();
        $id_publicaciones = $publicacion->getKey();
        if ($request->file('file') != null) {
            $archivo = $request->file('file');
            $archivo->move(public_path('assets/img_publicaciones/archivos/'), $archivo->getClientOriginalName());
            DB::insert('INSERT INTO publicaciones_archivo (id_publicaciones, nombre_archivo, estado_archivo, fecha) 
            VALUES (?,?,?,now())', [$id_publicaciones, 'assets/img_publicaciones/archivos/' . $archivo->getClientOriginalName(), '1']);
            DB::commit();
        }


        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();

        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'publicaciones']);
        DB::commit();
        return Redirect::route('publicaciones')->with('done', ['done' => 1]);
    }

    public function listar(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $estado = session()->get('done');
        $done = $estado != null ? 1 : 0;
        $publicaciones = Publicacion::orderBy('id_publicaciones', 'desc')->get()->filter(function ($publi) {
            return $publi->estado == 1;
        });
        return view(
            'admin.publicaciones.listado',
            [
                'title' => 'Listado de Publicaciones',
                'publicaciones' => $publicaciones,
                'usuario' => $user,
                'done' => $done
            ]
        );
    }
    public function editar(Request $request)
    {

        $id_publicaciones = $request->input('id_publicaciones');
        $publicacion = Publicacion::find($id_publicaciones);
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $correlativo = $request->input('correlativo');
        if ($request->hasFile('url')) {
            $url = $request->file('url');
            $url->move(public_path('assets/img_publicaciones'), $url->getClientOriginalName());
            $publicacion->url = 'assets/img_publicaciones/' . $url->getClientOriginalName();
        }
        $links = $request->input('links');
        $tipo = $request->input('tipo');
        $subtitulo = $request->input('subtitulo');
        $publicacion->titulo = strtoupper($titulo);
        $publicacion->descripcion = $descripcion;
        $publicacion->subtitulo = $subtitulo;
        $publicacion->correlativo = $correlativo;
        $publicacion->links = $links;
        $publicacion->tipo_publicaciones = $tipo;
        $publicacion->fecha = now()->toDate();
        $publicacion->estado = 1;
        $publicacion->save();
        if ($request->hasFile('file')) {
            $archivo = $request->file('file');
            $archivo->move(public_path('assets/img_publicaciones/archivos/'), $archivo->getClientOriginalName());
            DB::insert('INSERT INTO publicaciones_archivo (id_publicaciones, nombre_archivo, estado_archivo, fecha) 
                VALUES (?,?,?,now())', [$id_publicaciones, 'assets/img_publicaciones/archivos/' . $archivo->getClientOriginalName(), '1']);
            DB::commit();
        }

        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();

        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'publicaciones']);
        DB::commit();
        return Redirect::route('publicaciones')->with('done', ['done' => 1]);
    }
    public function mostrar(Request $request, $id_publicaciones)
    {
        $publicacion = Publicacion::find($id_publicaciones);
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();

        return view(
            'admin.publicaciones.index',
            [
                'title' => 'Editar Publicación',
                "usuario" => $user,
                'publicacion' => $publicacion
            ]
        );
    }

    public function borrar(Request $request)
    {
        $id_publicaciones = $request->input('id_publicaciones');
        $publicacion = Publicacion::find($id_publicaciones);
        $publicacion->estado = 0;
        $publicacion->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'publicaciones']);
        DB::commit();
        return Redirect::route('publicaciones')->with('done', ['done' => 1]);
    }
}
