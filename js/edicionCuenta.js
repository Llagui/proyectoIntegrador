// let datos;
fetch(`../api/user/?id=${sessionStorage.getItem('id')}`, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json;charset=utf-8',
        'Authorization': `${sessionStorage.getItem('token')}`,
    },
}).then((response) => {
    // console.log(response);
    return response.json()
})
    .then(function (data) {
        console.log(data);
        // datos = data;

        // se ha cambiado algo en el sesion storage
        if (data['msg'] == 'Token invalido') {
            sessionStorage.clear();
            window.location = "index.php";
        }
        if (data) {
            document.getElementById('nombre').value = data['fullname'];
            document.getElementById('usuario').value = data['username'];
            document.getElementById('correo').value = data['email'];
            document.getElementById('estatura').value = data['height'];
            document.getElementById('peso').value = data['weight'];
            document.getElementById('fecha').value = data['birthday'];
            // document.getElementById('contraseña').value = data['pass'];
            // document.getElementById('repitaContraseña').value = data['pass'];
            document.getElementById('senderismo').checked = data['activities'].some((item) => item == 'senderismo');
            document.getElementById('montañismo').checked = data['activities'].some((item) => item == 'montañismo');
            document.getElementById('ciclismo').checked = data['activities'].some((item) => item == 'ciclismo');
            document.getElementById('correr').checked = data['activities'].some((item) => item == 'correr');
        } else {
            errorFormulario.textContent = data['msg'];
            errorFormulario.classList.add('errorGrande');
        }

    });

