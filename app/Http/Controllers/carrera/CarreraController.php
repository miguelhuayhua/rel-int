<?php

namespace App\Http\Controllers\carrera;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarreraController extends Controller
{
    public function index($id_carrera)
    {
        $carrera_convenios = DB::select("SELECT * FROM sic_convenio sc JOIN sic_convenio_carrera scc ON  sc.id_convenios = scc.id_convenios JOIN sic_tipo_convenio stc ON stc.id_tipo_convenio = sc.id_tipo_convenio
      WHERE scc.id_carrera = ? AND sc.estado = 'Activo'", [$id_carrera]);
        $carrera = collect(DB::select("SELECT * FROM sic_carrera WHERE id_carrera = ?", [$id_carrera]))->first();
        return view(
            'cliente.carrera.index',
            [
                'title' => $carrera->nom_carrera,
                'carrera' => $carrera,
                'carrera_convenios' => $carrera_convenios
            ]
        );
    }
}
