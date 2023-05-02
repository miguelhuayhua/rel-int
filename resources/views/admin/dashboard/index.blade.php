@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        <button id="toggleLeft" class="btn btn-toggle">
            <i class="fa fa-bars" aria-hidden="true">
            </i>
        </button>
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-lg-10" style="background-color: #f5f5f9;">
                <div class="row">
                    <div class="col-12">
                        <div class="user-cards  mx-auto my-3 dashboard-profile">
                            <a href="/dashboard">Dashboard</a>
                            <div class="profile">
                                <i class="fa fa-user-circle-o icon" aria-hidden="true"></i>
                                <span>
                                    {{ $usuario->usuario }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="user-cards">
                            <h3>
                                Felicidades {{ $usuario->usuario }}
                            </h3>
                            <p>
                                Haz obtenido <b>90</b> visitas hoy, puedes revisar tu perfil para mayor información

                            </p>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="col-4">
                        <div class="user-cards">
                            <p>
                                Carreras con más convenios
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="user-cards">
                            <p>
                                Convenio más solicitado
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="user-cards">
                            <p>
                                Publicaciones más visitadas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
