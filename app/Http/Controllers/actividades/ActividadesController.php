<?php

namespace App\Http\Controllers\actividades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ActividadesController extends Controller
{
    public function index()
    {
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();
        return view(
            'cliente.actividades.index',
            [
                'title' => 'Actividades - Relaciones Internacionales - UPEA',
                'descripcion' => 'Vea un poco de las actividades disponibles por  relaciones internacionales de la Universidad Pública de El Alto',
                'palabrasClave' => 'Actividades Upea, Actividades Relaciones Internacionales, Actividades Bolivia, Actividades de la Upea',
                'informacion' => $informacion,

            ]
        );
    }
}
