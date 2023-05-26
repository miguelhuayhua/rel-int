@extends('cliente.publicaciones.publicacionestemplate')
@section('content')
    <section class="container">
        <div class="row d-flex justify-content-around">

            <h1 class="">
                Noticias y Pasantías - Relaciones Internacionales
            </h1>
            @foreach ($publicaciones as $publicacion)
                <div class="col-12 col-sm-8 col-md-4 p-0 m-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $publicacion->correlativo }}
                            <span><b>
                                    {{ $publicacion->tipo_publicaciones }}</b></span>
                        </div>
                        <div class="card-body">
                            <img src="{{ url($publicacion->url) }}" alt="" srcset="">
                            <h5 class="card-title">
                                {{ $publicacion->titulo }}
                            </h5>
                            <p class="card-text">
                                {{ $publicacion->subtitulo }}
                            </p>

                            <a href="/publicaciones/{{ $publicacion->id_publicaciones }}" class="btn custom-btn">
                                @if ($publicacion->tipo_publicaciones == 'Noticias')
                                    Ver Noticia
                                @else
                                    Ver Pasantía
                                @endif
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
@endsection
