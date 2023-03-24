@extends('publicaciones.publicacionestemplate')
@section('content')
    <section class="container">
        <div class="row">
            <h1 class="">
                Publicaciones - Relaciones Internacionales
            </h1>
            @foreach ($publicaciones as $publicacion)
                <div class="col-6 p-0">
                    <div class="card">
                        <h5 class="card-header">
                            {{$publicacion->correlativo}}
                        </h5>
                        <div class="card-body">
                          <h5 class="card-title">
                            {{$publicacion->titulo}}
                          </h5>
                          <p class="card-text">
                        {{$publicacion->subtitulo}}
                        </p>
                          <a href="#" class="btn custom-btn">Ver Publicación</a>
                        </div>
                      </div>
                    
                </div>
            @endforeach

        </div>
    </section>
@endsection
