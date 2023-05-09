let img = document.getElementById('imagen');
let doc = document.getElementById('doc');

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
