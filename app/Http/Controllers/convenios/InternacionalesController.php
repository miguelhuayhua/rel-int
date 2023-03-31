<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternacionalesController extends Controller
{
    public function index(){
        $vista = DB::select('SELECT * FROM vista_convenios_internacionales ORDER BY convenios DESC');//hace referencia al conteo que se genera en la vista para la cantidad de convenios por carrera

        return view('cliente.convenios.nac_inter',[
            'title'=>'Convenios Internacionales - UPEA',
            'vista'=>$vista,
            'tipo'=>'internacionales'
        ]);
    }
}
