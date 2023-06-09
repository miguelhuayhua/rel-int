<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        return view(
            'cliente.about.index',
            [
                'title' => 'Sobre Nosotros- Relaciones Internacionales UPEA',
                'descripcion' => 'Conozca al equipo de Relaciones Internacionales de  de la Universidad Pública de El Alto',
                'palabrasClave' => 'Equipos Relaciones Internacionales UPEA, Equipo Relaciones Internacionales Organigrama relaciones internacionales UPEA, Organigrama relaciones internacionales upea',
                'informacion' => $informacion,

            ]
        );
    }
}
