let nombre = document.getElementById('nombre');
let errorNombre = document.getElementById('errorNombre');
nombre.addEventListener("input", nombreError);
function nombreError() {
    let errorEnNombre = false;
    if (nombre.value == '') {
        errorNombre.classList.add('error');
        errorNombre.textContent = 'El nombre es obligatorio';
        errorEnNombre = true;
    } else {
        errorNombre.classList.remove('error');
        errorNombre.textContent = '';
    }
    return errorEnNombre;
}

let usuario = document.getElementById('usuario');
let errorUsuario = document.getElementById('errorUsuario');
usuario.addEventListener("input", usuarioError);
function usuarioError() {
    let errorEnUsuario = false;
    if (usuario.value == '') {
        errorUsuario.classList.add('error');
        errorUsuario.textContent = 'El usuario es obligatorio';
        errorEnUsuario = true;
    } else {
        // Saltar error si el usuario esta (nombre usuario ocupado)
        // let nombresUsuarios = ;
        // fetch('http://localhost/proyecto Integrador/roadrunner/usuarios/nombreUsuarios/')
        //     .then((response) => response.json())
        //     .then(function (json) {
        //         console.log(json);
        //     })
        //     .catch((error) => console.log(error));
        errorUsuario.classList.remove('error');
        errorUsuario.textContent = '';
    }
    return errorEnUsuario;
}


let correo = document.getElementById('correo');
let errorCorreo = document.getElementById('errorCorreo');
correo.addEventListener("input", correoError);
function correoError() {
    let errorEnCorreo = false;
    if (correo.value == '') {
        errorCorreo.classList.add('error');
        errorCorreo.textContent = 'El correo es obligatorio';
        errorEnCorreo = true;
    } else if (correo.value.toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
        errorCorreo.classList.remove('error');
        errorCorreo.textContent = "";
    } else {
        errorCorreo.classList.add('error');
        errorCorreo.textContent = "Email incorrecto";
    }
    return errorEnCorreo;
}


let contraseña = document.getElementById('contraseña');
let errorContraseña = document.getElementById('errorContraseña');
contraseña.addEventListener("input", contraseñaError);
function contraseñaError() {
    let errorEnContraseña = false;
    if (contraseña.value == '') {
        errorContraseña.classList.add('error');
        errorContraseña.textContent = 'La contraseña es obligatoria';
        errorEnContraseña = true;
    } else {
        errorContraseña.classList.remove('error');
        errorContraseña.textContent = '';
    }
    return errorEnContraseña;
}

let coincidenciaContraseñas = document.getElementById('coincidenciaContraseñas');
let contraseñaRepe = document.getElementById("repitaContraseña");
contraseñaRepe.addEventListener("input", contraseñaRepetidaError);
function contraseñaRepetidaError() {
    let errorEnContraRepe = false;
    if (contraseñaRepe.value == '') {
        coincidenciaContraseñas.classList.add('error');
        coincidenciaContraseñas.textContent = 'Vuelve a poner la contraseña';
        errorEnContraRepe = true;
    } else {
        if (contraseñaRepe.value != contraseña.value) {
            coincidenciaContraseñas.textContent = 'Las contraseñas no coinciden';
            coincidenciaContraseñas.classList.add('error');
            errorEnContraRepe = true;
        } else {
            coincidenciaContraseñas.textContent = '';
            coincidenciaContraseñas.classList.remove('error');
        }
    }
    return errorEnContraRepe;
}


// PAGINA 2
let estatura = document.getElementById('estatura');
let errorEstatura = document.getElementById('errorEstatura');
estatura.addEventListener("change", () => {
    if (estatura.value < 100 || estatura.value > 230) {
        errorEstatura.classList.add('error');
        errorEstatura.textContent = 'Estatura incorrecta';
    } else {
        errorEstatura.classList.remove('error');
        errorEstatura.textContent = '';
    }
});

let peso = document.getElementById('peso');
let errorPeso = document.getElementById('errorPeso');
peso.addEventListener("change", () => {
    if (peso.value < 50 || peso.value > 180) {
        errorPeso.classList.add('error');
        errorPeso.textContent = 'Peso incorrecta';
    } else {
        errorPeso.classList.remove('error');
        errorPeso.textContent = '';
    }
});

let fecha = document.getElementById('fecha');
let errorFecha = document.getElementById('errorPeso');
fecha.addEventListener("change", () => {
    let fechaNacimiento = new Date(fecha.value);
    if (fechaNacimiento < Date('01/01/1900') || fechaNacimiento > Date.now()) {
        errorFecha.classList.add('error');
        errorFecha.textContent = 'Fecha incorrecta';
    } else {
        errorFecha.classList.remove('error');
        errorFecha.textContent = '';
    }
});
