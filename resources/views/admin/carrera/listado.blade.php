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
        @if ($done == 2)
            <div class="error" id="completado">
                <p>Ha ocurrido un error</p>
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            </div>
        @endif
        <div class="error" id="completado">
            <p>Ha ocurrido un error</p>
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        </div>
        @endif
        <button id="toggleLeft" class="btn btn-toggle">
            <i class="fa fa-bars" aria-hidden="true">
            </i>
        </button>
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-xl-10" style="background-color: #f5f5f9;">
                <div class="col-12">
                    <div class="col-12 mt-4">
                        @include('admin.topNavbar')
                    </div>
                    <h2>Listado de Carreras</h2>
                    <table class="table table-bordered" id="tabla">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Carrera</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carreras as $index => $carrera)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $carrera->nom_carrera }}</td>

                                    <td>
                                        <a class="icono btn" href="/dashboard/carreras/{{ $carrera->id_carrera }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </section>
@endsection
