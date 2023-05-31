<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarreraConvenio extends Controller
{
    public function index($tipo, $id)
    {
        $title = $tipo == 'nacionales' ? 'Convenios Nacionales - UPEA' : 'Convenios Internacionales - UPEA';
        $carrera_conteo = null;
        $tipo == 'internacionales' ?
            $carrera_conteo = collect(DB::select('SELECT * FROM vista_convenios_internacionales WHERE id_carrera = ?', [$id]))->first() :
            $carrera_conteo = collect(DB::select('SELECT * FROM vista_convenios_nacionales WHERE id_carrera = ?', [$id]))->first();  //hace referencia al conteo de una carrera dado su id a la vez compara el tipo de convenio
        $detalles = DB::select(
            'SELECT * FROM  sic_convenio_carrera scc JOIN sic_convenio sc ON sc.id_convenios = scc.id_convenios
            JOIN sic_tipo_convenio stc ON sc.id_tipo_convenio = stc.id_tipo_convenio WHERE scc.id_carrera = ? AND stc.nombre_tipo_convenio = ? 
            AND sc.estado = ?',
            [$id, ucfirst($tipo), 'Activo']
        ); // hace el listado de todos los convenios dado el id de la carrera y el tipo de convenio 'Nacionales' | 'Internacionales'
        return ([
            'tipo' => $tipo,
            'id' => $id,
            'title' => $title,
            'detalles' => $detalles,
            
            
        ]);
    }
}
