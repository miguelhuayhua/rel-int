@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        <button id="toggleLeft" class="btn btn-toggle">
            <i class="fa fa-bars" aria-hidden="true">
            </i>
        </button>
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-xl-10" style="background-color: #f5f5f9;">
                <div class="row">
                    <div class="col-12">
                        <form>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nombre">Nombre de Convenio:</label>
                                    <input type="text" class="form-control" id="nombre"
                                        placeholder="Introduzca el nombre del convenio">
                                </div>
                                <div class="form-group col-12">
                                    <label for="objetivo">Nombre de Convenio:</label>
                                    <textarea class="form-control" placeholder="Introduzca el objetivo del convenio" name="objetivo" id="objetivo"
                                         rows="5"></textarea>
                                </div>
                                <div class="col-6">
                                    <label for="firma">Fecha de Firma:</label>
                                    <input id="firma" class="form-control" type="date">
                                </div>
                                <div class="col-6">
                                    <label for="nombre">Dirección de Convenio:</label>
                                    <input type="text" class="form-control" id="nombre"
                                        placeholder="Introduzca la dirección del convenio">
                                </div>
                                <div class="col-6">
                                    <label for="tiempo">Tiempo de Duración:</label>
                                    <input type="number" class="form-control" id="dias" placeholder="días">
                                </div>
                                <div class="col-6">
                                    <label for="entidad">Entidad:</label>
                                    <input type="text" class="form-control" id="entidad"
                                        placeholder="Introduzca la entidad del convenio">
                                </div>
                                <div class="col-6">
                                    <label for="telefono">Teléfono / Celular:</label>
                                    <input type="number" class="form-control" id="telefono"
                                        placeholder="Introduzca su número de teléfono o celular">
                                </div>
                                <div class="col-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="ejemplo@entidad.com">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-custom">Agregar Convenio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
