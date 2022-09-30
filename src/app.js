
/* llama al boton  */
const boton = document.querySelector('#boton');
const boton2 = document.querySelector('#boton2');

/* llama al menu */
const menu = document.querySelector('#menu');
const menu2 = document.querySelector('#menu2');

/* evento para menu */
boton.addEventListener('click', () => {
   
    /* agrega o quita el menu */
    menu.classList.toggle('hidden')

})

boton2.addEventListener('click', () => {
   
    /* agrega o quita el menu */
    menu2.classList.toggle('hidden')

})
