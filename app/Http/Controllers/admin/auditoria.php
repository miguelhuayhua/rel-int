<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class auditoria extends Controller
{

    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {

        try {
            $acciones = DB::select('SELECT * FROM acciones_usuario');
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            $estado = session('done');
            $done = $estado != null ? 1 : 0;
            return view(
                'admin.auditoria.index',
                [
                    'title' => 'Auditoria',
                    'usuario' => $user,
                    'done' => $done,
                    'acciones' => $acciones
                ]
            );
        } catch (Exception $e) {
            $acciones = DB::select('SELECT * FROM acciones_usuario');
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            $estado = session('done');
            return view(
                'admin.auditoria.index',
                [
                    'title' => 'Auditoria',
                    'usuario' => $user,
                    'done' => 2,
                    'acciones' => $acciones
                ]
            );
        }
    }
}
