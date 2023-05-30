<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {

        return view(
            'cliente.about.index',
            [
                'title' => 'Sobre Nosotros- Relaciones Internacionales UPEA',
            ]
        );
    }
}
