@extends('cliente.convenios.conveniostemplate')
@section('content')
    @if ($tipo == 'Internacionales')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list">
                        <div class="row">
                            @foreach ($convenios as $convenio)
                                <div class="col-6">
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
                                            <img src="{{ url($convenio->img_convenio == null ? '' : $convenio->img_convenio) }}"
                                                width="100%" alt="">
                                            <p>
                                                <span>OBJETIVO:</span>
                                                {{ $convenio->objetivo_convenio }}
                                            </p>
                                            <p>
                                                <span>ENTIDAD:</span>
                                                {{ $convenio->entidad }}
                                            </p>
                                            <div class="info-convenio">
                                                <span>
                                                    Hasta el:
                                                    <b>
                                                        {{ \Carbon\Carbon::parse($convenio->fecha_finalizacion)->format('d/m') }}</b>
                                                    Del {{ \Carbon\Carbon::parse($convenio->fecha_finalizacion)->year }}
                                                </span>
                                            </div>
                                            @if ($convenio->pdf_convenio)
                                                <a href="{{ url($convenio->pdf_convenio) }}" target="blank" class="pdf">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </div>

                                    </li>
                                </div>
                            @endforeach
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    @else
        <div class="container">
            <div class="row d-flex justify-content-around">
                @foreach ($vista as $carrera)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="custom-card">
                            <img src='{{ url($carrera->image_url) }}' alt="...">
                            <div class="custom-card-body">
                                <h5>
                                    {{ $carrera->nom_carrera }}
                                </h5>

                                <button class="btn"
                                    onclick="mostrarConvenios('{{ $tipo }}','{{ $carrera->id_carrera }}','a')">
                                    Ver convenios {{ ucfirst(trans($tipo)) }}</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div id="modal" class="modal-container" onclick="hiddeModal(event)">
            <div class="custom-modal">
                <div class="row">
                    <ul id="lista-convenios" class="list">
                    </ul>
                </div>
            </div>
        </div>
    @endif

@endsection
