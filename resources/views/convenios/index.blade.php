@extends('convenios.conveniostemplate')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-around">
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
                <h1>Convenios por gestiones</h1>
                <ul class="gestion-lista">
                    @foreach ($gestiones as $gestion)
                        <li class="gestion-item">
                            <a href="convenios/{{ $gestion->nombre }}">
                                {{ $gestion->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
