
function mostrarConvenios(tipo, id) {
    axios.get("http://pruebarriinn.upea.edu.bo/" + tipo + "/" + id).then(function (response) {
        return response.data
        // do whatever you want if console is [object object] then stringify the response
    }).then(data => {
        let modal = document.getElementById("modal");
        modal.classList.add('show-modal');
        let listaConvenios = document.getElementById("lista-convenios");
        let detalles = [];
        detalles = data.detalles;
        console.log(detalles)
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
            let imagen = document.createElement('img');
            item.classList.add('custom-item');
            publicacion.classList.add('publicacion');
            nombre.innerText = convenio.nombre_convenio;
            imagen.src = 'http://pruebarriinn.upea.edu.bo' + convenio.img_convenio;
            console.log(convenio)
            imagen.classList.add(['w-25']);
            imagen.style.display = 'block';
            imagen.style.marginLeft = 'auto';
            imagen.style.marginRight = 'auto';
            objetivoSpan.innerText = "OBJETIVO: ";
            objetivo.append(objetivoSpan);
            objetivo.append(convenio.objetivo_convenio);
            entidadSpan.innerText = 'ENTIDAD: ';
            entidad.append(entidadSpan);
            entidad.append(convenio.entidad);
            publicacionSpan.innerText = convenio.fecha_publicacion;
            publicacion.appendChild(publicacionSpan);
            pdf.href = 'http://pruebarriinn.upea.edu.bo' + convenio.pdf_convenio;
            pdf.classList.add('pdf');
            pdf.download = convenio.pdf;
            pdf.target = 'blank';
            icono.classList.add('fa');
            icono.classList.add('fa-file-pdf-o');
            pdf.appendChild(icono);
            item.appendChild(publicacion);
            item.appendChild(nombre);
            item.appendChild(imagen);
            item.appendChild(objetivo);
            item.appendChild(entidad);
            item.appendChild(pdf);
            listaConvenios.appendChild(item);
        });
    })
}


function hiddeModal(ev) {
    if (ev.target.id == 'modal') {
        let modal = ev.target;
        modal.classList.remove('show-modal');

    }
}