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
        return errorEnUsuario;
    } else {
        errorUsuario.classList.remove('error');
        errorUsuario.textContent = '';
        return fetch(`http://localhost:3000/api/checkuser?username=${usuario.value}`)
            .then((response) => response.json())
            .then(function (data) {
                if (data['exists']) {
                    errorUsuario.textContent = 'El usuario ya existe';
                    errorUsuario.classList.add('error');
                    errorEnUsuario = true;
                }
            })
            .then(() => errorEnUsuario)
    }
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
        errorEstatura.textContent = 'Altura errónea';
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
        errorPeso.textContent = 'Peso incorrecto';
    } else {
        errorPeso.classList.remove('error');
        errorPeso.textContent = '';
    }
});

let fecha = document.getElementById('fecha');
let errorFecha = document.getElementById('errorFecha');
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

let botonContinuar = document.getElementById('continuar');
if (botonContinuar != null) {
    botonContinuar.addEventListener('click', continuar);
    botonContinuar.addEventListener('enter', continuar);
}
function continuar(e) {
    e.preventDefault();
    // console.log(e);
    //lo ejecuto una vez cada uno para que salga el mensaje de error
    let errores = nombreError();
    errores = usuarioError() || errores;
    errores = correoError() || errores;
    errores = contraseñaError() || errores;
    errores = contraseñaRepetidaError() || errores;
    if (!errores) {
        document.getElementById('pag1').style = 'display:none;'
        document.getElementById('pag2').style = 'display:block;'
    }
}

let botonRegistro = document.getElementById('registro');
if (botonRegistro != null) {
    botonRegistro.addEventListener('click', registrar);
}
let errorFormulario = document.getElementById('errorFormulario');
function registrar(e) {
    errorFormulario.classList.remove('errorGrande');
    errorFormulario.textContent = '';
    e.preventDefault();
    //crear objeto para pasar 
    let actividades = '';
    actividades += document.getElementById('senderismo').checked ? 'senderismo' : '';
    actividades += document.getElementById('montañismo').checked ? 'montañismo' : '';
    actividades += document.getElementById('ciclismo').checked ? 'ciclismo' : '';
    actividades += document.getElementById('correr').checked ? 'correr' : '';

    let elementos = {
        "fullname": nombre.value,
        "username": usuario.value,
        "email": correo.value,
        "pass": contraseña.value,
        "height": estatura.value,
        "weight": peso.value,
        "birthday": fecha.value,
        "activities": actividades,
    };

    // 'senderismo': document.getElementById('senderismo').checked,
    // 'montañismo': document.getElementById('montañismo').checked,
    // 'ciclismo': document.getElementById('ciclismo').checked,
    // 'correr': document.getElementById('correr').checked,


    fetch('http://localhost:3000/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(elementos)
    }).then((response) => response.json())
        .then(function (data) {
            console.log(data.success);
            if (data['success']) {
                sessionStorage.setItem("usuario", usuario.value);
                sessionStorage.setItem("id", data['id']);
                window.location = "index.php";
            } else {
                errorFormulario.textContent = data['msg'];
                errorFormulario.classList.add('errorGrande');
            }
        })
}

let formularioRegistro = document.getElementById('formularioRegistro');
if (formularioRegistro != null) {
    formularioRegistro.addEventListener('keypress', (e) => {
        if (e.key == 'Enter') {
            e.preventDefault();
        }
    });
}


let botonGuardar = document.getElementById('registro');
if (botonGuardar != null) {
    botonGuardar.addEventListener('click', registrar);
}
function registrar(e) {
    errorFormulario.classList.remove('errorGrande');
    errorFormulario.textContent = '';
    e.preventDefault();
    //crear objeto para pasar 
    let actividades = '';
    actividades += document.getElementById('senderismo').checked ? 'senderismo' : '';
    actividades += document.getElementById('montañismo').checked ? 'montañismo' : '';
    actividades += document.getElementById('ciclismo').checked ? 'ciclismo' : '';
    actividades += document.getElementById('correr').checked ? 'correr' : '';

    let elementos = {
        "fullname": nombre.value,
        "username": usuario.value,
        "email": correo.value,
        "pass": contraseña.value,
        "height": estatura.value,
        "weight": peso.value,
        "birthday": fecha.value,
        "activities": actividades,
    };

    // 'senderismo': document.getElementById('senderismo').checked,
    // 'montañismo': document.getElementById('montañismo').checked,
    // 'ciclismo': document.getElementById('ciclismo').checked,
    // 'correr': document.getElementById('correr').checked,


    fetch('http://localhost:3000/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(elementos)
    }).then((response) => response.json())
        .then(function (data) {
            console.log(data.success);
            if (data['success']) {
                sessionStorage.setItem("usuario", usuario.value);
                sessionStorage.setItem("id", data['id']);
                window.location = "index.php";
            } else {
                errorFormulario.textContent = data['msg'];
                errorFormulario.classList.add('errorGrande');
            }
        })
}