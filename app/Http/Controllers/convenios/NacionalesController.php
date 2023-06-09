<?php

namespace App\Http\Controllers\convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NacionalesController extends Controller
{
    public function index()
    {
        $informacion = collect(DB::select("SELECT * FROM contacto_informacion"))->first();

        $vista = DB::select("select sc.id_carrera AS id_carrera,sc.nom_carrera AS nom_carrera,sc.image_url AS image_url,count(tabla1.nombre_convenio) AS convenios,sc.estado AS estado from 
        sic_carrera sc left join 
            (
                select scc.id_carrera AS id_carrera, scon.nombre_convenio AS nombre_convenio from 
                sic_convenio scon join sic_tipo_convenio stc on(scon.id_tipo_convenio = stc.id_tipo_convenio)
                join sic_convenio_carrera scc on(scc.id_convenios = scon.id_convenios) where stc.nombre_tipo_convenio = 'Nacionales' and scon.estado = 'Activo'
            ) 
        tabla1 on(tabla1.id_carrera = sc.id_carrera) 
        where (sc.estado = 1) group by sc.id_carrera,sc.nom_carrera,sc.image_url ORDER BY convenios DESC "); //hace referencia al conteo que se genera en la vista para la cantidad de convenios por carrera
        return view('cliente.convenios.nac_inter', [
            'title' => 'Convocatorias Nacionales - UPEA',
            'vista' => $vista,
            'tipo' => 'Nacionales',
            'descripcion' => 'Conozca los convenios nacionales de la Universidad Pública de El Alto',
            'palabrasClave' => 'Convenios Nacionales UPEA, Convenios Nacionales',
            'informacion' => $informacion
        ]);
    }
}
