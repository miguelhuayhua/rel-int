@extends('cliente.convenios.conveniostemplate')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-around">


            @foreach ($vista as $carrera)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="custom-card">
                        <img src='http://127.0.0.1:8000{{ $carrera->image_url }}' alt="...">
                        <div class="custom-card-body">
                            <h5>
                                {{ $carrera->nom_carrera }}
                            </h5>
                            <p>
                                Convenios Disponibles
                                <span>
                                    {{ $carrera->convenios }}

                                </span>
                            </p>
                            <button class="btn"
                                onclick="mostrarConvenios('{{ $tipo }}','{{ $carrera->id_carrera }}','a')">
                                Ver convenios {{ ucfirst(trans($tipo)) }}</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div id="modal" class="modal-container" onclick="hiddeModal(event)">
        <div class="custom-modal">
            <div class="row">
                <ul id="lista-convenios" class="list">
                </ul>
            </div>
        </div>
    </div>
@endsection
