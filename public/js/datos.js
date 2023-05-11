
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

let ausuario = () => {
    document.getElementById('form-ausuario').submit();
}
//Función para mostrar el modal
let si = document.getElementById('si');
let no = document.getElementById('no');
let modal = document.getElementById('modal');
let ejecutar = () => { };
let enviar = (call) => {
    modal.classList.add('showmodal');
    ejecutar = call;
}

si.addEventListener('click', () => {
    modal.classList.remove('showmodal');
    ejecutar();
});
no.addEventListener('click', () => {
    modal.classList.remove('showmodal');
});


