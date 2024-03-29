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
                        @if ($convenio->id_convenios)
                            <h2>
                                Editar Convenio
                            </h2>
                            <form enctype="multipart/form-data" id="form-econvenio" method="POST"
                                action="/dashboard/econvenio">
                                <input type="text" hidden name="id_convenios" value="{{ $id_convenios }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <img class="img2" id="imagen2" src="{{ url($convenio->img_convenio) }}"
                                            alt="No seleccionado" srcset="">
                                        <label for="imagen">Imagen:</label>
                                        <input name="imagen" type="file" accept=".png, .jpg, .jpeg" class="form-control"
                                            id="imagen">
                                    </div>
                                    <div class="col-6">
                                        <p id="doc2">
                                            <i class="fa " aria-hidden="true"></i>
                                        </p>
                                        <label for="doc">Pdf/Word:</label>
                                        <input name="file" type="file" accept=".docx, .pdf" class="form-control"
                                            id="doc">
                                    </div>
                                    <hr>
                                    <div class="form-group col-12">
                                        <label for="nombre">Nombre de Convenio:</label>
                                        <input type="text" class="form-control" id="nombre"
                                            value="{{ $convenio->nombre_convenio }}" name="nombre"
                                            placeholder="Introduzca el nombre del convenio">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="objetivo">Objetivo del Convenio:</label>
                                        <textarea name="objetivo" class="form-control" placeholder="Introduzca el objetivo del convenio" id="objetivo"
                                            rows="5">{{ $convenio->objetivo_convenio }}</textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="firma">Fecha de Firma:</label>
                                        <input value="{{ $convenio->fecha_firma }}" name="fecha_firma" id="firma"
                                            class="form-control" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="final">Fecha de Finalización:</label>
                                        <input value="{{ $convenio->fecha_finalizacion }}" name="fecha_finalizacion"
                                            id="final" class="form-control" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="direccion">Dirección de Convenio:</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                            value="{{ $convenio->direccion }}"
                                            placeholder="Introduzca la dirección del convenio">
                                    </div>
                                    <div class="col-6">
                                        <label for="tiempo">Tiempo de Duración:</label>
                                        <input name="dias" min="0" type="number" class="form-control"
                                            id="dias" value="{{ $convenio->tiempo_duracion }}" placeholder="días">
                                    </div>
                                    <div class="col-6">
                                        <label for="entidad">Entidad:</label>
                                        <input name="entidad" type="text" class="form-control" id="entidad"
                                            value="{{ $convenio->entidad }}"
                                            placeholder="Introduzca la entidad del convenio">
                                    </div>
                                    <div class="col-6">
                                        <label for="telefono">Teléfono / Celular:</label>
                                        <input name="telefono" type="number" class="form-control" id="telefono"
                                            value="{{ $convenio->telefono }}" min="0"
                                            placeholder="Introduzca su número de teléfono o celular">
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $convenio->email }}" placeholder="ejemplo@entidad.com">
                                    </div>
                                    <div class="col-6">
                                        <label for="tipo">Tipo de Convenio:</label>
                                        <select id="tipo" class="form-select" name="tipo"
                                            aria-label="Default select example">
                                            <option>Seleccione el tipo de convenio...</option>
                                            <option {{ $convenio->id_tipo_convenio == '1' ? 'selected' : '' }}
                                                value="1">
                                                NACIONALES</option>
                                            <option value="2"
                                                {{ $convenio->id_tipo_convenio == '2' ? 'selected' : '' }}>
                                                INTERNACIONALES</option>
                                        </select>
                                    </div>
                                    <div onclick="enviar(econvenio)" class="btn btn-custom w-25">Editar Convenio</div>

                                </div>
                            </form>

                            <form action="/dashboard/bconvenio" class="mt-4" method="POST" id="form-bconvenio">
                                <input type="text" hidden name="id_convenios" value="{{ $id_convenios }}">
                                @csrf
                                <div onclick="enviar(bconvenio,'¿Desea eliminar el convenio?')"
                                    class="btn btn-custom2 w-25">Terminar Convenio</div>
                            </form>
                        @else
                            <h2>
                                Insertar Nuevo Convenio
                            </h2>
                            <form enctype="multipart/form-data" id="form-convenio" method="POST" action="/aconvenio">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <img class="img2" id="imagen2" src="" alt="No seleccionado"
                                            srcset="">
                                        <label for="imagen">Imagen:</label>
                                        <input name="imagen" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="imagen">
                                    </div>
                                    <div class="col-6">
                                        <p id="doc2">
                                            <i class="fa " aria-hidden="true"></i>
                                        </p>
                                        <label for="doc">Pdf/Word:</label>
                                        <input name="file" type="file" accept=".docx, .pdf" class="form-control"
                                            id="doc">
                                    </div>
                                    <hr>
                                    <div class="form-group col-12">
                                        <label for="nombre">Nombre de Convenio:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Introduzca el nombre del convenio">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="objetivo">Objetivo del Convenio:</label>
                                        <textarea name="objetivo" class="form-control" placeholder="Introduzca el objetivo del convenio" id="objetivo"
                                            rows="5"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="firma">Fecha de Firma:</label>
                                        <input name="fecha_firma" id="firma" class="form-control" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="final">Fecha de Finalización:</label>
                                        <input value="{{ $convenio->fecha_finalizacion }}" name="fecha_finalizacion"
                                            id="final" class="form-control" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="direccion">Dirección de Convenio:</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                            placeholder="Introduzca la dirección del convenio">
                                    </div>
                                    <div class="col-6">
                                        <label for="tiempo">Tiempo de Duración:</label>
                                        <input name="dias" type="number" class="form-control" id="dias"
                                            placeholder="días">
                                    </div>
                                    <div class="col-6">
                                        <label for="entidad">Entidad:</label>
                                        <input name="entidad" type="text" class="form-control" id="entidad"
                                            placeholder="Introduzca la entidad del convenio">
                                    </div>
                                    <div class="col-6">
                                        <label for="telefono">Teléfono / Celular:</label>
                                        <input name="telefono" type="number" class="form-control" id="telefono"
                                            placeholder="Introduzca su número de teléfono o celular">
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="ejemplo@entidad.com">
                                    </div>
                                    <div class="col-6">
                                        <label for="tipo">Tipo de Convenio:</label>
                                        <select id="tipo" class="form-select" name="tipo"
                                            aria-label="Default select example">
                                            <option>Seleccione el tipo de convenio...</option>
                                            <option value="1">
                                                NACIONALES</option>
                                            <option value="2">INTERNACIONALES</option>
                                        </select>
                                    </div>
                                    <div onclick="enviar(convenio)" class="btn btn-custom w-25">Agregar Convenio</div>

                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
