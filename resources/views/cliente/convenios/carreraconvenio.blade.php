@extends('cliente.convenios.conveniostemplate')
@section('content')
    <main class="container">
        <div class="row">
            <div class="col-6 custom-card">
                <h2>Convenios {{ $tipo }}</h2>
                <img src="{{ url($carrera_conteo->image_url == null ? '' : $carrera_conteo->image_url) }}" alt=""
                    srcset="">
                <h1>
                    {{ $carrera_conteo->nom_carrera }}
                </h1>
            </div>
            <div class="col-12">
                <ul class="list">
                    @foreach ($detalles as $convenio)
                        <li class="list-item">
                            <div class="custom-item">
                                <p class="publicacion">
                                    <span>
                                        Publicado el:
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
                                @if ($convenio->pdf_convenio)
                                    <a href="{{ url($convenio->pdf_convenio) }}" target="blank" class="pdf">
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection
