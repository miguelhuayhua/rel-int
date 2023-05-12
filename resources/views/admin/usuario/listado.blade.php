@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-xl-10" style="background-color: #f5f5f9;">
                <div class="col-12">
                    <h2>Listado de Usuarios</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Registrado</th>
                                <th scope="col">Última vez</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $index => $usuario)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $usuario->usuario }}</td>
                                    <td>{{ $usuario->fecha_registro }}</td>
                                    <td>{{ $usuario->fecha_registro }}</td>
                                    <td>
                                        <a class="icono btn" href="/dashboard/usuario/{{ $usuario->id_usuario }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <a class="btn w-50 btn-custom" href="/dashboard/ausuario">
                        <i class="fa fa-plus mx-2" aria-hidden="true">
                        </i>Agregar Nuevo Usuario</a>
                </div>
            </div>

        </div>
    </section>
@endsection
