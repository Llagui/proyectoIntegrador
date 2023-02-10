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
        fetch(`../api/checkuser/?username=${usuario.value}`)
            .then((response) => response.json())
            .then(function (data) {
                if (data['exists']) {
                    errorUsuario.textContent = 'El usuario ya existe';
                    errorUsuario.classList.add('error');
                    errorEnUsuario = true;
                }
                return errorEnUsuario
            })
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
estatura.addEventListener("change", estaturaError);
function estaturaError() {
    let errorEnEstatura = false;
    if (estatura.value < 100 || estatura.value > 230) {
        errorEstatura.classList.add('error');
        errorEstatura.textContent = 'Altura errónea';
        errorEnEstatura = true;
    } else {
        errorEstatura.classList.remove('error');
        errorEstatura.textContent = '';
    }
    return errorEnEstatura;
}


let peso = document.getElementById('peso');
let errorPeso = document.getElementById('errorPeso');
peso.addEventListener("change", pesoError);
function pesoError() {
    let errorEnPeso = false;
    if (peso.value < 50 || peso.value > 180) {
        errorPeso.classList.add('error');
        errorPeso.textContent = 'Peso incorrecto';
        errorEnPeso = true;
    } else {
        errorPeso.classList.remove('error');
        errorPeso.textContent = '';
    }
    return errorEnPeso;
}

let fecha = document.getElementById('fecha');
let errorFecha = document.getElementById('errorFecha');
fecha.addEventListener("change", fechaError);
function fechaError() {
    let errorEnFecha = false;
    let fechaNacimiento = new Date(fecha.value);
    if (fechaNacimiento < Date('01/01/1900') || fechaNacimiento > Date.now()) {
        errorFecha.classList.add('error');
        errorFecha.textContent = 'Fecha incorrecta';
        errorEnFecha = true;
    } else {
        errorFecha.classList.remove('error');
        errorFecha.textContent = '';
    }
    return errorEnFecha;
}

let botonContinuar = document.getElementById('continuar');
if (botonContinuar != null) {
    botonContinuar.addEventListener('click', continuar);
    botonContinuar.addEventListener('enter', continuar);
}
function continuar(e) {
    e.preventDefault();

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
    let errores = false;

    if (estatura.value != '') {
        errores = estaturaError() || errores;
    }
    if (fecha.value != '') {
        errores = fechaError() || errores;
    }
    if (peso.value != '') {
        errores = pesoError() || errores;
    }

    // Comprobar si los campos no esenciales estan rellenados y si si pasar funciones para comprobar errores

    //crear objeto para pasar 
    let activities = [];
    activities.push(document.getElementById('senderismo').checked ? 'senderismo' : '');
    activities.push(document.getElementById('montañismo').checked ? 'montañismo' : '');
    activities.push(document.getElementById('ciclismo').checked ? 'ciclismo' : '');
    activities.push(document.getElementById('correr').checked ? 'correr' : '');


    let elementos = {
        "fullname": nombre.value,
        "username": usuario.value,
        "email": correo.value,
        "pass": contraseña.value,
        "height": estatura.value,
        "weight": peso.value,
        "birthday": fecha.value,
        activities,
    };

    // console.log(JSON.stringify(elementos));
    if (!errores) {
        fetch('../api/register/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(elementos)
        }).then((response) => {
            // console.log(response);
            return response.json()
        })
            .then(function (data) {
                // console.log(data);
                if (data['success']) {
                    sessionStorage.setItem("usuario", usuario.value);
                    sessionStorage.setItem("id", data['id']);
                    sessionStorage.setItem("token", data['token']);
                    window.location = "index.php";
                } else {
                    errorFormulario.textContent = data['msg'];
                    errorFormulario.classList.add('errorGrande');
                }
            })
    }

}

let formularioRegistro = document.getElementById('formularioRegistro');
if (formularioRegistro != null) {
    formularioRegistro.addEventListener('keypress', (e) => {
        if (e.key == 'Enter') {
            e.preventDefault();
        }
    });
}


//funcion edicion perfil guardar cambios
let botonGuardar = document.getElementById('guardarCambios');
if (botonGuardar != null) {
    botonGuardar.addEventListener('click', guardarCambios);
}
function guardarCambios(e) {
    errorFormulario.classList.remove('errorGrande');
    errorFormulario.textContent = '';
    e.preventDefault();
    //crear objeto para pasar 
    let activities = [];
    activities.push(document.getElementById('senderismo').checked ? 'senderismo' : '');
    activities.push(document.getElementById('montañismo').checked ? 'montañismo' : '');
    activities.push(document.getElementById('ciclismo').checked ? 'ciclismo' : '');
    activities.push(document.getElementById('correr').checked ? 'correr' : '');

    let elementos = {
        "id": sessionStorage.getItem('id'),
        "email": correo.value,
        "pass": contraseña.value,
        "height": estatura.value,
        "weight": peso.value,
        "birthday": fecha.value,
        activities,
    };
    let errores = correoError();
    errores = contraseñaError() || errores;
    errores = contraseñaRepetidaError() || errores;
    if (estatura.value != '') {
        errores = estaturaError() || errores;
    }
    if (fecha.value != '') {
        errores = fechaError() || errores;
    }
    if (peso.value != '') {
        errores = pesoError() || errores;
    }

    // 'senderismo': document.getElementById('senderismo').checked,
    // 'montañismo': document.getElementById('montañismo').checked,
    // 'ciclismo': document.getElementById('ciclismo').checked,
    // 'correr': document.getElementById('correr').checked,
    // console.log(errores);
    if (!errores) {
        fetch('../api/user/', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
                'Authorization': `${sessionStorage.getItem('token')}`,
            },
            body: JSON.stringify(elementos)
        }).then((response) => {
            // switch (response.status) {
            // case 400:
            //     return JSON.stringify({ success: false, msg: 'Error con id' });
            // case 401:
            //     return JSON.stringify({ success: false, msg: 'Token no válido' });
            // case 200:

            return response.json();
            // }
        })
            .then(function (data) {
                // console.log(data);
                if (data['success']) {
                    window.location = "index.php";
                } else {
                    errorFormulario.textContent = data['msg'];
                    errorFormulario.classList.add('errorGrande');
                }
            })
    }
}