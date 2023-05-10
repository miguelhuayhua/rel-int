@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        @include('admin.modal')
        <button id="toggleLeft" class="btn btn-toggle">
            <i class="fa fa-bars" aria-hidden="true">
            </i>
        </button>
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-xl-10" style="background-color: #f5f5f9;">
                <div class="row">
                    <div class="col-12">
                        @include('admin.topNavbar')
                    </div>
                    <div class="col-12 pt-2">
                        <h2>
                            Asignar Convenio
                        </h2>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar por código"
                                aria-label="Search">
                            <button class="btn btn-custom" type="submit">Buscar Convenio</button>
                        </form>
                        <h5>Listado de convenios</h5>
                        <ul class="list-group lista">
                            @foreach ($convenios as $convenio)
                                <li class="list-group-item lista-item">
                                    <div id="{{ $convenio->id_convenios}}"  onclick="listaSelect(event)"></div>
                                    <h6>
                                        {{ $convenio->entidad }}
                                    </h6>
                                    <p class="w-50">
                                        {{ $convenio->nombre_convenio }}
                                    </p>
                                    <span>
                                        {{ $convenio->correlativo }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <form enctype="multipart/form-data" id="form-asconvenio" method="POST" action="asconvenio">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="correlativo">Correlativo Convenio</label>
                                    <input type="text" disabled class="form-control" id="correlativo" 
                                        placeholder="Correlativo">
                                        <input type="number" name="id_convenios" id="id_convenio" hidden>
                                </div>
                                <div class="col-6">
                                    <label for="carrera">Carrera:</label>
                                    <select id="carrera" class="form-select" name="carrera"
                                        aria-label="Default select example">
                                        <option selected>Seleccione la carrera beneficiada</option>
                                        @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id_carrera}}">{{$carrera->nom_carrera}}</option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div onclick="enviar(asconvenio)" class="btn btn-custom w-25 my-5">Asignar Convenio</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
