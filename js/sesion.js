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
        errorUsuario.classList.remove('error');
        errorUsuario.textContent = '';
    }
    return errorEnUsuario;
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

document.getElementById('botonSesion').addEventListener('click', (e) => {
    e.preventDefault();
    let errores = usuarioError();
    errores = contraseñaError() || errores;
    if (!errores) {
        let elementos = {
            "username": document.getElementById('usuario').value,
            "pass": document.getElementById('contraseña').value,
        }
        fetch('../api/login/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(elementos)
        }).then((response) => {
            // switch (response.status) {
            //     case 401:
            //         return JSON.stringify({success: true, msg: 'credenciales no validas'})
            //         break;
            //     case 200:
            //         return response.json();
            //         break;
            // }
            // console.log(response);
            return response.json();
        })
            .then(function (data) {
                // console.log(data);
                if (data['success']) {
                    sessionStorage.setItem("usuario", document.getElementById('usuario').value);
                    sessionStorage.setItem("id", data['id']);
                    sessionStorage.setItem("token", data['token']);
                    window.location = "index.php";
                } else {
                    let errorFormulario = document.getElementById('errorFormulario');
                    errorFormulario.textContent = data['msg'];
                    errorFormulario.classList.add('errorGrande');
                }
            })
    }
});