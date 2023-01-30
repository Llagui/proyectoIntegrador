document.getElementById('botonSesion').addEventListener( 'click', (e) =>{
    e.preventDefault();
    let elementos = {
        "username": document.getElementById('usuario').value,
        "pass": document.getElementById('contraseña').value,
    }
    fetch('http://localhost:3000/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(elementos)
    }).then((response) => response.json())
        .then(function (data) {
            console.log(data);
            if (data['success']) {
                sessionStorage.setItem("usuario", document.getElementById('usuario').value);
                sessionStorage.setItem("id", data['id']);
                sessionStorage.setItem("token", data['token']);
                window.location = "index.php";
            } else {
                errorFormulario.textContent = data['msg'];
                errorFormulario.classList.add('errorGrande');
            }
        })
});