let tipo1 = document.getElementById('tipo1');
let tipo2 = document.getElementById('tipo2');
let tipo3 = document.getElementById('tipo3');
let tipo4 = document.getElementById('tipo4');
//parte para girar los iconos de los botones del panel izquierdo
let girarIcono = (icono) => {
    icono.classList.toggle('rotateicon');
}
tipo1.addEventListener('click', (ev) => {
    girarIcono(tipo1.children[1])
})
tipo2.addEventListener('click', (ev) => {
    girarIcono(tipo2.children[1])
})
tipo3.addEventListener('click', (ev) => {
    girarIcono(tipo3.children[1])
})

tipo4.addEventListener('click', (ev) => {
    girarIcono(tipo4.children[1])
})


let toggle = document.getElementById('toggleLeft');
toggle.addEventListener('click', (ev) => {
    document.getElementById('leftNav').classList.toggle('showLeftNav');
})