@extends('convenios.conveniostemplate')
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
                            <a href="">Ver Convenios</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
