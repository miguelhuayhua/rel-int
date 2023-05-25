<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;

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
        //obtención de datos de login
        $username = $request->get('usuario');
        $password = $request->get('password');

        //verificar primero si existe algún token
        if ($request->hasCookie('t')) {
            if (collect(DB::select("SELECT * FROM sic_usuario WHERE login_token = ?", [$request->cookie('t')]))) {
                return Redirect::route('dashboard');
            } else {
                $cookie = Cookie::forget('t');
                return redirect()->route('login')->withCookie($cookie);
            }
        } else {
            // Verificar los datos manualmente
            $credentials = $request->only('usuario', 'password');
            $user = $this->manualLogin($credentials);
            if ($user) {
                // Autenticación exitosa
                $token = substr(sha1(rand()), 0, 16);
                DB::insert("UPDATE sic_usuario SET login_token = ?, ultima_vez = now()
                WHERE id_usuario = ? ", [$token, $user->id_usuario]);
                DB::commit();
                $cookie = cookie('t', $token);
                return Redirect::route('dashboard')->cookie($cookie);
            } else {
                // Autenticación fallida
                return redirect()->back()->withErrors([
                    'usuario' => 'Credenciales inválidas',
                ]);
            }
            //generador de tokens


        }
    }
    protected function manualLogin($credentials)
    {
        // Verificar los datos manualmente y realizar la autenticación
        // Puedes utilizar cualquier lógica que desees para verificar los datos de inicio de sesión

        // Ejemplo: Verificar los datos en una tabla personalizada
        $user = Usuario::where('usuario', $credentials['usuario'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return $user;
        }

        return null;
    }


    public function cerrarSesion(Request $request)
    {
        $cookie = Cookie::forget('t');
        return redirect()->route('login')->withCookie($cookie);
    }
}
