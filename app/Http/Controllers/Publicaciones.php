<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Publicaciones extends Controller
{
    public function index(){
        return view('publicaciones.index',['title'=>'Publicaciones']);
    }
}
