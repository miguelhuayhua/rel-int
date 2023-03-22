<?php

namespace App\Http\Controllers\idiomas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IdiomasController extends Controller
{
    public function index(){
        return view('idiomas.index',
    ['title'=>'Idiomas - Relaciones Internacionales UPEA']);
    }
}
