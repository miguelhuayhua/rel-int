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
                        <div class="col-12 col-sm-6 col-md-5">
                            <img width="100%" src="{{ url($idioma->url == null ? '' : $idioma->url) }}" alt=""
                                srcset="">
                        </div>
                        <div class="col-12 col-sm-6 col-md-7 position-relative">
                            <h2>
                                {{ $idioma->titulo }}
                            </h2>
                            <p>
                                {{ $idioma->descripcion }}
                            </p>
                            <span class="fecha">
                                {{ $idioma->fecha }}
                            </span>
                            @if ($idioma->nombre_archivo)
                                <a href="{{ url($idioma->nombre_archivo) }}" download class="download-file">
                                    <i class="fa fa-download" aria-hidden="true"></i> </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
