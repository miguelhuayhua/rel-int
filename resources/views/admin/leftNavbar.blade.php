<div id="leftNav" class="col-md-3 col-xl-2 buttons">
    <img style="width: 100%; max-width: 90px;display: block; margin: 10px auto" src="{{ url('/images/logorrnnii.png') }}"
        alt="" srcset="">
    <hr>
    <button id="tipo1" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
        data-target="#tipos1" aria-expanded="false" aria-controls="collapseExample">
        <div class="icon-flex">
            <i class="fa fa-handshake-o icon" aria-hidden="true"></i>
            Convenios
        </div>
        <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
    </button>
    <div class="collapse" id="tipos1">
        <div class="ri-info">
            <a href="/dashboard/aconvenio" class="btn dash-btn">
                <i class="fa fa-plus icon" aria-hidden="true"></i>
                Agregar Convenio
            </a>
            <a href="/dashboard/asconvenio" class="btn dash-btn">
                <i class="fa fa-plus icon" aria-hidden="true"></i>
                Asignar Convenio
            </a>
            <a href="/dashboard/convenios" class="btn dash-btn">
                <i class="fa fa-eye icon" aria-hidden="true"></i>
                Ver Convenios
            </a>
            {{-- 
                    <a href="/dashboard/gconvenio" class="btn dash-btn">
                <i class="fa fa-bar-chart icon" aria-hidden="true"></i>
                Estadísticas
                </a>
                    --}}

        </div>
    </div>
    @if ($usuario->cargo == 'DIRECTOR' || $usuario->cargo == 'ADMINISTRADOR')
        <button id="tipo2" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
            data-target="#tipos2" aria-expanded="false" aria-controls="collapseExample">
            <div class="icon-flex">
                <i class="fa fa-user-o icon" aria-hidden="true"></i>
                Usuarios
            </div>
            <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
        </button>
        <div class="collapse" id="tipos2">
            <div class="ri-info">
                <a href="/dashboard/ausuario" class="btn dash-btn">
                    <i class="fa fa-plus icon" aria-hidden="true"></i>
                    Agregar Usuarios
                </a>

                <a href="/dashboard/usuarios" class="btn dash-btn">
                    <i class="fa fa-eye icon" aria-hidden="true"></i>
                    Ver Usuarios
                </a>
                <a href="/dashboard/apersona" class="btn dash-btn">
                    <i class="fa fa-plus icon" aria-hidden="true"></i>

                    Agregar Persona
                </a>
                <a href="/dashboard/personas" class="btn dash-btn">
                    <i class="fa fa-eye icon" aria-hidden="true"></i>

                    Ver Personas
                </a>

                {{-- <a href="/dashboard/gusuario" class="btn dash-btn">
                    <i class="fa fa-bar-chart icon" aria-hidden="true"></i>
                    Estadísticas
                    </a> --}}


            </div>
        </div>
    @endif
    <button id="tipo3" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
        data-target="#tipos3" aria-expanded="false" aria-controls="collapseExample">
        <div class="icon-flex">
            <i class="fa fa-clipboard icon" aria-hidden="true"></i>
            Publicaciones
        </div>
        <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
    </button>
    <div class="collapse" id="tipos3">
        <div class="ri-info">
            <a href="/dashboard/apublicacion" class="btn dash-btn">
                <i class="fa fa-plus icon" aria-hidden="true"></i>
                Agregar Publicación
            </a>
            <a href="/dashboard/publicaciones" class="btn dash-btn">
                <i class="fa fa-eye icon" aria-hidden="true"></i>
                Ver Publicaciones
            </a>

            {{-- <a href="/dashboard/gpublicacion" class="btn dash-btn">
                <i class="fa fa-bar-chart icon" aria-hidden="true"></i>
                Estadísticas
                </a> --}}
        </div>
    </div>
    <button id="tipo4" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
        data-target="#tipos4" aria-expanded="false" aria-controls="collapseExample">
        <div class="icon-flex">
            <i class="fa fa-building-o icon" aria-hidden="true"></i>
            Carreras
        </div>
        <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
    </button>
    <div class="collapse" id="tipos4">
        <div class="ri-info">
            <a href="/dashboard/acarrera" class="btn dash-btn">
                <i class="fa fa-plus icon" aria-hidden="true"></i>
                Agregar Carrera
            </a>
            <a href="/dashboard/carreras" class="btn dash-btn">
                <i class="fa fa-eye icon" aria-hidden="true"></i>

                Ver Carreras
            </a>

            {{-- <a href="/dashboard/gcarrera" class="btn dash-btn">
                <i class="fa fa-bar-chart icon" aria-hidden="true"></i>
                Estadísticas
            </a> --}}
        </div>
    </div>
    <button id="tipo5" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
        data-target="#tipos5" aria-expanded="false" aria-controls="collapseExample">
        <div class="icon-flex">
            <i class="fa fa-picture-o icon" aria-hidden="true"></i>
            Galeria
        </div>
        <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
    </button>
    <div class="collapse" id="tipos5">
        <div class="ri-info">
            <a href="/dashboard/agaleria" class="btn dash-btn">
                <i class="fa fa-plus icon" aria-hidden="true"></i>
                Agregar Fotografía
            </a>
            <a href="/dashboard/galeria" class="btn dash-btn">
                <i class="fa fa-eye icon" aria-hidden="true"></i>

                Ver Fotografías
            </a>

            {{-- <a href="/dashboard/gcarrera" class="btn dash-btn">
                <i class="fa fa-bar-chart icon" aria-hidden="true"></i>
                Estadísticas
            </a> --}}
        </div>
    </div>
    <button id="tipo6" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
        data-target="#tipos6" aria-expanded="false" aria-controls="collapseExample">
        <div class="icon-flex">
            <i class="fa fa-link icon" aria-hidden="true"></i> Enlaces
        </div>
        <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i>
    </button>
    <div class="collapse" id="tipos6">
        <div class="ri-info">
            <a href="/dashboard/aenlace" class="btn dash-btn">
                <i class="fa fa-plus icon" aria-hidden="true"></i>
                Agregar Enlace
            </a>
            <a href="/dashboard/enlaces" class="btn dash-btn">
                <i class="fa fa-eye icon" aria-hidden="true"></i>

                Ver Enlaces
            </a>

            {{-- <a href="/dashboard/gcarrera" class="btn dash-btn">
                <i class="fa fa-bar-chart icon" aria-hidden="true"></i>
                Estadísticas
            </a> --}}
        </div>
    </div>
    @if ($usuario->cargo == 'ADMINISTRADOR')
        <a href="/dashboard/auditoria" class="btn collapse-button dash-parent-button" type="button">
            <div class="icon-flex">
                <i class="fa fa-user-secret icon" aria-hidden="true"></i>
                Auditoría
            </div>
        </a>
    @endif
</div>
