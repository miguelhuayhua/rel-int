
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

let epersona = () => {
    document.getElementById('form-epersona').submit();
}
let ausuario = () => {
    document.getElementById('form-ausuario').submit();
}

let econvenio = () => {
    document.getElementById('form-econvenio').submit();
}

let ecarrera = () => {
    document.getElementById('form-ecarrera').submit();
}
let acarrera = () => {
    document.getElementById('form-acarrera').submit();
}
let bcarrera = () => {
    document.getElementById('form-bcarrera').submit();
}
let bconvenio = () => {
    document.getElementById('form-bconvenio').submit();
}
let busuario = () => {
    document.getElementById('form-busuario').submit();
}
let eusuario = () => {
    document.getElementById('form-eusuario').submit();
}
let bpublicacion = () => {
    document.getElementById('form-bpublicacion').submit();
}
let epublicacion = () => {
    document.getElementById('form-epublicacion').submit();
}



//Función para mostrar el modal
let si = document.getElementById('si') || document.createElement('button');
let no = document.getElementById('no') || document.createElement('button');
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


