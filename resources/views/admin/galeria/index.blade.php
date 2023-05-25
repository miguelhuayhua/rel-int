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
                    @if ($galeria->id_galeria)
                        <div class="col-12 pt-2">
                            <h2>
                                Editar Galeria
                            </h2>
                            <form enctype="multipart/form-data" id="form-egaleria" method="POST"
                                action="/dashboard/egaleria">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <img class="img2" id="imagen2" src="{{ url($galeria->url_galeria) }}"
                                            alt="No seleccionado" srcset="">
                                    </div>
                                    <div class="col-8">
                                        <input type="text" hidden name="id_galeria" value="{{ $galeria->id_galeria }}">
                                        <label for="url_galeria">Imagen:</label>
                                        <input name="url_galeria" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="image">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="nombre_galeria">Nombre de Fotografía:</label>
                                        <input type="text" class="form-control" id="nombre_galeria" name="nombre_galeria"
                                            value="{{ $galeria->nombre_galeria }}"
                                            placeholder="Introduzca el nombre de la fotografía">
                                    </div>
                                </div>
                                <div onclick="enviar(egaleria,'¿Está seguro de editar la Fotografía?')"
                                    class="btn btn-custom w-25">Editar Carrera</div>
                            </form>
                            <form action="/dashboard/bgaleria" class="mt-4" method="POST" id="form-bcarrera">
                                <input type="text" hidden name="id_carrera" value="{{ $carrera->id_carrera }}">
                                @csrf
                                <div onclick="enviar(bgaleria,'¿Desea borrar la Fotografía?')" class="btn btn-custom2 w-25">
                                    Eliminar Fotografía</div>
                            </form>
                        </div>
                    @else
                        <div class="col-12 pt-2">
                            <h2>
                                Agregar Fotografía
                            </h2>
                            <form enctype="multipart/form-data" id="form-agaleria" method="POST"
                                action="/dashboard/agaleria">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <img class="img2" id="imagen2" alt="No seleccionado" srcset="">
                                    </div>
                                    <div class="col-8">
                                        <label for="url_galeria">Imagen:</label>
                                        <input name="url_galeria" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="imagen">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="nombre_galeria">Nombre de Fotografía:</label>
                                        <input type="text" class="form-control" id="nombre_galeria" name="nombre_galeria"
                                            placeholder="Introduzca el nombre de la fotografía">
                                    </div>
                                    <div class="col-6">
                                        <label for="f_galeria">Fecha de la Fotografía:</label>
                                        <input name="fecha_galeria" id="f_galeria" class="form-control" type="date">
                                    </div>
                                   
                                </div>
                                <div onclick="enviar(agaleria,'¿Está seguro de añadir la nueva Fotografía?')"
                                    class="btn btn-custom w-25">Agregar Fotografía</div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
