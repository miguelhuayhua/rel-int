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
                    <div class="col-12 mt-4">
                        @include('admin.topNavbar')
                    </div>
                    <div class="col-12">
                        <h3>Listado de Acciones Realizadas por los Usuarios</h3>
                        <table class="table table-bordered w-100" id="tabla">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ID Usuario</th>
                                    <th scope="col">Tipo
                                    </th>
                                    <th scope="col">Tabla</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acciones as $accion)
                                    <tr>
                                        <td>{{ $accion->id_acciones_usuario }}</td>
                                        <td>{{ $accion->id_usuario }}</td>
                                        <td>{{ $accion->tipo}}</td>
                                        <td>{{ $accion->tabla }}</td>
                                        <td>{{ $accion->fecha }}</td>
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
