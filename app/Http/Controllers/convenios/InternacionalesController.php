<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternacionalesController extends Controller
{
    public function index(){
        return view('convenios.nac_inter',[
            'title'=>'Convenios Internacionales - UPEA'
        ]);
    }
}
