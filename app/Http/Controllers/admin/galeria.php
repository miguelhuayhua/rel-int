<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Galerias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\EnsureTokenIsValid;

class galeria extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $galeria = new Galerias;
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        return view('admin.galeria.index', [
            "title" => "Insertar Fotografía",
            "galeria" => $galeria,
            "usuario" => $user
        ]);
    }
    public function listar(Request $request)
    {
        $galerias = Galerias::all()->filter(function ($galeria) {
            return $galeria->estado_galeria == 1;
        });
        $estado = session('done');
        $done = $estado != null ? 1 : 0;
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.galeria.listado',
            [
                'title' => 'Listado de Carreras',
                'galerias' => $galerias,
                'done' => $done,
                "usuario" => $user
            ]
        );
    }
    public function editar(Request $request)
    {
        $id_galeria = $request->input('id_galeria');
        $galeria = Galerias::find($id_galeria);
        if ($request->hasFile('url_galeria')) {
            $img = $request->file('url_galeria');
            $galeria->url_galeria = 'assets/galeria/' . $img->getClientOriginalName();
            $img->move(public_path('assets/galeria/'), $img->getClientOriginalName());
        }
        $galeria->nombre_galeria = ucfirst($request->input('nombre_galeria'));
        $galeria->fecha_galeria = $request->input('fecha_galeria');
        $galeria->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'galeria']);
        DB::commit();
        return Redirect::route('galeria')->with('done', ['done' => 1]);
    }
    public function insertar(Request $request)
    {
        $galeria = new Galerias;
        if ($request->hasFile('url_galeria')) {
            $img = $request->file('url_galeria');
            $galeria->url_galeria = 'assets/galeria/' . $img->getClientOriginalName();
            $img->move(public_path('assets/galeria/'), $img->getClientOriginalName());
        }
        $galeria->nombre_galeria = ucfirst($request->input('nombre_galeria'));
        $galeria->fecha_galeria = $request->input('fecha_galeria');
        $galeria->estado_galeria = 1;
        $galeria->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'galeria']);
        DB::commit();
        return Redirect::route('galeria')->with('done', ['done' => 1]);
    }
    public function mostrar(Request $request, $id_galeria)
    {
        $galeria = Galerias::find($id_galeria);
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.galeria.index',
            [
                'title' => 'Editar Carrera',
                "usuario" => $user,
                'galeria' => $galeria
            ]
        );
    }
    public function borrar(Request $request)
    {
        $id_galeria = $request->input('id_galeria');
        $galeria = Galerias::find($id_galeria);
        $galeria->estado = 0;
        $galeria->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'galeria']);
        DB::commit();
        return Redirect::route('galeria')->with('done', ['done' => 1]);
    }
}
