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
                        @if ($persona->id_persona)
                            <h2>
                                Edite los datos de la Persona
                            </h2>
                            <form enctype="multipart/form-data" id="form-epersona" method="POST"
                                action="/dashboard/epersona">
                                @csrf
                                <input type="text" hidden name="id_persona" value="{{ $persona->id_persona }}">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="img2" id="imagen2" src="{{ url($persona->img) }}"
                                            alt="No seleccionado" srcset="">
                                        <label for="imagen">Fotografía:</label>
                                        <input name="imagen" type="file" accept=".png, .jpg, .jpeg" class="form-control"
                                            id="imagen">
                                    </div>
                                    <hr>
                                    <div class="form-group col-12">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" id="nombre"
                                            value="{{ $persona->nombre }}" name="nombre"
                                            placeholder="Introduzca el nombre de la persona">
                                    </div>
                                    <div class="col-6">
                                        <label for="paterno">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="paterno" name="paterno"
                                            value="{{ $persona->paterno }}" placeholder="Introduzca su apellido paterno">
                                    </div>
                                    <div class="col-6">
                                        <label for="materno">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="materno" name="materno"
                                            value="{{ $persona->materno }}" placeholder="Introduzca su apellido materno">
                                    </div>
                                    <div class="col-6">
                                        <label for="ci">Carnet de Identidad / C.I.:</label>
                                        <input name="ci"type="number" class="form-control" id="ci"
                                            value="{{ $persona->ci }}" placeholder="Introduzca su carnet de identidad">
                                    </div>

                                    <div class="col-6">
                                        <label for="telefono">Telefono / Celular:</label>
                                        <input name="telefono"type="number" class="form-control" id="telefono"
                                            value="{{ $persona->telefono }}" placeholder="Introduzca su teléfono o celular">
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $persona->email }}" placeholder="ejemplo@entidad.com">
                                    </div>
                                    <div class="col-6">
                                        <label for="tipo">Cargo:</label>
                                        <select id="tipo" class="form-select" name="tipo"
                                            aria-label="Default select example">
                                            <option selected>Seleccione el tipo de cargo</option>
                                            <option value="DIRECTOR" {{ $persona->cargo == 'DIRECTOR' ? 'selected' : '' }}>
                                                DIRECTOR</option>
                                            <option value="TECNICO" {{ $persona->cargo == 'TECNICO' ? 'selected' : '' }}>
                                                TÉCNICO</option>
                                            <option value="SECRETARIO"
                                                {{ $persona->cargo == 'SECRETARIO' ? 'selected' : '' }}>SECRETARIO</option>
                                        </select>
                                    </div>
                                </div>
                                <div onclick="enviar(epersona)" class="btn btn-custom w-25">Editar Persona</div>
                            </form>
                        @else
                            <h2>
                                Inserte los datos de la Persona
                            </h2>
                            <form enctype="multipart/form-data" id="form-persona" method="POST"
                                action="/dashboard/apersona">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <img class="img2" id="imagen2" src="" alt="No seleccionado"
                                            srcset="">
                                        <label for="imagen">Fotografía:</label>
                                        <input name="imagen" type="file" accept=".png, .jpg, .jpeg"
                                            class="form-control" id="imagen">
                                    </div>
                                    <hr>
                                    <div class="form-group col-12">
                                        <label for="nombre">Nombres:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Introduzca el nombre de la persona">
                                    </div>
                                    <div class="col-6">
                                        <label for="paterno">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="paterno" name="paterno"
                                            placeholder="Introduzca su apellido paterno">
                                    </div>
                                    <div class="col-6">
                                        <label for="materno">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="materno" name="materno"
                                            placeholder="Introduzca su apellido materno">
                                    </div>
                                    <div class="col-6">
                                        <label for="ci">Carnet de Identidad / C.I.:</label>
                                        <input name="ci"type="number" class="form-control" id="ci"
                                            placeholder="Introduzca su carnet de identidad">
                                    </div>

                                    <div class="col-6">
                                        <label for="telefono">Telefono / Celular:</label>
                                        <input name="telefono"type="number" class="form-control" id="telefono"
                                            placeholder="Introduzca su teléfono o celular">
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="ejemplo@entidad.com">
                                    </div>
                                    <div class="col-6">
                                        <label for="tipo">Cargo:</label>
                                        <select id="tipo" class="form-select" name="tipo"
                                            aria-label="Default select example">
                                            <option selected>Seleccione el tipo de cargo</option>
                                            <option value="DIRECTOR">DIRECTOR</option>
                                            <option value="TECNICO">TÉCNICO</option>
                                            <option value="SECRETARIO">SECRETARIO</option>
                                        </select>
                                    </div>
                                </div>
                                <div onclick="enviar(apersona)" class="btn btn-custom w-25">Agregar Persona</div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
