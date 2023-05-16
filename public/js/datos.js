
//valores a cambiar 
let ejecutar = () => { };
let mensaje = '¿Desea realizar los cambios?';

//funciones de envio de datos de los formularios
let convenio = () => {
    document.getElementById('form-convenio').submit();
}

let publicacion = () => {
    document.getElementById('form-publicacion').submit();
}

let asconvenio = () => {
    document.getElementById('form-asconvenio').submit();
}

let apersona = () => {
    document.getElementById('form-persona').submit();
}
let ausuario = () => {
    document.getElementById('form-ausuario').submit();
}

let econvenio = () => {
    document.getElementById('form-econvenio').submit();
}

let bconvenio = () => {
    document.getElementById('form-bconvenio').submit();
}
//Función para mostrar el modal
let si = document.getElementById('si');
let no = document.getElementById('no');
let modal = document.getElementById('modal');

//función encargado del envío
let enviar = (call, texto = '¿Desea realizar los cambios?') => {
    modal.classList.add('showmodal');
    ejecutar = call;
    mensaje = texto;
    let elementoMensaje = document.getElementById('mensaje');
    elementoMensaje.innerText = mensaje;

}

si.addEventListener('click', () => {
    modal.classList.remove('showmodal');
    ejecutar();
});
no.addEventListener('click', () => {
    modal.classList.remove('showmodal');
});


