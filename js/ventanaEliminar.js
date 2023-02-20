// Ventana modal de eliminacion
document.getElementById('eliminar').addEventListener("click", ventanaEliminar);
function ventanaEliminar(e) {
    e.preventDefault();
    document.getElementById('ventanaEliminar').style.display = 'flex';
}

document.getElementById('cancelar').addEventListener("click", (e) => {
    e.preventDefault();
    document.getElementById('ventanaEliminar').style.display = 'none';
});

// Si confirma se hace la peticion a la api para eliminar
document.getElementById('confirmar').addEventListener("click", (e) => {
    fetch(`../api/user/?id=${sessionStorage.getItem('id')}`, {
        method: 'DELETE',
        headers: {
            'Authorization': `${sessionStorage.getItem('token')}`,
        }
    }).then((response) => response.json())
        .then(function (data) {

            if (data['success']) {
                sessionStorage.clear();
                window.location = "index.php";
            } else {
                // Se ha tocado algo en el sesion storage
                if (data['msg'] == "Token incorrecto") {
                    sessionStorage.clear();
                    window.location = "index.php";
                }
                let errorFormulario = document.getElementById('errorEliminar');
                errorFormulario.textContent = data['msg'];
                errorFormulario.classList.add('errorGrande');
            }
        })
})