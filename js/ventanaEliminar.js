document.getElementById('eliminar').addEventListener("click", ventanaEliminar);
function ventanaEliminar(e) {
    e.preventDefault();
    document.getElementById('ventanaEliminar').style.display = 'flex';
}
document.getElementById('cancelar').addEventListener("click", quitarVentanaEliminar);
function quitarVentanaEliminar(e) {
    e.preventDefault();
    document.getElementById('ventanaEliminar').style.display = 'none';
}

document.getElementById('confirmar').addEventListener("click", (e) => {
    fetch(`../api/user/?id=${sessionStorage.getItem('id')}`, {
        method: 'DELETE',
        headers: {
            // 'Content-Type': 'application/json;charset=utf-8',
            'Authorization': `${sessionStorage.getItem('token')}`,
        }
    }).then((response) =>  response.json())
        .then(function (data) {
            // console.log(data);
            if (data['success']) {
                sessionStorage.clear();
                window.location = "index.php";
            } else {
                let errorFormulario = document.getElementById('errorEliminar');
                errorFormulario.textContent = data['msg'];
                errorFormulario.classList.add('errorGrande');
            }
        })
})