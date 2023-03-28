<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //primera variable para mostrar el conteo de visitas;
        $visitas = collect(DB::select('select COUNT(*) as total from relaciones.visita '))->first();
        DB::insert(
            "INSERT INTO visita (fecha, ip, datos) VALUES (NOW(),?,?)",
            [$request->ip(), $request->header('User-Agent')]
        );
        $total_convenios = collect(DB::select("SELECT COUNT(*) as total FROM sic_convenio WHERE estado = 'Activo'"))->first();
        $total_publicaciones = collect(DB::select('SELECT count(*) AS total FROM publicaciones WHERE estado = 1'))->first();
        $oferta_becas = collect(DB::select("SELECT count(*) AS total FROM publicaciones WHERE estado = 1 AND tipo_publicaciones = 'Becas'"))->first();
        $carreras = DB::select("SELECT * FROM sic_carrera");
        return view('home.index', [
            'title' => 'Relaciones Internacionales - UPEA',
            'visitas' => $visitas,
            'total_convenios' => $total_convenios,
            'total_publicaciones' => $total_publicaciones,
            'oferta_becas' => $oferta_becas,
            'carreras' => $carreras,
        ]);
    }
}
