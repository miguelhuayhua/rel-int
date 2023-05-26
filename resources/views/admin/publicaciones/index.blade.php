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
                    <div class="col-12 pt-2">
                        @if ($publicacion->id_publicaciones)
                            <h2>
                                Editar Publicación
                            </h2>
                            <form enctype="multipart/form-data" id="form-epublicacion" method="POST"
                                action="/dashboard/epublicacion">
                                @csrf
                                <div class="row">

                                    <div class="col-6">
                                        <label for="url">Inserte Banner:</label>
                                        <img class="img2" id="imagen2" src="{{ url($publicacion->url) }}"
                                            alt="No seleccionado">
                                        <input name="url" type="file" accept=".png, .jpg, .jpeg" class="form-control"
                                            id="imagen">
                                    </div>

                                    <div class="col-6">
                                        <label for="titulo">Título de Publicación:</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                            placeholder="Introduzca el nombre del convenio"
                                            value="{{ $publicacion->titulo }}">
                                    </div>
                                    <div class="col-12">
                                        <div id="files" class="w-100 d-flex">
                                        </div>
                                        <label for="docs">Seleccione su archivo</label>
                                        <input name="file" type="file" accept=".docx, .pdf" class="form-control"
                                            id="docs">
                                    </div>
                                    <hr>
                                    <div class="form-group col-12">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea name="descripcion" class="form-control" placeholder="Introduzca la descripcion de la publicación"
                                            id="descripcion" rows="5">{{ $publicacion->descripcion }}</textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="correlativo">Correlativo:</label>
                                        <input name="correlativo" id="correlativo" type="text"
                                            placeholder="Introduzca el correlativo de la publicación" class="form-control"
                                            type="text" value="{{ $publicacion->correlativo }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="subtitulo">Subtitulo de Publicación:</label>
                                        <input name="subtitulo" id="subtitulo" type="text"
                                            placeholder="Introduzca subtítulo de la publicación" class="form-control"
                                            type="text" value="{{ $publicacion->subtitulo }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="link">Link de referencia:</label>
                                        <input type="text" class="form-control" id="link" name="links"
                                            placeholder="Introduzca una dirección de referencia"
                                            value="{{ $publicacion->links }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="tipo">Tipo de
                                            Publicación:</label>

                                        <select id="tipo" class="form-select" name="tipo"
                                            aria-label="Default select example">
                                            <option selected>Seleccione el tipo de publicación...</option>
                                            <option value="Noticias"
                                                {{ $publicacion->tipo_publicaciones == 'Noticias' ? 'selected' : '' }}>
                                                Noticias</option>
                                            <option value="Becas"
                                                {{ $publicacion->tipo_publicaciones == 'Becas' ? 'selected' : '' }}>
                                                Becas
                                            </option>
                                            <option value="Idiomas"
                                                {{ $publicacion->tipo_publicaciones == 'Idiomas' ? 'selected' : '' }}>
                                                Idiomas</option>
                                            <option value="Pasantias"
                                                {{ $publicacion->tipo_publicaciones == 'Pasantias' ? 'selected' : '' }}>
                                                Pasantías</option>
                                            <option
                                                {{ $publicacion->tipo_publicaciones == 'Publicaciones' ? 'selected' : '' }}
                                                value="Publicaciones">
                                                Publicaciones</option>
                                        </select>
                                    </div>
                                    <input type="text" hidden name="id_publicaciones"
                                        value="{{ $publicacion->id_publicaciones }}">
                                </div>
                                <div onclick="enviar(epublicacion)" class="btn btn-custom w-25">Editar Publicación</div>
                            </form>
                            <form action="/dashboard/bpublicacion" class="mt-4" method="POST" id="form-bpublicacion">
                                <input type="text" hidden name="id_publicaciones"
                                    value="{{ $publicacion->id_publicaciones }}">
                                @csrf
                                <div onclick="enviar(bpublicacion,'¿Desea eliminar la publicación?')"
                                    class="btn btn-custom2 w-25">Terminar Publicación</div>
                            </form>
                        @else
                            <h2>
                                Insertar Nueva Publicación
                            </h2>
                            <form enctype="multipart/form-data" id="form-publicacion" method="POST"
                                action="/dashboard/apublicacion">
                                @csrf
                                <div class="row">

                                    <div class="col-6">
                                        <label for="url">Inserte Banner:</label>
                                        <img class="img2" id="imagen2" src="" alt="No seleccionado"
                                            srcset="">
                                        <input name="url" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="url">
                                    </div>

                                    <div class="col-6">
                                        <label for="titulo">Título de Publicación:</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                            placeholder="Introduzca el nombre del convenio">
                                    </div>
                                    <div class="col-12">
                                        <div id="files" class="w-100 d-flex">
                                        </div>
                                        <label for="docs">Seleccione su archivo</label>
                                        <input name="file" type="file" accept=".docx, .pdf" class="form-control"
                                            id="docs">
                                    </div>
                                    <hr>
                                    <div class="form-group col-12">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea name="descripcion" class="form-control" placeholder="Introduzca la descripcion de la publicación"
                                            id="descripcion" rows="5"></textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="correlativo">Correlativo:</label>
                                        <input name="correlativo" id="correlativo" type="text"
                                            placeholder="Introduzca el correlativo de la publicación" class="form-control"
                                            type="text">
                                    </div>
                                    <div class="col-6">
                                        <label for="subtitulo">Subtitulo de Publicación:</label>
                                        <input name="subtitulo" id="subtitulo" type="text"
                                            placeholder="Introduzca subtítulo de la publicación" class="form-control"
                                            type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="link">Link de referencia:</label>
                                        <input type="text" class="form-control" id="link" name="links"
                                            placeholder="Introduzca una dirección de referencia">
                                    </div>
                                    <div class="col-6">
                                        <label for="tipo">Tipo de Publicación:</label>
                                        <select id="tipo" class="form-select" name="tipo"
                                            aria-label="Default select example">
                                            <option selected>Seleccione el tipo de publicación...</option>
                                            <option value="Noticias">Noticias</option>
                                            <option value="Becas">Becas</option>
                                            <option value="Idiomas">Idiomas</option>
                                            <option value="Pasantias">Pasantías</option>
                                            <option value="Publicaciones">Publicaciones</option>
                                        </select>


                                    </div>
                                </div>
                                <div onclick="enviar(publicacion)" class="btn btn-custom w-25">Agregar Publicación</div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
