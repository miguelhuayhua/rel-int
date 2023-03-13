@extends('app')
@section('content')
<!-- Toda la sección del header en la ruta principal "/" -->
<header class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-8 p-0 position-relative">
            <h1 class="main-title">
                Relaciones Internacionales - UPEA
            </h1>

            <div class="position-absolute w-100 top-0 d-flex justify-content-center">
                <img class="img-mono" src="{{ url('images/fondo_monolito.png') }}" alt="logo monolito">
            </div>
            <p class="intro-home">
                Encuentre todos los convenios y noticias de Relaciones Internacionales de la UPEA
            </p>
        </div>
        <div class="col-12 col-md-6 col-lg-4
            order-first order-md-0 position-relative p-0 m-0 overflow-hidden">
            <img class="img-home" id="imgHome" src="{{ url('images/fondo.jpeg') }}" alt="">
            <button class="btn custom-btn">Ver más</button>

            <div class="img-banner" id="imgBanner">
            </div>

        </div>

        <div class="row p-0 m-0 bg-white">
            <hr>
            <div class="col-3">
                <p class="counter"><span id="span1">200</span>Convenios Totales</p>
            </div>
            <div class="col-3">
                <p class="counter"><span id="span2">20</span>Convenios Totales</p>
            </div>
            <div class="col-3">
                <p class="counter"><span id="span3">23</span>Convenios Totales</p>
            </div>
            <div class="col-3">
                <p class="counter"><span id="span4">50</span>Convenios Totales</p>
            </div>
            <hr>
        </div>
</header>
<main class="container my-5">
    <div class="row d-flex justify-content-around">
        <a href="convenios" class="col-3 news-card">
            <i class="fa fa-map"></i>
            <h4>Convenios</h4>
        </a>
        <a class="col-3 news-card">
            <i class="fa fa-map"></i>
            <h4>Becas</h4>
        </a>
        <a class="col-3 news-card">
            <i class="fa fa-map"></i>
            <h4>Actividades</h4>
        </a>
    </div>

    <div class="row">
        <div class="col-4 ri-info">
            <h3>Misión</h3>
            <p>
                “La Dirección de Relaciones Nacionales e Internacionales DRNI de la UPEA, es la encargada de la internacionalización del conocimiento académico, científico, tecnológico, de Interacción Social e Investigación en todos los campos del conocimiento, para fortalecer y expandir los vínculos internacionales con universidades nacionales y extranjeras; de beneficio para docentes y estudiantes.”
            </p>
        </div>
        <div class="col-4 ri-info">
            <h3>Visión</h3>
            <p>
                “Profundizar los procesos de coordinación, gestión, formalización y seguimiento de programas estratégicos y los acuerdos de cooperación con universidades nacionales y del exterior, así como las instituciones académicas, instituciones públicas, privadas, embajadas, consulados y organizaciones bilaterales y multilaterales que coadyuven en el proceso de internalización de la Educación Superior.”
            </p>
        </div>
        <div class="col-4 ri-info">
            <h3>Líneas de Acción</h3>
            <p>
                La Dirección de Relaciones Nacionales e Internacionales, propone trabajar las siguientes líneas de acción:

                Promoción de la información y filiación de entidades de cooperación. Gestión y fortalecimiento académico vía intercambio de docentes y estudiantes. La Promoción y fortalecimiento de la investigación científica - tecnológica. El fortalecimiento de los procesos de Interacción Social y Extensión Universitaria. Programas de Becas. </p>
        </div>
        <div class="col-6 ri-info">
            <h3>Funciones y Servicios</h3>
            <p>
                Establecer niveles de coordinación con los decanos, directores de carrera, coordinadores de investigación y centro de estudiantes. Coordinar las acciones relacionadas a la Cooperación Internacional e Institucional. Seguimiento de convenios existentes. Realizar la proposición de nuevos instrumentos de cooperación. Impulsar el desarrollo de Proyectos de Investigación con instituciones con las cuales se tienen convenio. Programar visitas a otras Instituciones de Educación Superior con vista a identificar posibilidades de cooperación y desarrollo de proyectos conjuntos. Difundir informaciones relativas a ofertas de estudio en el extranjero. Asesorar a los estudiantes y docentes extranjeros en todo lo referente a su estadía en el país.
            </p>
        </div>
        <div class="col-6 ri-info">
            <h3>Objetivos</h3>
            <ol>
                <li>
                    <p>
                        Promover el fortalecimiento de las relaciones de la Universidad Pública de El Alto (UPEA), con instituciones Nacionales, Internacionales relacionadas con la Educación Superior.
                    </p>
                </li>
                <li>
                    <p>
                        Promover el intercambio de docentes y estudiantes con universidades del exterior.
                    </p>
                </li>
                <li>
                    <p>
                        Gestionar financiamiento para la ejecución de programas y proyectos de investigación tecnológica en todas las áreas del conocimiento insertados en el Plan de desarrollo del a UPEA.
                    </p>
                </li>
                <li>
                    <p>
                        Gestionar la concreción de convenios de cooperación bilateral y multilateral con instituciones extranjeras y nacionales.
                    </p>
                </li>
                <li>
                    <p>
                        Fortalecer las actividades de investigación ciencia y tecnología a través de la realización de conferencias internacionales, talleres, seminarios en todos los campos del conocimiento dirigido a la comunidad universitaria en temas de actualidad.
                    </p>
                </li>
            </ol>
        </div>
    </div>
</main>
<script src="{{ url('js/home.js') }}"></script>
@endsection