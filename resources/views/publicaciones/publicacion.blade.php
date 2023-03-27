@extends('publicaciones.publicacionestemplate')
@section('content')
<section class="container">
  <div class="row d-flex justify-content-around mt-4">
    <div class="col-12 col-md-6">
      <h1 class="titulo">{{$publicacion->titulo}}</h1>
      <img class="img-url" src="{{url($publicacion->url)}}" alt="">
      <h2 class="subtitulo">
        {{$publicacion->subtitulo}}
      </h2>
    </div>
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center position-relative">
      <span class="fecha">{{$publicacion->fecha}}</span>
      <a href="{{url($publicacion->nombre_archivo)}}" download class="download-file">
        <i class="fa fa-download" aria-hidden="true"></i>      </a>
      <p class="descripcion">
        {{$publicacion->descripcion}}
      </p>
    </div>


  </div>
</section>
@endsection