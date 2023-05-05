<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class convenios extends Controller
{
    public $user = null;
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.convenio.index',
            [
                'title' => 'Agregar Convenio',
                "usuario" => $user,
                "prueba" => null
            ]
        );
    }

    public function insertar(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.convenio.index',
            [
                'title' => 'Agregar Convenio',
                "usuario" => $user,
                "prueba" => $request->all()
            ]
        );
    }
}
