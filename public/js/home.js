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
});

//animaciones para la parte de contadores de la página de home
let span1 = document.getElementById('span1');
let span2 = document.getElementById('span2');
let span3 = document.getElementById('span3');
let span4 = document.getElementById('span4');
let number1 = Number.parseInt(span1.innerText);
let number2 = Number.parseInt(span2.innerText);
let number3 = Number.parseInt(span3.innerText);
let number4 = Number.parseInt(span4.innerText);

let counter1 = 0;
let counter2 = 0;
let counter3 = 0;
let counter4 = 0;

let int1 = setInterval(() => {

    if (counter1 > number1) {
        counter1 = counter1 - (counter1 - number1);
        span1.innerText = counter1;

        clearInterval(int1);
    }
    counter1 += 100;

    span1.innerText = counter1;

}, 20);

let int2 = setInterval(() => {
    if (counter2 >= number2) {
        clearInterval(int2);
    }

    span2.innerText = counter2;
    counter2++;


}, 40);
let int3 = setInterval(() => {
    if (counter3 >= number3) {
        clearInterval(int3);
    }
    span3.innerText = counter3;
    counter3++;


}, 30);
let int4 = setInterval(() => {
    if (counter4 >= number4) {
        clearInterval(int4);
    }
    span4.innerText = counter4;
    counter4++;


}, 30);

