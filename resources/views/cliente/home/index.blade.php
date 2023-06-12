@extends('cliente.home.hometemplate')
@section('content')
    <!-- Toda la sección del header en la ruta principal "/" -->
    <header class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 p-0 position-relative title-container">
                <div class="main-title">
                    <h1>
                        Relaciones Internacionales - UPEA
                    </h1>
                    <p>
                        Encuentre todos los convenios y noticias de Relaciones Internacionales - UPEA
                    </p>
                </div>
                <div class="position-absolute w-100 top-0 d-flex justify-content-center">
                    <img class="img-upea" src="{{ url('iconos/logo-upea.png') }}" alt="logo monolito">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4
            order-first order-md-0 position-relative p-0 m-0 overflow-hidden"
                style="border-bottom: 3px solid brown">
                <img class="img-home" id="imgHome" src="{{ url('images/fondo.jpeg') }}" alt="">
                <div class="img-banner" id="imgBanner">
                </div>
                <ul class="lista-home">
                    <li>
                        <a href="/convenios">
                            <i class="fa fa-map"></i>
                            Convenios</a>
                    </li>
                    <li>
                        <a href="/becas">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            Becas</a>
                    </li>
                    <li>
                        <a href="/actividades">
                            <i class="fa fa-street-view" style="font-size: 2.5em"></i>
                            Actividades</a>
                    </li>
                    </li>
                </ul>
            </div>
            <div class="row p-0 m-0">
                <div class="slider">
                    <div class="slide-track">
                        @foreach ($carreras as $carrera)
                            <div class="slide">
                                <a class="bg-img-carreras" href="carrera/{{ $carrera->id_carrera }}">
                                    <img class="img-carreras" src="{{ url($carrera->image_url) }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row p-0 m-0 bg-counters">
                <hr>
                <div class="col-6 col-md-3">
                    <p class="counter">
                        <span id="span1">
                            {{ $visitas->total }}
                        </span>Visitas
                    </p>
                </div>
                <div class="col-6 col-md-3">
                    <p class="counter"><span id="span2">
                            {{ $total_convenios->total }}
                        </span>Convenios Disponibles</p>
                </div>
                <div class="col-6 col-md-3">
                    <p class="counter"><span id="span3">
                            {{ $total_publicaciones->total }}
                        </span>Publicaciones</p>
                </div>
                <div class="col-6 col-md-3">
                    <p class="counter">
                        <span id="span4">
                            {{ $oferta_becas->total }}
                        </span>
                        Oferta de Becas
                    </p>
                </div>
                <hr>
            </div>

    </header>
    <main class="container-fluid my-5">
        {{--

        <div class="row">
            <div class="col-12 col-md-6">

                <div class="d-flex justify-content-center">
                    <h3 class="collapse-title">
                        Misión
                    </h3>
                    <button class="btn collapse-button" type="button" data-toggle="collapse" data-target="#mision"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="collapse" id="mision">
                    <div class="ri-info">
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex justify-content-center">
                    <h3 class="collapse-title">Visión</h3>
                    <button class="btn collapse-button" type="button" data-toggle="collapse" data-target="#vision"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="collapse" id="vision">
                    <div class="ri-info">
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex justify-content-center">
                    <h3 class="collapse-title">Líneas de Acción</h3>
                    <button class="btn collapse-button" type="button" data-toggle="collapse" data-target="#lineas-accion"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="collapse" id="lineas-accion">
                    <div class="ri-info">
                        <p>
                            La Dirección de Relaciones Nacionales e Internacionales, propone trabajar las siguientes líneas
                            de
                            acción:

                            Promoción de la información y filiación de entidades de cooperación. Gestión y fortalecimiento
                            académico
                            vía intercambio de docentes y estudiantes. La Promoción y fortalecimiento de la investigación
                            científica
                            - tecnológica. El fortalecimiento de los procesos de Interacción Social y Extensión
                            Universitaria.
                            Programas de Becas. </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">

                <div class="d-flex justify-content-center">
                    <h3 class="collapse-title">Funciones y Servicios</h3>
                    <button class="btn collapse-button" type="button" data-toggle="collapse"
                        data-target="#funciones-servicios" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="collapse" id="funciones-servicios">
                    <div class="ri-info">
                        <p>
                            Establecer niveles de coordinación con los decanos, directores de carrera, coordinadores de
                            investigación y centro de estudiantes. Coordinar las acciones relacionadas a la Cooperación
                            Internacional e Institucional. Seguimiento de convenios existentes. Realizar la proposición de
                            nuevos
                            instrumentos de cooperación. Impulsar el desarrollo de Proyectos de Investigación con
                            instituciones
                            con
                            las cuales se tie <i class="fa fa-eye" aria-hidden="true"></i>
                            nen convenio. Programar visitas a otras Instituciones de Educación Superior con
                            vista a
                            identificar posibilidades de cooperación y desarrollo de proyectos conjuntos. Difundir
                            informaciones
                            relativas a ofertas de estudio en el extranjero. Asesorar a los estudiantes y docentes
                            extranjeros
                            en
                            todo lo referente a su estadía en el país.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <h3 class="collapse-title">
                        Objetivos
                    </h3>
                    <button class="btn collapse-button" type="button" data-toggle="collapse" data-target="#objetivos"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                </div>
               
            </div>
        </div> --}}

        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <h2>Últimas Noticias</h2>
                <div class="row">
                    @foreach ($noticias as $noticia)
                        <div class="col-12 col-lg-6 col-xl-4 noticia">
                            <img src="{{ $noticia->url }}" width="100%" alt="">
                            <div class="info-noticia">
                                <span>
                                    {{ $noticia->fecha }}
                                </span>
                            </div>

                            <h3>{{ $noticia->titulo }}</h3>
                            <p>{{ $noticia->subtitulo }}</p>
                            <a class="btn custom-btn-2" href="/publicaciones/{{ $noticia->id_publicaciones }}">Ver
                                Noticia</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h2>Últimos Convenios</h2>
                <div class="row">
                    @foreach ($convenios as $convenio)
                        <div class="col-12 col-lg-6 position-relative mt-5"
                            style="border-bottom: 1px solid brown; padding-bottom: 10px;">
                            <img src="{{ $convenio->img_convenio }}" width="70%" style="display:block;margin: 0 auto;"
                                alt="">

                            <h3 class="mt-3">{{ $convenio->nombre_convenio }}</h3>
                            <div class="d-flex">
                                <p style="color: #666"><b>Entidad:</b>{{ $convenio->entidad }}</p>
                                <div class="info-convenio">
                                    <span>
                                        Hasta el:
                                        <b> {{ \Carbon\Carbon::parse($convenio->fecha_finalizacion)->format('d/m') }}</b>
                                        Del {{ \Carbon\Carbon::parse($convenio->fecha_finalizacion)->year }}
                                    </span>
                                </div>

                            </div>
                            @if ($convenio->pdf_convenio)
                                <a href="{{ url($convenio->pdf_convenio) }}" target="blank" class="pdf">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    Descargar Información
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <h3 class="text-center mt-5" style="font-size: 1.5em">Enlaces Institucionales</h3>
        <div class="row mt-5 d-flex justify-content-center">
            @foreach ($enlaces as $enlace)
                <div class="col-3 col-md-3 col-xl-2 p-2 position-relative shadow rounded m-3">
                    <a target="_blank" href="{{ $enlace->links_enlace }}">
                        <img src="{{ url($enlace->url_enlace) }}" width="100%" alt="" srcset="">
                    </a>
                    <span class="enlace_name">{{ $enlace->nombre_enlace }}</span>
                    <span class="enlace_telefono">Teléfono: {{ $enlace->telefono }}</span>
                </div>
            @endforeach
        </div>
        <hr class="mt-5">

    </main>

    <script src="{{ url('js/home.js') }}"></script>
@endsection
