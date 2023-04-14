<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'cliente.login.login',
            ["title" => "Login - Relaciones Internacionales"]
        );
    }
}
