console.log(this.document.URL, this.document)
let url = this.document.URL;
if (url == 'http://127.0.0.1:8000/') {
    document.getElementById('home').classList.add('show');
}
else if (url.includes('contacto')) {
    document.getElementById('contacto').classList.add('show');
}
else if (url.includes('publicaciones')) {
    document.getElementById('publicaciones').classList.add('show');
}

//evento click al boton del navbar modo responsive
let toggle = document.getElementById('toggle');
toggle.addEventListener('click', (ev) => {
    console.log('click')
    //el elemento que aparece como navbar responsive
    document.getElementById('navbarResponsive').classList.toggle('toggleResponsiveNavbar');
})