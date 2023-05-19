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
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();

        return view('admin.dashboard.index', [
            'title' => "Dashboard",
            "usuario" => $user,
        ])->with('replace', true);
    }

    public function getDataCharts()
    {
        $dataConvenios = DB::select("SELECT CASE WHEN id_tipo_convenio=1 THEN 'Nacionales' ELSE 'Internacionales' END as 'convenio',  COUNT(*) as 'cantidad' FROM sic_convenio GROUP BY 1");
        return ([
            'dataConvenios' => $dataConvenios
        ]);
    }
}
