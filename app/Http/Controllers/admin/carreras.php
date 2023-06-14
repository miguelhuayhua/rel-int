<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class carreras extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $carrera = new Carrera;
        return view(
            'admin.carrera.index',
            [
                'title' => 'Agregar Carrera',
                "usuario" => $user,
                'carrera' => $carrera
            ]
        );
    }
    public function listar(Request $request)
    {
        try {
            $carreras = Carrera::all()->filter(function ($carrera) {
                return $carrera->estado == 1;
            });
            $estado = session('done');
            $done = $estado != null ? 1 : 0;
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            return view(
                'admin.carrera.listado',
                [
                    'title' => 'Listado de Carreras',
                    'carreras' => $carreras,
                    'done' => $done,
                    "usuario" => $user
                ]
            );
        } catch (Exception $e) {
            return Redirect::route('carreras')->with('done', ['done' => 2]);
        }
    }
    public function editar(Request $request)
    {
        try {
            $id_carrera = $request->input('id_carrera');
            $carrera = Carrera::find($id_carrera);
            if ($request->hasFile('image_url')) {
                $img = $request->file('image_url');
                $carrera->image_url = 'carreras_logo/' . $img->getClientOriginalName();
                $img->move(public_path('carreras_logo/'), $img->getClientOriginalName());
            }
            $carrera->nom_carrera = ucfirst($request->input('nom_carrera'));
            $carrera->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'sic_carrera']);
            DB::commit();
            return Redirect::route('carreras')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('carreras')->with('done', ['done' => 2]);
        }
    }
    public function insertar(Request $request)
    {
        try {
            $carrera = new Carrera;
            if ($request->hasFile('image_url')) {
                $img = $request->file('image_url');
                $carrera->image_url = 'carreras_logo/' . $img->getClientOriginalName();
                $img->move(public_path('carreras_logo/'), $img->getClientOriginalName());
            }
            $carrera->nom_carrera = ucfirst($request->input('nom_carrera'));
            $carrera->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'sic_carrera']);
            DB::commit();
            return Redirect::route('carreras')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('carreras')->with('done', ['done' => 2]);
        }
    }
    public function mostrar(Request $request, $id_carrera)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();

        $carrera = Carrera::find($id_carrera);
        if ($carrera == null || $carrera->estado == 2) {
            return Redirect::route('carreras')->with('done', ['done' => 2]);
        } else {
            return view(
                'admin.carrera.index',
                [
                    'title' => 'Editar Carrera',
                    "usuario" => $user,
                    'carrera' => $carrera
                ]
            );
        }
    }
    public function borrar(Request $request)
    {
        try {
            $id_carrera = $request->input('id_carrera');
            $carrera = Carrera::find($id_carrera);
            $carrera->estado = 0;
            $carrera->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'sic_carrera']);
            DB::commit();
            return Redirect::route('carreras')->with('done', ['done' => 1]); //code...
        } catch (\Throwable $th) {
            return Redirect::route('carreras')->with('done', ['done' => 2]); //code...

        }
    }
}
