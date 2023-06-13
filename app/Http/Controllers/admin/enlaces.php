<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\EnsureTokenIsValid;

class enlaces extends Controller
{

    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $enlace = new Enlace;
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        return view('admin.enlace.index', [
            "title" => "Insertar Enlace",
            "enlace" => $enlace,
            "usuario" => $user
        ]);
    }
    public function listar(Request $request)
    {
        try {
            $enlaces = Enlace::all()->filter(function ($enlace) {
                return $enlace->estado == 1;
            });
            $estado = session('done');
            $done = $estado != null ? 1 : 2;
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            return view(
                'admin.enlace.listado',
                [
                    'title' => 'Listado de Enlaces',
                    "enlaces" => $enlaces,
                    'done' => $done,
                    "usuario" => $user
                ]
            );
        } catch (\Throwable $th) {
            $enlaces = Enlace::all()->filter(function ($enlace) {
                return $enlace->estado == 1;
            });
            $estado = session('done');
            $done = $estado != null ? 1 : 2;
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            return view(
                'admin.enlace.listado',
                [
                    'title' => 'Listado de Enlaces',
                    "enlaces" => $enlaces,
                    'done' => 2,
                    "usuario" => $user
                ]
            );
        }
    }
    public function editar(Request $request)
    {
        try {
            $id_enlace = $request->input('id_enlace');
            $enlace = Enlace::find($id_enlace);
            if ($request->hasFile('url_enlace')) {
                $img = $request->file('url_enlace');
                $enlace->url_enlace = 'assets/img_enlace/' . $img->getClientOriginalName();
                $img->move(public_path('assets/img_enlace/'), $img->getClientOriginalName());
            }
            $enlace->nombre_enlace = ucfirst($request->input('nombre_enlace'));
            $enlace->links_enlace = $request->input('links_enlace');
            $enlace->telefono = $request->input('telefono');
            $enlace->orden = $request->input('orden');
            $enlace->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'enlace']);
            DB::commit();
            return Redirect::route('enlaces')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('enlaces')->with('done', ['done' => 2]);
        }
    }
    public function insertar(Request $request)
    {
        try {
            $enlace = new Enlace;
            if ($request->hasFile('url_enlace')) {
                $img = $request->file('url_enlace');
                $enlace->url_enlace = 'assets/img_enlace/' . $img->getClientOriginalName();
                $img->move(public_path('assets/img_enlace/'), $img->getClientOriginalName());
            }
            $enlace->nombre_enlace = ucfirst($request->input('nombre_enlace'));
            $enlace->links_enlace = $request->input('links_enlace');
            $enlace->telefono = $request->input('telefono');
            $enlace->orden = $request->input('orden');
            $enlace->estado = 1;
            $enlace->fecha = now();
            $enlace->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'enlace']);
            DB::commit();
            return Redirect::route('enlaces')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('enlaces')->with('done', ['done' => 2]);
        }
    }
    public function mostrar(Request $request, $id_enlace)
    {
        try {
            $enlace = Enlace::find($id_enlace);
            if ($enlace->estado == 2) {
                return Redirect::route('enlaces');
            } else {
                $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
                return view(
                    'admin.enlace.index',
                    [
                        'title' => 'Editar Enlace',
                        "usuario" => $user,
                        'enlace' => $enlace
                    ]
                );
            }
        } catch (\Throwable $th) {
            return Redirect::route('enlaces')->with('done', ['done' => 2]);
        }
    }
    public function borrar(Request $request)
    {
        try {
            $id_enlace = $request->input('id_enlace');
            $enlace = Enlace::find($id_enlace);
            $enlace->estado = 0;
            $enlace->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'enlace']);
            DB::commit();
            return Redirect::route('enlaces')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('enlaces')->with('done', ['done' => 2]);
        }
    }
}
