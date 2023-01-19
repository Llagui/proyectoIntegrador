let nombre = document.getElementById('nombre');
let errorNombre = document.getElementById('errorNombre');
nombre.addEventListener("change", () => {
    if (nombre.value != '') {
        errorNombre.classList.remove('error');
        errorNombre.textContent = '';
    }
});

let usuario = document.getElementById('usuario');
let errorUsuario = document.getElementById('errorUsuario');
usuario.addEventListener("change", () => {
    if (usuario.value != '') {
        errorUsuario.classList.remove('error');
        errorUsuario.textContent = '';
    }
});

let correo = document.getElementById('correo');
let errorCorreo = document.getElementById('errorCorreo');
correo.addEventListener("change", () => {
    if (correo.value.toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
    errorCorreo.classList.remove('error');
    errorCorreo.textContent = "";
} else {
    errorCorreo.classList.add('error');
    errorCorreo.textContent = "Error en el email";
}
});

let contraseña = document.getElementById('contraseña');
let errorContraseña = document.getElementById('seguridadContraseña');
contraseña.addEventListener("change", () => {
    if (contraseña.value == '') {
        errorContraseña.classList.remove('error');
        errorContraseña.textContent = '';
    }
});

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

document.getElementById('continuar').addEventListener('click', continuar)
function continuar(e) {
    e.preventDefault();
    let camposRellenados = true;
    if (document.getElementById('nombre').value == '') {
        errorNombre.classList.add('error');
        errorNombre.textContent = 'El nombre es obligatorio';
        camposRellenados = false;
    }
    if (document.getElementById('usuario').value == '') {
        errorUsuario.classList.add('error');
        errorUsuario.textContent = 'El usuario es obligatorio';
        camposRellenados = false;
    }
    if (document.getElementById('correo').value == '') {
        errorCorreo.classList.add('error');
        errorCorreo.textContent = 'El correo es obligatorio';
        camposRellenados = false;
    }

    if (document.getElementById('contraseña').value == '') {
        errorContraseña.classList.add('error');
        errorContraseña.textContent = 'La contraseña es obligatoria';
        camposRellenados = false;
    }
    if (document.getElementById("repitaContraseña").value == '') {
        document.getElementById('coincidenciaContraseñas').classList.add('error');
        document.getElementById('coincidenciaContraseñas').textContent = 'Vuelve a poner la contraseña';
        camposRellenados = false;
    }

    if (camposRellenados) {
        document.getElementById('pag1').style = 'display:none;'
        document.getElementById('pag2').style = 'display:block;'
    }
}