<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class convenios extends Controller
{
    public $user = null;
    public function __construct()
    {
        $this->middleware(EnsureTokenIsValid::class);
    }
    public function index(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return view(
            'admin.convenio.index',
            [
                'title' => 'Agregar Convenio',
                "usuario" => $user,
                "prueba" => null
            ]
        )->with('replace', true);
    }

    public function insertar(Request $request)
    {
        $image = $request->file('imagen');
        $image->move(public_path('imgConvenios'), $image->getClientOriginalName());
        $archivo = $request->file('file');
        $archivo->move(public_path('conveniosPdf'), $archivo->getClientOriginalName());
        $convenio = new Convenio;
        $convenio->nombre_convenio = $request->input('nombre');
        $convenio->objetivo_convenio = $request->input('objetivo');
        $convenio->img_convenio = 'imgConvenios/' . $request->input('imagen');
        $convenio->fecha_firma = $request->input('fecha_firma');
        $convenio->pdf_convenio = 'conveniosPdf/' . $request->input('file');
        $convenio->tiempo_duracion = $request->input('dias');
        $convenio->entidad = $request->input('entidad');
        $convenio->telefono = $request->input('telefono');
        $convenio->email = $request->input('email');
        $convenio->direccion = $request->input('direccion');
        $convenio->fecha_finalizacion = now();
        $convenio->id_tipo_convenio = $request->input('tipo');
        $convenio->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
        return back()->withInput()->header('Refresh', '0;url=' . url('/'))->setStatusCode(303);
    }
}
