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
                    <div class="col-12 col-lg-6">
                        <h3>Datos Personales</h3>
                        <form enctype="multipart/form-data" id="form-eppersona" method="POST"
                            action="/dashboard/eppersona">
                            @csrf
                            <input type="text" hidden name="id_persona" value="{{ $usuario->id_persona }}">
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <img class="img2" id="imagen2" src="{{ url($usuario->img) }}" alt="No seleccionado"
                                        srcset="">
                                    <label for="imagen">Fotografía:</label>
                                    <input name="imagen" type="file" accept=".png, .jpg, .jpeg" class="form-control"
                                        id="imagen">
                                </div>
                                <hr>

                                <div class="col-6">
                                    <label for="telefono">Telefono / Celular:</label>
                                    <input name="telefono"type="number" class="form-control" id="telefono"
                                        value="{{ $usuario->telefono }}" placeholder="Introduzca su teléfono o celular">
                                </div>
                                <div class="col-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $usuario->email }}" placeholder="ejemplo@entidad.com">
                                </div>
                            </div>
                            <div onclick="enviar(eppersona,'¿Desea cambiar sus datos personales?')"
                                class="btn btn-custom w-25">Editar Datos Personales</div>
                        </form>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h3>Datos de Usuario</h3>
                        <form enctype="multipart/form-data" id="form-epusuario" method="POST"
                            action="/dashboard/epusuario">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="usuario">Nombre de Usuario:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario"
                                        placeholder="Introduzca el nombre del usuario" value="{{ $usuario->usuario }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="password">Introduzca su contraseña nueva:</label>
                                    <input class="form-control" placeholder="Introduzca su nueva contraseña" id="password1"
                                        type="password">
                                </div>
                                <div class="form-group col-12">
                                    <label for="password">Vuelva a introducir su contraseña:</label>
                                    <input name="password" class="form-control" placeholder="Introduzca su nueva contraseña"
                                        id="password2" type="password">
                                    <small id="mensajePassword"
                                        style="color:red; font-size: .8em; font-wheight:200; display: none;">
                                        Las contraseñas no coinciden</small>
                                </div>
                                <input type="text" hidden value="{{ $usuario->id_usuario }}" name="id_usuario">
                            </div>
                            <div onclick="enviar(epusuario), '¿Desea editar el Usuario?'" class="btn btn-custom w-25">
                                Editar Usuario</div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
