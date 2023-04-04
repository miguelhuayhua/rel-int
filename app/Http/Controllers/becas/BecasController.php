<?php

namespace App\Http\Controllers\becas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BecasController extends Controller
{
    public function index()
    {
        $becas = DB::select("SELECT p.titulo, p.descripcion, p.correlativo ,p.url, p.links, p.fecha, pa.nombre_archivo FROM publicaciones p JOIN publicaciones_archivo pa ON p.id_publicaciones = pa.id_publicaciones WHERE p.tipo_publicaciones  = 'Becas'
        AND estado = 1");
        return view(
            'cliente/becas/index',
            [
                'title' => 'Becas - Relaciones Internacionales',
                'becas' => $becas
            ]
        );
    }
}
