@extends('cliente.idiomas.idiomastemplate')
@section('content')
    <div class="container">
        <h1>
            Sección de Idiomas
        </h1>
        <div class="row">
            @foreach ($idiomas as $idioma)
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-3">
                            <img width="100%" src="{{ url($idioma->url) }}" alt="" srcset="">
                        </div>
                        <div class="col-12 col-sm-8 col-md-9 position-relative">
                            <h2>
                                {{ $idioma->titulo }}
                            </h2>
                            <p>
                                {{ $idioma->descripcion }}
                            </p>
                            <span class="fecha">
                                {{ $idioma->fecha }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
