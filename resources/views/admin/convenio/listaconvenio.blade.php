@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        @include('admin.modal')
        @if ($done == 1)
            <div class="completado" id="completado">
                <p>La tarea ha sido completada</p>
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            </div>
        @endif
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
                        <h2>Listado de Convenios</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Correlativo</th>
                                    <th scope="col">Nombre de Convenio</th>
                                    <th scope="col">Entidad</th>
                                    <th scope="col">Fecha Publicación</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($convenios as $index => $convenio)
                                    <tr>
                                        <th scope="row">{{ $convenio->correlativo }}</th>
                                        <td>{{ $convenio->nombre_convenio }}</td>
                                        <td>{{ $convenio->entidad }}</td>
                                        <td>{{ $convenio->fecha_publicacion }}</td>
                                        <td>
                                            <a class="icono btn" href="/dashboard/convenios/{{ $convenio->id_convenios }}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
