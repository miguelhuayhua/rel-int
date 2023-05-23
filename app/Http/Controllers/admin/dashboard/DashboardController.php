<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su INNER JOIN sic_persona sp  WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        return view('admin.dashboard.index', [
            'title' => "Dashboard",
            "usuario" => $user,
        ])->with('replace', true);
    }

    public function getDataCharts()
    {
        $dataConvenios = DB::select("SELECT CASE WHEN id_tipo_convenio=1 THEN 'Nacionales' ELSE 'Internacionales' END as 'convenio',  COUNT(*) as 'cantidad' FROM sic_convenio GROUP BY 1");
        $dataDias = DB::select("SELECT CASE substring(DAYNAME(f.FECHA), 1,3)
        WHEN 'Mon' THEN 'Lunes'
        WHEN 'Tue' THEN 'Martes'
        WHEN 'Wed' THEN 'Miércoles'
        WHEN 'Thu' THEN 'Jueves'
        WHEN 'Fri' THEN 'Viernes'
        WHEN 'Sat' THEN 'Sábado'
        WHEN 'Sun' THEN 'Domingo'
      END AS nombre_dia , f.cantidad FROM (SELECT
    DATE(fecha) AS fecha, COUNT(*) AS cantidad
    FROM
        relaciones.visita a group by 1 ORDER BY 1 DESC LIMIT 7 ) as f;");
        $dataPublicaciones = DB::select("SELECT correlativo, count(*) as cantidad FROM  publicacion_visita pv left join publicaciones p on (p.id_publicaciones = pv.id_publicaciones) WHERE p.estado = 1 
        AND tipo_publicaciones = 'Publicaciones' group by 1 LIMIT 5");
        $dataUsuarios = DB::select("SELECT
        sc.usuario, count(*) as acciones
    FROM
        relaciones.acciones_usuario au LEFT JOIN sic_usuario sc ON sc.id_usuario = au.id_usuario WHERE sc.estado = '1' GROUP BY 1  LIMIT 5;");
        return ([
            'dataConvenios' => $dataConvenios,
            'dataDias' => $dataDias,
            'dataPublicaciones' => $dataPublicaciones,
            'dataUsuarios' => $dataUsuarios
        ]);
    }
}
