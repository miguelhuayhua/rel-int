<?php

namespace App\Http\Controllers\admin\dashboard;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class perfil extends Controller
{
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();

        return view(
            'admin.perfil.index',
            [
                'title' => 'Editar Perfil',
                'usuario' => $user
            ]
        );
    }
}
