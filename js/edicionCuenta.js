// console.log(sessionStorage.getItem('id'));
let datos;
fetch(`http://localhost:3000/api/user?id=${sessionStorage.getItem('id')}`, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json;charset=utf-8',
        'Authorization': `${sessionStorage.getItem('token')}`,
    },
}).then((response) => response.json())
    .then(function (data) {
        console.log(data);
        datos = data;
        document.getElementById('nombre').value = data['fullname'];
        document.getElementById('usuario').value = data['username'];
        document.getElementById('correo').value = data['email'];
        document.getElementById('estatura').value = data['height'];
        document.getElementById('peso').value = data['weight'];
        document.getElementById('fecha').value = data['birthday'];
        document.getElementById('contraseña').value = data['pass'];
        document.getElementById('repitaContraseña').value = data['pass'];
        document.getElementById('senderismo').checked = data['activities'].some('senderismo');
        document.getElementById('montañismo').checked = data['activities'].some('montañismo');
        document.getElementById('ciclismo').checked = data['activities'].some('ciclismo');
        document.getElementById('correr').checked = data['activities'].some('correr');
    });

