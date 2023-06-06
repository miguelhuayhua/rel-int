@extends('cliente.carrera.carreratemplate')

@section('content')
    <section class="container-fluid">
        <div class="row my-5">
            <div class="col-6">
                <div class="banner-about">
                    <img src="{{ url('iconos/logo-upea.png') }}" alt="" srcset="">
                    <h3>Misión</h3>
                </div>
                <p>
                    “La Dirección de Relaciones Nacionales e Internacionales DRNI de la UPEA, es la encargada de la
                    internacionalización del conocimiento académico, científico, tecnológico, de Interacción Social
                    e
                    Investigación en todos los campos del conocimiento, para fortalecer y expandir los vínculos
                    internacionales con universidades nacionales y extranjeras; de beneficio para docentes y
                    estudiantes.”
                </p>
                <div class="my-3" style="height: 2px; background-color:brown;"></div>
            </div>
            <div class="col-6">
                <div class="banner-about">
                    <img src="{{ url('iconos/logo-upea.png') }}" alt="" srcset="">
                    <h3>Visión</h3>
                </div>
                <p>
                    “Profundizar los procesos de coordinación, gestión, formalización y seguimiento de programas
                    estratégicos y los acuerdos de cooperación con universidades nacionales y del exterior, así como
                    las
                    instituciones académicas, instituciones públicas, privadas, embajadas, consulados y
                    organizaciones
                    bilaterales y multilaterales que coadyuven en el proceso de internalización de la Educación
                    Superior.”
                </p>
                <div class="my-3" style="height: 2px; background-color:brown;"></div>

            </div>
            <div class="col-12">
                <div class="banner-about">
                    <img src="{{ url('iconos/logo-upea.png') }}" alt="" srcset="">
                    <h3>Líneas de Acción</h3>
                </div>
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
                <div class="my-3" style="height: 2px; background-color:brown;"></div>

            </div>
            <div class="col-12">
                <div class="banner-about">
                    <img src="{{ url('iconos/logo-upea.png') }}" alt="" srcset="">
                    <h3>Nuestro Objetivo</h3>
                </div>
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
                <div class="my-3" style="height: 2px; background-color:brown;"></div>

            </div>
            <div class="col-12">
                <div class="banner-about">
                    <img src="{{ url('iconos/logo-upea.png') }}" alt="" srcset="">
                    <h3>Funciones de nuestra Unidad</h3>
                </div>
                <p>
                    Establecer niveles de coordinación con los decanos, directores de carrera, coordinadores de
                    investigación y centro de estudiantes. Coordinar las acciones relacionadas a la Cooperación
                    Internacional e Institucional. Seguimiento de convenios existentes. Realizar la proposición de
                    nuevos
                    instrumentos de cooperación. Impulsar el desarrollo de Proyectos de Investigación con
                    instituciones
                    con
                    las cuales se tienen convenio. Programar visitas a otras Instituciones de Educación Superior con
                    vista a
                    identificar posibilidades de cooperación y desarrollo de proyectos conjuntos. Difundir
                    informaciones
                    relativas a ofertas de estudio en el extranjero. Asesorar a los estudiantes y docentes
                    extranjeros
                    en
                    todo lo referente a su estadía en el país.
                </p>
                <div class="my-3" style="height: 2px; background-color:brown;"></div>

            </div>
            <div class="col-12">
                <div class="banner-about">
                    <img src="{{ url('iconos/logo-upea.png') }}" alt="" srcset="">
                    <h3>Nuestra Organización</h3>

                </div>
                <div class="row">
                    <div class="col-6">
                        <img width="100%" src="{{ url('images/organigrama-rrnnii.png') }}" alt="">
                    </div>
                    <div class="col-6">
                        <h2>Conoce a Nuestro Equipo</h2>
                        <div class="row mt-4">
                            <div class="col-4">
                                <img width="100px" src=""
                                    alt="Fotografía Jefe de Unidad de Relaciones Internacionales">
                            </div>
                            <div class="col-8">
                                <b>Dr. Victor Edwin Campos
                                    Ugarte</b>
                                <p
                                    style="color: brown; font-weight: bold;border-top: 1px solid #AAA; padding-top: .5em; width: 60%">
                                    Jefe de relaciones Internacionales
                                </p>
                            </div>
                            <div class="col-4">
                                <img  class="perfiles" src="{{url('images/tecnico.png')}}"
                                    alt="Fotografía Técnico de Unidad de Relaciones Internacionales">
                            </div>
                            <div class="col-8">
                                <b>Mgs. Lic. Hugo Madeny López</b>
                                <p
                                    style="color: brown; font-weight: bold;border-top: 1px solid #AAA; padding-top: .5em; width: 60%">

                                    Técnico de Relaciones Internacionales
                                </p>
                            </div>
                            <div class="col-4">
                                <img width="100px" src=""
                                    alt="Fotografía Secretaría de Unidad de Relaciones Internacionales">
                            </div>
                            <div class="col-8">
                                <b>Cristina Teresa Mamani Mamani</b>
                                <p
                                    style="color: brown; font-weight: bold;border-top: 1px solid #AAA; padding-top: .5em; width: 60%">
                                    Secretaría
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3" style="height: 2px; background-color:brown;"></div>

            </div>
        </div>
    </section>
@endsection
