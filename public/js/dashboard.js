let tipo1 = document.getElementById('tipo1');
let tipo2 = document.getElementById('tipo2');
//parte para girar los iconos de los botones del panel izquierdo
let girarIcono = (icono) => {
    icono.classList.toggle('rotateicon');
}
tipo1.addEventListener('click', (ev) => {
    girarIcono(tipo1.children[0])
})
tipo2.addEventListener('click', (ev) => {
    girarIcono(tipo2.children[0])
})
