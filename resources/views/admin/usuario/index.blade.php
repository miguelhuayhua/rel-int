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
                            Insertar Nuevo Usuario
                        </h2>
                        <form enctype="multipart/form-data" id="form-ausuario" method="POST" action="/dashboard/ausuario">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="usuario">Nombre de Usuario:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario"
                                        placeholder="Introduzca el nombre del convenio">
                                </div>
                                <div class="form-group col-12">
                                    <label for="password">Introduzca su contraseña:</label>
                                    <input name="password" class="form-control" placeholder="Introduzca su nueva contraseña"
                                        id="password" type="password">
                                </div>
                                <div class="col-6 offset-3">
                                    <label for="persona">Seleccione a la persona encargada:</label>
                                    <select id="persona" class="form-select" name="id_persona"
                                        aria-label="Default select example">
                                        <option selected>Seleccione Persona Encargada</option>
                                        @foreach ($personas as $persona)
                                            <option value="{{ $persona->id_persona }}">
                                                {{ $persona->nombre . ' ' . $persona->paterno . ' ' . $persona->materno }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div onclick="enviar(ausuario)" class="btn btn-custom w-25">Agregar Nuevo Usuario</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
