<?php

namespace App\Http\Controllers\admin;

use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usuarios extends Controller
{
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.usuario.index',
            [
                'title' => 'Agregar Usuario',
                "usuario" => $user,
                "prueba" => null
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
                "prueba" => null
            ]
        )->with('replace', true);
    }
}
