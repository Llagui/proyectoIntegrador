// MOvimiento de imagenes al pulsar flechas en pagina principal
let botonD = document.getElementById("moverDerecha");
let botonI = document.getElementById("moverIzquierda");
let contenedor = document.getElementById("contenedorImagenes");

botonD.addEventListener("click", () => {
    let images = document.querySelectorAll(".actividad");
    // a cada imagen le pongo clase animacion desaparecer
    images.forEach(image => {
        image.classList.add('scale-out-center');
    });

    // Acaba animacion y hago el cambio y pongo la animacion de entrada
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-out-center');
            image.classList.add('scale-in-center');
        });
        contenedor.prepend(images[3]);
    }, 400);

    // Quito la clase de la animacion, para que al haber otro cambio no salte la animacion
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-in-center');
        });
    }, 1000);
});

botonI.addEventListener("click", () => {
    let images = document.querySelectorAll(".actividad");
    // a cada imagen le pongo clase animacion desaparecer
    images.forEach(image => {
        image.classList.add('scale-out-center');
    });

    // Acaba animacion y hago el cambio y pongo la animacion de entrada
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-out-center');
            image.classList.add('scale-in-center');
        });
        contenedor.append(images[0]);
    }, 400);

    // Quito la clase de la animacion
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-in-center');
        });
    }, 1000);
});
