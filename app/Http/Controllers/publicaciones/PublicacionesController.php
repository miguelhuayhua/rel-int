<?php

namespace App\Http\Controllers\publicaciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index(){
        return view('publicaciones.index',['title'=>'Publicaciones']);
    }
}
