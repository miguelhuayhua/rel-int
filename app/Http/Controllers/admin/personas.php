<?php

namespace App\Http\Controllers\admin;
use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class personas extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function insertar(Request $request)
    {
        $img = $request->file('imagen');
        $persona = new Persona();
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
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'sic_persona']);
        DB::commit();
        return Redirect::route('personas');
    }

    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $persona = new Persona;
        return view(
            'admin.usuario.persona',
            [
                'title' => 'Agregar Persona',
                "usuario" => $user,
                'persona' => $persona
            ]
        );
    }
    public function editar(Request $request)
    {
        $id_persona = $request->input('id_persona');
        $persona = Persona::find($id_persona);
        if ($request->hasFile('imagen')) {
            $img = $request->file('imagen');
            $persona->img = 'assets/imgUsers/' . $img->getClientOriginalName();
            $img->move(public_path('assets/imgUsers'), $img->getClientOriginalName());
        }
        $persona->nombre = ucfirst($request->input('nombre'));
        $persona->paterno = ucfirst($request->input('paterno'));
        $persona->materno = ucfirst($request->input('materno'));
        $persona->ci = $request->input('ci');
        $persona->telefono = $request->input('telefono');
        $persona->email = $request->input('email');
        $persona->cargo = $request->input('tipo');
        $persona->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'sic_persona']);
        DB::commit();
        return Redirect::route('personas')->with('done', ['done' => 1]);
    }
    public function listar(Request $request)
    {
        $estado = session('done');
        $done = $estado != null ? 1 : 0;
        $personas = Persona::orderBy('id_persona', 'desc')->get();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();

        return view(
            'admin.usuario.listadopersona',
            [
                'title' => 'Listado de Personas',
                'personas' => $personas,
                'usuario' => $user,
                'done' => $done
            ]
        );
    }
    public function mostrar(Request $request, $id_persona)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $persona = Persona::find($id_persona);
        return view(
            'admin.usuario.persona',
            [
                'title' => 'Editar Persona',
                "usuario" => $user,
                'persona' => $persona
            ]
        )->with('replace', true);
    }
}
