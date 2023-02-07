let botonD = document.getElementById("moverDerecha");
let botonI = document.getElementById("moverIzquierda");
let contenedor = document.getElementById("contenedorImagenes");

botonD.addEventListener("click", () => {
    
    let images = document.querySelectorAll(".actividad");
    images.forEach(image => {
        image.classList.add('scale-out-center');
    });
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-out-center');
            image.classList.add('scale-in-center');
        });
        contenedor.prepend(images[3]);
    }, 400);
    
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-in-center');
        });
    }, 1000);
});

botonI.addEventListener("click", () => {
    let images = document.querySelectorAll(".actividad");
    images.forEach(image => {
        image.classList.add('scale-out-center');
    });
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-out-center');
            image.classList.add('scale-in-center');
        });
        contenedor.append(images[0]);
    }, 400);
    
    setTimeout(() => {
        images.forEach(image => {
            image.classList.remove('scale-in-center');
        });
    }, 1000);
});

//scale-in-center scale-out-center