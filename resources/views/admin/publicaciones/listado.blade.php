@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-xl-10" style="background-color: #f5f5f9;">
                <div class="col-12">
                    <h2>Listado de Publicaciones</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Correlativo</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Creación</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publicaciones as $index => $publicacion)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $publicacion->titulo }}</td>
                                    <td>{{ $publicacion->tipo_publicaciones }}</td>
                                    <td>{{ $publicacion->fecha }}</td>
                                    <td>
                                        <a class="icono btn"
                                            href="/dashboard/publicaciones/{{ $publicacion->id_publicaciones }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="..." class="d-flex justify-content-auto">
                        <ul class="pagination pagination-lg mx-auto">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12">
                    <a class="btn w-50 btn-custom" href="/dashboard/apublicacion">
                        <i class="fa fa-plus mx-2" aria-hidden="true">
                        </i>Agregar Nueva Publicación</a>
                </div>
            </div>

        </div>
    </section>
@endsection
