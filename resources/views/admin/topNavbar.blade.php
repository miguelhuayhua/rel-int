<div class="user-cards  mx-auto my-3 dashboard-profile position-relative">
    <a href="/dashboard">Dashboard</a>
    <div class="profile" onclick="showProfile()">
        <i class="fa fa-user-circle-o icon" aria-hidden="true"></i>
        <span>
            {{ $usuario->usuario }}
        </span>
    </div>
    <div class="profile-options" id="profileOptions">
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
