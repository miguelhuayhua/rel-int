@extends('convenios.conveniostemplate')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-around">
            <h1>Convenios - Relaciones Internacionales UPEA</h1>
            <div class="col-5">
                <a href="convenios/nacionales" class="btn-convenio">
                    Convenios Nacionales
                    <img src="{{ url('iconos/nacional.png') }}" alt="" srcset="">
                </a>
            </div>
            <div class="col-5">
                <a href="convenios/internacionales" class="btn-convenio">
                    Convenios Internacionales
                    <img src="{{ url('iconos/internacionales.png') }}" alt="" srcset="">
                </a>
            </div>
            <div class="col-12">
                <h2>Convenios por Carrera</h2>
                <div class="row">
                    @foreach ($carreras as $carrera)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="carrera/{{ $carrera->id_carrera }}" class="carrera-item">
                                <img src="{{ url($carrera->image_url) }}" alt="" srcset="">
                                {{$carrera->nom_carrera}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
