
function mostrarConvenios(tipo, id) {
    axios.get("http://127.0.0.1:8000/convenios/" + tipo + "/" + id).then(function (response) {
        return response.data
        // do whatever you want if console is [object object] then stringify the response
    }).then(data => {
        let modal = document.getElementById("modal");
        modal.classList.add('show-modal');
        let listaConvenios = document.getElementById("lista-convenios");
        let detalles = [];
        detalles = data.detalles;
        listaConvenios.innerHTML = '';
        detalles.forEach(convenio => {
            let item = document.createElement('div');
            let publicacion = document.createElement('p');
            let publicacionSpan = document.createElement('span');
            let nombre = document.createElement('h3');
            let objetivo = document.createElement('p');
            let entidad = document.createElement('p');
            let entidadSpan = document.createElement('span');
            let objetivoSpan = document.createElement('span');
            let pdf = document.createElement('a');
            let icono = document.createElement('i');
            item.classList.add('custom-item');
            publicacion.classList.add('publicacion');
            nombre.innerText = convenio.nombre_convenio;
            objetivoSpan.innerText = "OBJETIVO: ";
            objetivo.append(objetivoSpan);
            objetivo.append(convenio.objetivo_convenio);
            entidadSpan.innerText = 'ENTIDAD: ';
            entidad.append(entidadSpan);
            entidad.append(convenio.entidad);
            publicacionSpan.innerText = convenio.fecha_publicacion;
            publicacion.appendChild(publicacionSpan);
            pdf.href = '/' + convenio.pdf_convenio;
            pdf.classList.add('pdf');
            pdf.download = convenio.pdf;
            pdf.target = 'blank';
            icono.classList.add('fa');
            icono.classList.add('fa-file-pdf-o');
            pdf.appendChild(icono);
            item.appendChild(publicacion);
            item.appendChild(nombre);
            item.appendChild(objetivo);
            item.appendChild(entidad);
            item.appendChild(pdf);
            listaConvenios.appendChild(item);
        });
    })
}

let modal = document.getElementById('modal');
modal.addEventListener('click', (ev) => {
    modal.classList.remove('show-modal');
})