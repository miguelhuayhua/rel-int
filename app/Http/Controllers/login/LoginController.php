<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
        $username = $request->get('usuario');
        $password = $request->get('password');
        //verificar primero si existe algún token
        if ($request->hasCookie('t')) {
            if (collect(DB::select("SELECT * FROM sic_usuario WHERE login_token = ?", [$request->cookie('t')]))) {
                return Redirect::route('dashboard');
            } else {
                return Redirect::route('login')->withoutCookie(cookie('t'));
            }
        } else {
            $id_usuario = collect(DB::select(
                "SELECT id_usuario FROM sic_usuario WHERE usuario = ? AND password = ? ",
                [$username, md5($password)]
            ))->first();
            if ($id_usuario) {
                //generador de tokens
                $token = substr(sha1(rand()), 0, 16);
                DB::insert("UPDATE sic_usuario SET login_token = ?
                WHERE id_usuario = ? ", [$token, $id_usuario->id_usuario]);
                DB::commit();
                $cookie = cookie('t', $token, 0, null);
                return Redirect::route('dashboard')->cookie($cookie);
            } else {
                return Redirect::route('login');
            }
        }
    }
}
