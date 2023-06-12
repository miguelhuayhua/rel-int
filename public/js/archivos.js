let img = document.getElementById('imagen') || document.createElement('img');
let doc = document.getElementById('doc') || document.createElement('span');

img.addEventListener('change', (e) => {
    let imagen = e.target.files[0]
    let fr = new FileReader();
    fr.onload = function () {
        document.getElementById('imagen2').src = fr.result;
    }
    fr.readAsDataURL(imagen);
})

doc.addEventListener('change', (e) => {
    let doc2 = document.getElementById('doc2');
    doc2.classList.add('show-doc2');
    doc2.children[0].classList.remove('fa-file-pdf-o');
    doc2.children[0].classList.remove('fa-file-word-o');
    doc2.removeChild(doc2.lastChild);
    if (e.target.files[0].name.includes('.pdf')) {
        doc2.children[0].classList.add('fa-file-pdf-o')
    } else {
        doc2.children[0].classList.add('fa-file-word-o');
    }
    doc2.append(e.target.files[0].name);
})

//agregar publicación listado de archivos
let docs = document.getElementById('docs') || document.createElement('p');

docs.addEventListener('change', (ev) => {
    let files = document.getElementById('files');
    files.removeChild(files.lastChild);
    let archivo = ev.target.files[0];
    let p = document.createElement('p');
    p.classList.add('file')
    let i = document.createElement('i');
    i.classList.add('fa');
    i.classList.add('fa-file');
    p.textContent = archivo.name;
    p.appendChild(i);
    files.appendChild(p);

})