<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Persona;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;

class usuarios extends Controller
{

    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $usuario = new Usuario;
        $personas = Persona::all(['id_persona', 'nombre', 'paterno', 'materno']);
        return view(
            'admin.usuario.index',
            [
                'title' => 'Agregar Usuario',
                "usuario" => $user,
                "personas" => $personas,
                'id_usuario' => null,
                'user' => $usuario,

            ]
        );
    }
    public function listar(Request $request)
    {
        try {
            $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            $estado = session('done');
            $done = $estado != null ? 1 : 2;
            $usuarios = Usuario::where('estado', '=', 1)->orderBy('id_usuario', 'desc')->get();
            $usuarios->sortByDesc('id_usuario');
            return view('admin.usuario.listado', [
                'title' => 'Listado de Usuarios',
                'usuarios' => $usuarios,
                'usuario' => $user,
                'done' => $done
            ]);
        } catch (\Throwable $th) {
            $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            $estado = session('done');
            $usuarios = Usuario::where('estado', '=', 1)->orderBy('id_usuario', 'desc')->get();
            $usuarios->sortByDesc('id_usuario');
            return view('admin.usuario.listado', [
                'title' => 'Listado de Usuarios',
                'usuarios' => $usuarios,
                'usuario' => $user,
                'done' => 2
            ]);
        }
    }

    public function mostrar(Request $request, $id_usuario)
    {
        try {
            $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            $usuario = Usuario::find($id_usuario);
            $persona = Persona::find($usuario->id_persona);
            return view(
                'admin.usuario.index',
                [
                    'title' => 'Editar usuario',
                    "usuario" => $user,
                    'user' => $usuario,
                    'persona' => $persona
                ]
            );
        } catch (\Throwable $th) {
            return Redirect::route('usuarios')->with('done', ['done' => 2]);
        }
    }

    public function editar(Request $request)
    {

        try {
            $id_usuario = $request->input('id_usuario');
            $usuario = Usuario::find($id_usuario);
            $usuario->usuario = $request->input('usuario');
            $usuario->password = md5($request->input('password'));
            $usuario->actualizado = now();
            $usuario->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'sic_usuario']);
            DB::commit();
            return Redirect::route('usuarios')->with('done', ['done' => 1]); //code...
        } catch (\Throwable $th) {
            return Redirect::route('usuarios')->with('done', ['done' => 2]); //code...
        }
    }
    public function borrar(Request $request)
    {
        try {
            $id_usuario = $request->input('id_usuario');
            $usuario = Usuario::find($id_usuario);
            $usuario->estado = 0;
            $usuario->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'sic_usuario']);
            DB::commit();
            return Redirect::route('usuarios')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('usuarios')->with('done', ['done' => 2]);
        }
    }
}
