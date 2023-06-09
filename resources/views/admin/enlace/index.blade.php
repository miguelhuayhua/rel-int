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
                    <div class="col-12 mt-4">
                        @include('admin.topNavbar')
                    </div>
                    @if ($enlace->id_enlace)
                        <div class="col-12 pt-2">
                            <h2>
                                Editar Enlace
                            </h2>
                            <form enctype="multipart/form-data" id="form-eenlace" method="POST"
                                action="/dashboard/eenlace">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <img class="img2" id="imagen2" alt="No seleccionado" srcset=""
                                            src="{{ url($enlace->url_enlace) }}">
                                    </div>
                                    <div class="col-8">
                                        <label for="url_enlace">Imagen del Enlace:</label>
                                        <input name="url_enlace" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="imagen" value="{{ $enlace->url_enlace }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="nombre_enlace">Nombre de Enlace:</label>
                                        <input type="text" class="form-control" id="nombre_enlace" name="nombre_enlace"
                                            placeholder="Introduzca el nombre del enlace"
                                            value="{{ $enlace->nombre_enlace }}">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="link_enlace">Link de Enlace:</label>
                                        <input type="text" class="form-control" id="link_enlace" name="links_enlace"
                                            placeholder="Introduzca el link del enlace" value="{{ $enlace->links_enlace }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="telefono">Telefono Enlace:</label>
                                        <input type="number" min="0" class="form-control" id="telefono"
                                            name="telefono" placeholder="Introduzca el teléfono del enlace"
                                            value="{{ $enlace->telefono }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="orden">Orden de Enlace:</label>
                                        <input type="number" min="0" class="form-control" id="orden"
                                            name="orden" placeholder="Introduzca el orden del enlace"
                                            value="{{ $enlace->orden }}">
                                    </div>
                                    <input type="hidden" name="id_enlace" value="{{ $enlace->id_enlace }}">
                                </div>
                                <div onclick="enviar(eenlace,'¿Está seguro de editar el enlace?')"
                                    class="btn btn-custom w-25">Editar Enlace</div>
                            </form>
                            <form action="/dashboard/benlace" class="mt-4" method="POST" id="form-benlace">
                                <input type="text" hidden name="id_enlace" value="{{ $enlace->id_enlace }}">
                                @csrf
                                <div onclick="enviar(benlace,'¿Desea borrar el enlace?')" class="btn btn-custom2 w-25">
                                    Eliminar Enlace</div>
                            </form>
                        </div>
                    @else
                        <div class="col-12 pt-2">
                            <h2>
                                Agregar Enlace
                            </h2>
                            <form enctype="multipart/form-data" id="form-aenlace" method="POST"
                                action="/dashboard/aenlace">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <img class="img2" id="imagen2" alt="No seleccionado" srcset="">
                                    </div>
                                    <div class="col-8">
                                        <label for="url_enlace">Imagen del Enlace:</label>
                                        <input name="url_enlace" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="imagen">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="nombre_enlace">Nombre de Enlace:</label>
                                        <input type="text" class="form-control" id="nombre_enlace" name="nombre_enlace"
                                            placeholder="Introduzca el nombre del enlace">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="link_enlace">Link de Enlace:</label>
                                        <input type="text" class="form-control" id="link_enlace" name="link_enlace"
                                            placeholder="Introduzca el link del enlace">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="telefono">Telefono Enlace:</label>
                                        <input type="number" min="0" class="form-control" id="telefono"
                                            name="telefono" placeholder="Introduzca el teléfono del enlace">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="orden">Orden de Enlace:</label>
                                        <input type="number" min="0" class="form-control" id="orden"
                                            name="orden" placeholder="Introduzca el orden del enlace">
                                    </div>
                                </div>
                                <div onclick="enviar(aenlace,'¿Está seguro de añadir el nuevo enlace?')"
                                    class="btn btn-custom w-25">Agregar Enlace</div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
