@extends('cliente.publicaciones.publicacionestemplate')
@section('content')
<section class="container">
  <div class="row d-flex justify-content-around">
   
    <h1 class="">
      Publicaciones - Relaciones Internacionales
    </h1>
    @foreach ($publicaciones as $publicacion)
    <div class="col-12 col-sm-8 col-md-4 p-0 m-3">
      <div class="card">
        <h5 class="card-header">
          {{$publicacion->correlativo}}
        </h5>
        <div class="card-body">
          <img src="{{url($publicacion->url)}}" alt="" srcset="">
          <h5 class="card-title">
            {{$publicacion->titulo}}
          </h5>
          <p class="card-text">
            {{$publicacion->subtitulo}}
          </p>
          <a href="/publicaciones/{{$publicacion->id_publicaciones}}" class="btn custom-btn">Ver Publicación</a>
        </div>
      </div>

    </div>
    @endforeach

  </div>
</section>
@endsection