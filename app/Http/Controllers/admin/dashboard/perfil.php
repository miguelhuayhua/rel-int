<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Middleware\EnsureTokenIsValid;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class perfil extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $estado = session('done');
        $done = $estado != null ? 1 : 0;
        return view(
            'admin.perfil.index',
            [
                'title' => 'Editar Perfil',
                'usuario' => $user,
                'done' => $done
            ]
        );
    }

    public function editarPersona(Request $request)
    {
        $id_persona = $request->input('id_persona');
        $persona = Persona::find($id_persona);
        if ($request->hasFile('imagen')) {
            $img = $request->file('imagen');
            $persona->img = 'assets/imgUsers/' . $img->getClientOriginalName();
            $img->move(public_path('assets/imgUsers'), $img->getClientOriginalName());
        }
        $persona->telefono = $request->input('telefono');
        $persona->email = $request->input('email');
        $persona->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar_perfil', 'sic_persona']);
        DB::commit();
        return Redirect::route('perfil')->with('done', ['done' => 1]);
    }

    public function editarUsuario(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $usuario = Usuario::find($id_usuario);
        $usuario->usuario = $request->input('usuario');
        $usuario->password = md5($request->input('password'));
        $usuario->actualizado = now();
        $usuario->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar_perfil', 'sic_usuario']);
        DB::commit();
        return Redirect::route('perfil')->with('done', ['done' => 1]);
    }





    //contacto y ubicación de la dirección
    public function editarInformacion(Request $request)
    {
        $correo = $request->input('correo');
        $fax = $request->input('fax');
        $celular = $request->input('celular');
        $telefono = $request->input('telefono');
        $ubicacion = $request->input('ubicacion');
        DB::update("UPDATE contacto_informacion SET telefono = ?, celular = ?, fax = ?, ubicacion = ?, correo = ?", [$telefono, $celular, $fax, $ubicacion, $correo]);
        $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar_informacion', 'contacto_informacion']);
        DB::commit();
        return Redirect::route('informacion')->with('done', ['done' => 1]);
    }

    public function informacion(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $estado = session('done');
        $done = $estado != null ? 1 : 0;
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();
        return view(
            'admin.perfil.informacion',
            [
                'title' => 'Editar Información Relaciones Internacionales',
                'usuario' => $user,
                'done' => $done,
                'informacion' => $informacion
            ]
        );
    }
}
