@extends('cliente.convenios.conveniostemplate')
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
          
        </div>
    </div>
@endsection
