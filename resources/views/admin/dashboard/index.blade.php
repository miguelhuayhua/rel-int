@extends('admin.dashboard.dashboardtemplate')
@section('content')
    <section class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-lg-2 buttons">
                <img style="width: 100%; max-width: 90px;display: block; margin: 10px auto"
                    src="{{ url('/images/logorrnnii.png') }}" alt="" srcset="">
                <hr>
                <button id="tipo1" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
                    data-target="#tipos1" aria-expanded="false" aria-controls="collapseExample">
                    <div class="icon-flex">
                        <i class="fa fa-handshake-o icon" aria-hidden="true"></i>
                        Convenios
                    </div>
                    <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
                </button>
                <div class="collapse" id="tipos1">
                    <div class="ri-info">
                        <a href="" class="btn dash-btn">
                            Acción 1
                        </a>
                    </div>
                </div>
                <button id="tipo2" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
                    data-target="#tipos2" aria-expanded="false" aria-controls="collapseExample">
                    <div class="icon-flex">
                        <i class="fa fa-user-o icon" aria-hidden="true"></i>
                        Usuarios
                    </div>
                    <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
                </button>
                <div class="collapse" id="tipos2">
                    <div class="ri-info">
                        <a href="" class="btn dash-btn">
                            Acción 1
                        </a>
                    </div>
                </div>
                <button id="tipo3" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
                    data-target="#tipos3" aria-expanded="false" aria-controls="collapseExample">
                    <div class="icon-flex">
                        <i class="fa fa-clipboard icon" aria-hidden="true"></i>
                        Publicaciones
                    </div>
                    <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
                </button>
                <div class="collapse" id="tipos3">
                    <div class="ri-info">
                        <a href="" class="btn dash-btn">
                            Acción 1
                        </a>
                    </div>
                </div>
                <button id="tipo4" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
                    data-target="#tipos4" aria-expanded="false" aria-controls="collapseExample">
                    <div class="icon-flex">
                        <i class="fa fa-building-o icon" aria-hidden="true"></i>
                        Carreras
                    </div>
                    <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
                </button>
                <div class="collapse" id="tipos4">
                    <div class="ri-info">
                        <a href="" class="btn dash-btn">
                            Acción 1
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-10" style="background-color: #f5f5f9;">
                <div class="col-12">
                    <div class="user-cards">
                        <span><a href="/dashboard">Dashboard</a></span>
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
                            Haz obtenido <b>90</b> visitas hoy
                        </p>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-6">
                    <div class="user-cards">
                        <p>
                            Carreras con más convenios
                        </p>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
