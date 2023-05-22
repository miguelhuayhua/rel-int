<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Persona;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class usuarios extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
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
        )->with('replace', true);
    }
    public function insertar(Request $request)
    {
        $id_persona = $request->input('id_persona');
        $nombre = $request->input('usuario');
        $password = md5($request->input('password'), true);
        $usuario = new Usuario;
        $usuario->id_persona = $id_persona;
        $usuario->usuario = $nombre;
        $usuario->password = $password;
        $usuario->fecha_registro = now()->toDate();
        $usuario->estado = 1;
        $usuario->actualizado = now();
        $usuario->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'sic_usuario']);
        DB::commit();
        return Redirect::route('dashboard');
    }

    public function listar(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        $estado = session('done');
        $done = $estado != null ? 1 : 0;
        $usuarios = Usuario::orderBy('id_usuario', 'desc')->get()->filter(function ($usuario) {
            return $usuario->estado = '1';
        });
        $usuarios->sortByDesc('id_usuario');
        return view('admin.usuario.listado', [
            'title' => 'Listado de Usuarios',
            'usuarios' => $usuarios,
            'usuario' => $user,
            'done' => $done
        ]);
    }

    public function mostrar(Request $request, $id_usuario)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        $usuario = Usuario::find($id_usuario);
        return view(
            'admin.usuario.index',
            [
                'title' => 'Editar usuario',
                "usuario" => $user,
                'user' => $usuario
            ]
        )->with('replace', true);
    }

    public function editar(Request $request)
    {

        $id_usuario = $request->input('id_usuario');
        $usuario = Usuario::find($id_usuario);
        $usuario->usuario = $request->input('usuario');
        $usuario->password = md5($request->input('password'));
        $usuario->actualizado = now();
        $usuario->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'sic_usuario']);
        DB::commit();
        return Redirect::route('usuarios')->with('done', ['done' => 1]);
    }
    public function borrar(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $usuario = Usuario::find($id_usuario);
        $usuario->estado = 0;
        $usuario->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'sic_usuario']);
        DB::commit();
        return Redirect::route('usuarios');
    }
}
