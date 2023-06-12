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
      WHERE scc.id_carrera = ? AND sc.estado = 'Activo' AND sc.id_tipo_convenio = 1", [$id_carrera]);
        $carrera = collect(DB::select("SELECT * FROM sic_carrera WHERE id_carrera = ?", [$id_carrera]))->first();
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        return view(
            'cliente.carrera.index',
            [
                'title' => $carrera->nom_carrera,
                'carrera' => $carrera,
                'carrera_convenios' => $carrera_convenios,
                'descripcion' => 'Convenios de la carrera de ' . $carrera->nom_carrera . ', vea los convenios disponibles mediante Relaciones Internacionales de la UPEA',
                'palabrasClave' => $carrera->nom_carrera . ' Convenios',
                'informacion' => $informacion
            ]
        );
    }
}
