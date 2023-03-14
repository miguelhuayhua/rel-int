<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NacionalesController extends Controller
{
    public function index()
    {
        return view('convenios.nac_inter', [
            'title' => 'Convocatorias Nacionales - UPEA'
        ]);
    }
}
