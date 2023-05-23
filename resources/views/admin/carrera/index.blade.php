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
                    @if ($carrera->id_carrera)
                        <div class="col-12 pt-2">
                            <h2>
                                Editar Carrera
                            </h2>
                            <form enctype="multipart/form-data" id="form-ecarrera" method="POST"
                                action="/dashboard/ecarrera">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <img class="img2" id="imagen2" src="{{ url($carrera->image_url) }}"
                                            alt="No seleccionado" srcset="">
                                    </div>
                                    <div class="col-8">
                                        <input type="text" hidden name="id_carrera" value="{{ $carrera->id_carrera }}">
                                        <label for="image_url">Imagen:</label>
                                        <input name="image_url" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="image">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="nom_carrera">Nombre de Carrera:</label>
                                        <input type="text" class="form-control" id="nom_carrera" name="nom_carrera"
                                            value="{{ $carrera->nom_carrera }}"
                                            placeholder="Introduzca el nombre de la carrera">
                                    </div>
                                </div>
                                <div onclick="enviar(ecarrera,'¿Está seguro de editar la carrera?')"
                                    class="btn btn-custom w-25">Editar Carrera</div>
                            </form>
                            <form action="/dashboard/bcarrera" class="mt-4" method="POST" id="form-bcarrera">
                                <input type="text" hidden name="id_carrera" value="{{ $carrera->id_carrera }}">
                                @csrf
                                <div onclick="enviar(bcarrera,'¿Desea deshabilitar la Carrera?')"
                                    class="btn btn-custom2 w-25">Desactivar Carrera</div>
                            </form>
                        </div>
                    @else
                        <div class="col-12 pt-2">
                            <h2>
                                Agregar Carrera
                            </h2>
                            <form enctype="multipart/form-data" id="form-acarrera" method="POST"
                                action="/dashboard/acarrera">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <img class="img2" id="imagen2" src="" alt="No seleccionado"
                                            srcset="">
                                    </div>
                                    <div class="col-8">
                                        <label for="image_url">Imagen:</label>
                                        <input name="image_url" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="image">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="nom_carrera">Nombre de Carrera:</label>
                                        <input type="text" class="form-control" id="nom_carrera" name="nom_carrera"
                                            placeholder="Introduzca el nombre de la carrera">
                                    </div>
                                </div>
                                <div onclick="enviar(acarrera,'¿Está seguro de agregar la nueva Carrera?')"
                                    class="btn btn-custom w-25">Agregar Carrera</div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
