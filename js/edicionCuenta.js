// Consulta para rellnar los campos
fetch(`../api/user/?id=${sessionStorage.getItem('id')}`, {
    method: 'GET',
    headers: {
        'Authorization': `${sessionStorage.getItem('token')}`,
    },
}).then((response) => response.json())
    .then(function (data) {
        // se ha cambiado algo en el sesion storage
        if (data['msg'] == 'Token invalido') {
            sessionStorage.clear();
            window.location = "index.php";
        }

        if (data['user'] && data['success']) {
            // No relleno la contraseña, si se pone otra esa pasa a ser la nueva
            data = data['user'];
            // Relleno de los campos
            document.getElementById('nombre').value = data['fullname'];
            document.getElementById('usuario').value = data['username'];
            document.getElementById('correo').value = data['email'];
            document.getElementById('estatura').value = data['height'];
            document.getElementById('peso').value = data['weight'];
            document.getElementById('fecha').value = data['birthday'];
            document.getElementById('senderismo').checked = data['activities'].some((item) => item == 'senderismo');
            document.getElementById('montañismo').checked = data['activities'].some((item) => item == 'montañismo');
            document.getElementById('ciclismo').checked = data['activities'].some((item) => item == 'ciclismo');
            document.getElementById('correr').checked = data['activities'].some((item) => item == 'correr');
        } else {
            let errorFormulario = document.getElementById('errorFormulario');
            errorFormulario.textContent = data['msg'];
            errorFormulario.classList.add('errorGrande');
        }

    });

