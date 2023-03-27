@extends('carrera.carreratemplate')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="custom-card">
                    <h2>Todos los convenios:</h2>
                    <img src="{{ url($carrera->image_url) }}" alt="" srcset="">
                    <h1>
                        {{ $carrera->nom_carrera }}
                    </h1>
                </div>
            </div>
            @if ($carrera_convenios == null)
                <div class="col-12 col-md-7">
                    <p>
                        No existen convenios actuales disponibles 
                        para {{$carrera->nom_carrera}}
                    </p>
                </div>
            @else
                <div class="col-12 col-md-7">
                    <ul class="list">
                        @foreach ($carrera_convenios as $convenio)
                            <li class="list-item">
                                <div class="custom-item">
                                    <p class="publicacion">
                                        Publicado el:
                                        <span>
                                            {{ $convenio->fecha_publicacion }}
                                        </span>
                                    </p>
                                    <h3>
                                        {{ $convenio->nombre_convenio }}
                                    </h3>
                                    <p>
                                        <span>OBJETIVO:</span>
                                        {{ $convenio->objetivo_convenio }}
                                    </p>
                                    <p>
                                        <span>ENTIDAD:</span>
                                        {{ $convenio->entidad }}

                                    </p>
                                    <a href="{{ url('conveniosPdf/pdf1.pdf') }}" target="blank" class="pdf">
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>
@endsection
