<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\Controller;
use App\Models\Persona;
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
        $personas = Persona::all(['id_persona', 'nombre', 'paterno', 'materno']);
        return view(
            'admin.usuario.index',
            [
                'title' => 'Agregar Usuario',
                "usuario" => $user,
                "personas" => $personas,
                'id_usuario' => null
            ]
        )->with('replace', true);
    }
    public function apersona(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.usuario.persona',
            [
                'title' => 'Agregar Persona',
                "usuario" => $user,

            ]
        )->with('replace', true);
    }
    public function insertarPersona(Request $request)
    {
        $img = $request->file('imagen');
        $persona = new Persona;
        $persona->nombre = ucfirst($request->input('nombre'));
        $persona->paterno = ucfirst($request->input('paterno'));
        $persona->materno = ucfirst($request->input('materno'));
        $persona->ci = $request->input('ci');
        $persona->telefono = $request->input('telefono');
        $persona->email = $request->input('email');
        $persona->cargo = $request->input('tipo');
        $persona->img = 'assets/imgUsers/' . $img->getClientOriginalName();
        $img->move(public_path('assets/imgUsers'), $img->getClientOriginalName());
        $persona->save();
        return Redirect::route('dashboard');
    }
    public function insertar(Request $request)
    {
        $id_persona = $request->input('id_persona');
        $nombre = $request->input('usuario');
        $password = md5($request->input('password'));
        $usuario = new Usuario;
        $usuario->id_persona = $id_persona;
        $usuario->usuario = $nombre;
        $usuario->password = $password;
        $usuario->fecha_registro = now()->toDate();
        $usuario->estado = 1;
        $usuario->actualizado = now();
        $usuario->save();
        return Redirect::route('dashboard');
    }

    public function listar(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();

        $usuarios = Usuario::orderBy('id_usuario', 'desc')->get()->filter(function ($usuario) {
            return $usuario->estado = '1';
        });
        $usuarios->sortByDesc('id_usuario');
        return view('admin.usuario.listado', [
            'title' => 'Listado de Usuarios',
            'usuarios' => $usuarios,
            'usuario' => $user
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
                'usuario' => $usuario,
                'id_usuario' => $id_usuario
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
        return Redirect::route('usuarios');
    }
    public function borrar(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $usuario = Usuario::find($id_usuario);
        $usuario->estado = 0;
        $usuario->save();

        return Redirect::route('usuarios');
    }
}
