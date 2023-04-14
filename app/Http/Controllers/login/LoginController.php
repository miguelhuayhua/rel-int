<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'cliente.login.login',
            ["title" => "Login - Relaciones Internacionales"]
        );
    }

    public function iniciarSesion(Request $request)
    {
        $token = csrf_token();
        $encryptSession = Crypt::encryptString($token);
        $cookie = cookie('s',$encryptSession,0,null);
        return Redirect::route('dashboard')->cookie($cookie);
    }
}
