@extends('convenios.conveniostemplate')
@section('content')
    <main class="container">
        <div class="row">
            <div class="col-6 custom-card">
                <h2>Convenios {{ $tipo }}</h2>
                <img src="{{ url($carrera_conteo->image_url) }}" alt="" srcset="">
                <h1>
                    {{ $carrera_conteo->nom_carrera }}
                </h1>
            </div>
            <div class="col-6">

            </div>
        </div>
    </main>
@endsection
