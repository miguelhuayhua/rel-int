@extends('home.hometemplate')
@section('content')
    <!-- Toda la sección del header en la ruta principal "/" -->
    <header class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 p-0 position-relative">
                <div class="main-title">
                    <h1>
                        Relaciones Internacionales - UPEA
                    </h1>
                    <p>
                        Encuentre todos los convenios y noticias de Relaciones Internacionales - UPEA
                    </p>
                </div>
                <div class="position-absolute w-100 top-0 d-flex justify-content-center">
                    <img class="img-mono" src="{{ url('images/fondo_monolito.png') }}" alt="logo monolito">
                </div>
            </div>
            <div
                class="col-12 col-md-6 col-lg-4
            order-first order-md-0 position-relative p-0 m-0 overflow-hidden">
                <img class="img-home" id="imgHome" src="{{ url('images/fondo.jpeg') }}" alt="">
                <button class="btn custom-btn">Ver más</button>
                <div class="img-banner" id="imgBanner">
                </div>
            </div>
            <div class="row">
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
                        </span>Oferta de Becas
                    </p>
                </div>
                <hr>
            </div>

    </header>
    <main class="container my-5">
        <div class="row d-flex justify-content-around">
            <a href="convenios" class="col-5 col-md-3 news-card">
                <i class="fa fa-map"></i>
                <h4>Convenios</h4>
            </a>
            <a class="col-5 col-md-3 news-card" href="/becas">
                <i class="fa fa-suitcase" aria-hidden="true"></i>
                <h4>Becas</h4>
            </a>
            <a class="col-5 col-md-3 news-card" href="/actividades">
                <i class="fa fa-street-view"></i>
                <h4>Actividades</h4>
            </a>
        </div>

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
                        <p>
                            “La Dirección de Relaciones Nacionales e Internacionales DRNI de la UPEA, es la encargada de la
                            internacionalización del conocimiento académico, científico, tecnológico, de Interacción Social
                            e
                            Investigación en todos los campos del conocimiento, para fortalecer y expandir los vínculos
                            internacionales con universidades nacionales y extranjeras; de beneficio para docentes y
                            estudiantes.”
                        </p>
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
                        <p>
                            “Profundizar los procesos de coordinación, gestión, formalización y seguimiento de programas
                            estratégicos y los acuerdos de cooperación con universidades nacionales y del exterior, así como
                            las
                            instituciones académicas, instituciones públicas, privadas, embajadas, consulados y
                            organizaciones
                            bilaterales y multilaterales que coadyuven en el proceso de internalización de la Educación
                            Superior.”
                        </p>
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
                <div class="collapse" id="objetivos">
                    <div class="ri-info">
                        <ol>
                            <li>
                                <p>
                                    Promover el fortalecimiento de las relaciones de la Universidad Pública de El Alto
                                    (UPEA),
                                    con
                                    instituciones Nacionales, Internacionales relacionadas con la Educación Superior.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Promover el intercambio de docentes y estudiantes con universidades del exterior.
                                </p>
                            </li>
                            </li>
                            <li>
                                <p>
                                    Gestionar financiamiento para la ejecución de programas y proyectos de investigación
                                    tecnológica
                                    en todas las áreas del conocimiento insertados en el Plan de desarrollo del a UPEA.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Gestionar la concreción de convenios de cooperación bilateral y multilateral con
                                    instituciones
                                    extranjeras y nacionales.
                                </p>
                            </li>
                            <li>
                                <p>
                                    Fortalecer las actividades de investigación ciencia y tecnología a través de la
                                    realización
                                    de
                                    conferencias internacionales, talleres, seminarios en todos los campos del conocimiento
                                    dirigido
                                    a la comunidad universitaria en temas de actualidad.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ url('js/home.js') }}"></script>
@endsection
