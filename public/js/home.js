// se hará uso de un activador para agrandar la imagen, dado el hover de elemento siguiente
let imgBanner = document.getElementById('imgBanner');
//cuando el mouse entra
imgBanner.addEventListener('mouseover', (ev) => {
    //obtener la imagen
    console.log('entra')
    document.getElementById('imgHome').classList.add('imgHomeEnter');
});

//cuando el mouse sale

imgBanner.addEventListener('mouseleave', (ev) => {
    //obtener la imagen
    document.getElementById('imgHome').classList.remove('imgHomeEnter');
})
