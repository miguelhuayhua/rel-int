<div class="user-cards  mx-auto  dashboard-profile position-relative">
    <a href="/dashboard">Dashboard</a>
    <div class="profile" onclick="showProfile()">
        <img src="{{ url($usuario->img) }}" alt="" srcset="" class="profile-img">
        <span>
            {{ $usuario->usuario }}
        </span>
    </div>
    <div class="profile-options" id="profileOptions" style="z-index: 1000">
        <ul>
            <li>
                <a href="/dashboard/perfil">
                    <i class="fa fa-edit icon" aria-hidden="true"></i>
                    Editar Perfil</a>
            </li>
            <li>
                <a href="/cerrarsesion">
                    <i class="fa fa-sign-out icon" aria-hidden="true"></i>
                    Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</div>
