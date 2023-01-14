let botonD = document.getElementById("moverDerecha");
let botonI = document.getElementById("moverIzquierda");
let contenedor = document.getElementById("contenedorImagenes");

console.log(contenedor);
botonD.addEventListener("click", () => {
    let images = document.querySelectorAll(".actividad");
    contenedor.prepend(images[3]);
});

botonI.addEventListener("click", () => {
    let images = document.querySelectorAll(".actividad");
    contenedor.append(images[0]);
});