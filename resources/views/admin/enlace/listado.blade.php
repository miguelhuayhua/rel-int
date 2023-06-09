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
                <div class="col-12">
                    <div class="col-12 mt-4">
                        @include('admin.topNavbar')
                    </div>
                    <h2>Listado de Enlaces</h2>
                    <table class="table table-bordered" id="tabla">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre de Enlace</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enlaces as $index => $enlace)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $enlace->nombre_enlace }}</td>
                                    <td>{{ \Carbon\Carbon::parse($enlace->fecha)->format('Y-m-d') }}</td>
                                    <td>
                                        <a class="icono btn" href="/dashboard/enlace/{{ $enlace->id_enlace }}">
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