<?php

namespace App\Http\Controllers\actividades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function index()
    {

        return view('actividades.index',
    [
        'title'=>'Actividades - Relaciones Internacionales - UPEA'
    ]);
    }
}
