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