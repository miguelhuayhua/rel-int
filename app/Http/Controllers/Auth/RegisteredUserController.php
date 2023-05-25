<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{

    // ...

    public function __invoke(Request $request)
    {


        $usuario = Usuario::create([
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'id_persona' => $request->id_persona,
            'fecha_registro' => now()->toDate(),
            'estado' => 1,
            'actualizado' => now(),
            'ultima_vez' => null,
            'login_token' => null
        ]);

        $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'sic_usuario']);
        DB::commit();

        // Resto de la lógica posterior al registro del usuario

        return Redirect::route('usuarios')->with('done', ['done' => 1]);
    }
    public function editar(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $usuario = Usuario::find($id_usuario);
        $usuario->usuario = $request->input('usuario');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->actualizado = now();
        $usuario->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'sic_usuario']);
        DB::commit();
        return Redirect::route('usuarios')->with('done', ['done' => 1]);
    }
}
