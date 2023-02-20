// Filtros y  comprobacion de errores en nombre
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

// Filtros y comprobacion de errores en nombre
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
        // Consulta para comprobar que el nombre no exista
        fetch(`../api/checkuser/?username=${usuario.value}`)
            .then((response) => response.json())
            .then(function (data) {
                if (data['exists']) {
                    errorUsuario.textContent = 'El usuario ya existe';
                    errorUsuario.classList.add('error');
                    errorEnUsuario = true;
                }
                return errorEnUsuario;
            })
    }
}

// Filtros y comprobacion de errores en email
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
        // Si el correo cumple con la exprecion regular es valido
        errorCorreo.classList.remove('error');
        errorCorreo.textContent = "";
    } else {
        errorCorreo.classList.add('error');
        errorCorreo.textContent = "Email incorrecto";
        errorEnCorreo = true;
    }
    return errorEnCorreo;
}

// Comprobacion de errores en caontraseña(no vacia)
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

// Comprobacion de errores en repita contraseña (no vacia y que sean iguales)
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
// Comprobacion de errores en altura 
let estatura = document.getElementById('estatura');
let errorEstatura = document.getElementById('errorEstatura');
estatura.addEventListener("change", estaturaError);
function estaturaError() {
    let errorEnEstatura = false;
    if ((estatura.value < 100 || estatura.value > 230) && (estatura.value != '')) {
        errorEstatura.classList.add('error');
        errorEstatura.textContent = 'Altura errónea';
        errorEnEstatura = true;
    } else {
        errorEstatura.classList.remove('error');
        errorEstatura.textContent = '';
    }
    return errorEnEstatura;
}

// Comprobaion de errores en peso
let peso = document.getElementById('peso');
let errorPeso = document.getElementById('errorPeso');
peso.addEventListener("change", pesoError);
function pesoError() {
    let errorEnPeso = false;
    if ((peso.value < 50 || peso.value > 180) && (estatura.value != '')) {
        errorPeso.classList.add('error');
        errorPeso.textContent = 'Peso incorrecto';
        errorEnPeso = true;
    } else {
        errorPeso.classList.remove('error');
        errorPeso.textContent = '';
    }
    return errorEnPeso;
}

// Comprobaion de errores en fecha nacimiento
let fecha = document.getElementById('fecha');
let errorFecha = document.getElementById('errorFecha');
fecha.addEventListener("change", fechaError);
function fechaError() {
    let errorEnFecha = false;
    let fechaNacimiento = new Date(fecha.value);
    // Fecha entre ahora y 1900
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

// BOTONES
// CXomprobcaion de errores antes de continuar 
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
    botonRegistro.addEventListener('enter', continuar);
}

let errorFormulario = document.getElementById('errorFormulario');
function registrar(e) {
    errorFormulario.classList.remove('errorGrande');
    errorFormulario.textContent = '';
    e.preventDefault();
    let errores = false;
    let fechaNac = fecha.value;

    if (estatura.value != '') {
        errores = estaturaError() || errores;
    }
    if (fecha.value != '') {
        errores = fechaError() || errores;
    } else {
        fechaNac = '0000-00-00';
    }

    if (peso.value != '') {
        errores = pesoError() || errores;
    }

    // Comprobar si los campos no esenciales estan rellenados y si si pasar funciones para comprobar errores

    // crear objeto para pasar 
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
        "birthday": fechaNac,
        activities,
    };

    // Si no hay errores hacer la consulta para registrar
    if (!errores) {
        fetch('../api/register/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(elementos)
        }).then((response) => response.json())
            .then(function (data) {

                if (data['success']) {
                    // Guarda credenciales en session storage
                    sessionStorage.setItem("usuario", usuario.value);
                    localStorage.setItem("usuario", usuario.value);
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

// Impide que al hacer enter se autoenvie el formulario
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
    let fechaNac = (fecha.value == '') ? '0000-00-00' : fecha.value;
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
        "birthday": fechaNac,
        activities,
    };

    // No compruebo esto porque con el jwt ya es suficiente para saber si es el usuario
    // Y lo dejo por si alguien quiere cambiar su contraseña
    // errores = contraseñaError() || errores;
    // errores = contraseñaRepetidaError() || errores;

    let errores = correoError();
    if (estatura.value != '') {
        errores = estaturaError() || errores;
    }
    if (fecha.value != '') {
        errores = fechaError() || errores;
    }
    if (peso.value != '') {
        errores = pesoError() || errores;
    }

    // Si no hay errores se cambia perfil
    if (!errores) {
        fetch(`../api/user/?id=${sessionStorage.getItem('id')}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
                'Authorization': `${sessionStorage.getItem('token')}`,
            },
            body: JSON.stringify(elementos)
        }).then((response) => response.json())
            .then(function (data) {
                // se ha cambiado algo en el sesion storage
                if (data['msg'] == 'Token invalido') {
                    sessionStorage.clear();
                    window.location = "index.php";
                }

                if (data['success']) {
                    window.location = "index.php";
                } else {
                    errorFormulario.textContent = data['msg'];
                    errorFormulario.classList.add('errorGrande');
                }
            })
    }
}