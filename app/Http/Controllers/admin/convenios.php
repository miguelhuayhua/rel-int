<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Carrera;
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
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $convenio = new Convenio;
        return view(
            'admin.convenio.index',
            [
                'title' => 'Agregar Convenio',
                "usuario" => $user,
                "convenio" => $convenio
            ]
        )->with('replace', true);
    }

    public function insertar(Request $request)
    {
        $convenio = new Convenio;
        $convenio->nombre_convenio = $request->input('nombre');
        $convenio->objetivo_convenio = $request->input('objetivo');
        $convenio->fecha_firma = $request->input('fecha_firma');
        if ($request->hasFile('file')) {
            $archivo = $request->file('file');
            $archivo->move(public_path('conveniosPdf'), $archivo->getClientOriginalName());
            $convenio->pdf_convenio = "/conveniosPdf/" . $archivo->getClientOriginalName();
        }
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $image->move(public_path('imgConvenios'), $image->getClientOriginalName());
            $convenio->img_convenio = "/imgConvenios/" . $image->getClientOriginalName();
        }
        $convenio->fecha_finalizacion = $request->input('fecha_finalizacion');
        $convenio->tiempo_duracion = $request->input('dias');
        $convenio->entidad = $request->input('entidad');
        $convenio->telefono = $request->input('telefono');
        $convenio->email = $request->input('email');
        $convenio->direccion = $request->input('direccion');
        $convenio->id_tipo_convenio = $request->input('tipo');
        if (Convenio::all()->last() == null) {
            $convenio->correlativo = "CV-21";
        } else {
            $idlast = Convenio::all()->last()->id_convenios;
            $convenio->correlativo = "CV-2" . ($idlast + 1);
        }

        $convenio->save();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'sic_convenio']);
        DB::commit();
        return Redirect::route('convenios');
    }
    public function asconvenio(Request $request)
    {
        $carreras = Carrera::all();
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $convenios = Convenio::all(['id_convenios', 'nombre_convenio', 'entidad', 'correlativo', 'estado'])->where('estado', 'Activo')->sortByDesc('id_convenios');
        return view(
            'admin.convenio.asconvenio',
            [
                'title' => 'Asignar Convenio',
                "usuario" => $user,
                "convenios" => $convenios,
                "carreras" => $carreras
            ]
        )->with('replace', true);
    }

    public function asignarConvenio(Request $request)
    {
        $id_convenios = $request->input('id_convenios');
        $id_carrera = $request->input('carrera');
        DB::insert('INSERT INTO sic_convenio_carrera VALUES (?,?)', [$id_convenios, $id_carrera]);
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'insertar', 'sic_convenio_carrera']);
        DB::commit();
        return Redirect::route('convenios');
    }

    public function listar(Request $request)
    {
        $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
        $estado = session('done');
        $done = $estado != null ? 1 : 0;
        $convenios = Convenio::orderBy('id_convenios', 'desc')->get()->filter(function ($convenio) {
            return $convenio->estado == 'Activo';
        });
        return view(
            'admin.convenio.listaconvenio',
            [
                'title' => 'Listado de Convenios',
                'convenios' => $convenios,
                'usuario' => $user,
                'done' => $done
            ]
        );
    }

    public function mostrar(Request $request, $id_convenios)
    {

        try {
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            $convenio = Convenio::find($id_convenios);
            return view(
                'admin.convenio.index',
                [
                    'title' => 'Agregar Convenio',
                    "usuario" => $user,
                    'convenio' => $convenio,
                    'id_convenios' => $id_convenios
                ]
            );
        } catch (\Throwable $th) {
            return Redirect::route('convenios')->with('done', ['done' => 2]); //code...

        }
    }

    public function editar(Request $request)
    {
        try {
            $id_convenios = $request->input('id_convenios');
            $convenio = Convenio::find($id_convenios);
            $convenio->nombre_convenio = $request->input('nombre_convenio');
            if ($request->hasFile('file')) {
                $archivo = $request->file('file');
                $archivo->move(public_path('conveniosPdf'), $archivo->getClientOriginalName());
                $convenio->pdf_convenio = "/conveniosPdf/" . $archivo->getClientOriginalName();
            }
            if ($request->hasFile('imagen')) {
                $image = $request->file('imagen');
                $image->move(public_path('imgConvenios'), $image->getClientOriginalName());
                $convenio->img_convenio = "/imgConvenios/" . $image->getClientOriginalName();
            }
            $convenio->nombre_convenio = $request->input('nombre');
            $convenio->objetivo_convenio = $request->input('objetivo');
            $convenio->fecha_firma = $request->input('fecha_firma');
            $convenio->tiempo_duracion = $request->input('dias');
            $convenio->fecha_finalizacion = $request->input('fecha_finalizacion');
            $convenio->entidad = $request->input('entidad');
            $convenio->telefono = $request->input('telefono');
            $convenio->email = $request->input('email');
            $convenio->direccion = $request->input('direccion');
            $convenio->correlativo = "CV-" . $id_convenios;
            $convenio->id_tipo_convenio = $request->input('tipo');
            $convenio->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario WHERE login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'editar', 'sic_convenio']);
            DB::commit();
            return Redirect::route('convenios')->with('done', ['done' => 1]); //code...
        } catch (\Throwable $th) {
            return Redirect::route('convenios')->with('done', ['done' => 2]); //code...

        }
    }

    public function borrar(Request $request)
    {
        try {
            $id_convenios = $request->input('id_convenios');
            $convenio = Convenio::find($id_convenios);
            $convenio->estado = 'Concluido';
            $convenio->save();
            $user = collect(DB::select('SELECT * FROM sic_usuario su JOIN sic_persona sp ON sp.id_persona = su.id_persona WHERE su.login_token = ?', [$request->cookie('t')]))->first();
            DB::insert("INSERT INTO acciones_usuario (id_usuario, tipo,tabla, fecha)  VALUES (?,?,?,now())", [$user->id_usuario, 'eliminar', 'sic_convenio']);
            DB::commit();
            return Redirect::route('convenios')->with('done', ['done' => 1]);
        } catch (\Throwable $th) {
            return Redirect::route('convenios')->with('done', ['done' => 2]);
        }
    }
}
