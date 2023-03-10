<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Galeria extends Controller
{
    public function index(){
        return view('contacto.index',["title"=>"Contactos"]);
    }
}
