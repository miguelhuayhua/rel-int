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

                    <div class="col-12 col-lg-6 offset-lg-3">
                        <h3>Datos Contacto y Ubicación</h3>
                        <form enctype="multipart/form-data" id="form-einformacion" method="POST"
                            action="/dashboard/einformacion">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="telefono">Teléfono Contacto:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        placeholder="Introduzca el Teléfono de contacto"
                                        value="{{ $informacion->telefono }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="celular">Celular Contacto:</label>
                                    <input class="form-control" name="celular"
                                        placeholder="Introduzca el celular de contacto" id="celular"
                                        value="{{ $informacion->celular }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="fax">Fax de Contacto:</label>
                                    <input name="fax" class="form-control" placeholder="Introduzca fax"
                                        value="{{ $informacion->fax }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="ubicacion">Ubicación de la Dirección DRRNI:</label>
                                    <textarea name="ubicacion" class="form-control"
                                        placeholder="Introduzca ubicación de la dirección de relaciones internacionales" id="ubicacion" cols="30"
                                        rows="2" style="max-height: 200px; min-height: 100px;">{{ $informacion->ubicacion }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="correo">Correo de Contacto:</label>
                                    <input name="correo" id="correo" class="form-control"
                                        placeholder="Introduzca el correo de contacto de la dirección de relaciones internacionales"
                                        value="{{ $informacion->correo }}">
                                </div>
                                <input type="text" hidden value="{{ $usuario->id_usuario }}" name="id_usuario">
                            </div>
                            <div onclick="enviar(einformacion,'¿Desea editar la información de la dirección?')"
                                class="btn btn-custom w-25">
                                Editar Información</div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
