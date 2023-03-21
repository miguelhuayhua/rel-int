<?php

namespace App\Http\Controllers\becas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BecasController extends Controller
{
    public function index()
    {
        return view(
            'becas/index',
            ['title' => 'Becas - Relaciones Internacionales']
        );
    }
}
