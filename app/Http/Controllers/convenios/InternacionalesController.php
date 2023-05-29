<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternacionalesController extends Controller
{
    public function index()
    {
        $internacionales = DB::select("
        SELECT
	id_convenios, id_detalle_grupo, id_tipo_convenio, nombre_convenio, objetivo_convenio, img_convenio, pdf_convenio, 
	fecha_firma, fecha_finalizacion, tiempo_duracion, fecha_publicacion, direccion, entidad, telefono, email, estado, correlativo
FROM
	relaciones.sic_convenio o WHERE o.id_tipo_convenio = 2 AND o.estado = 'Activo';"); //hace referencia al conteo que se genera en la vista para la cantidad de convenios por carrera

        return view('cliente.convenios.nac_inter', [
            'title' => 'Convenios Internacionales - UPEA',
            'convenios' => $internacionales,
            'tipo' => 'Internacionales'
        ]);
    }
}
