document.getElementById('continuar').addEventListener('click', continuar);
document.getElementById('continuar').addEventListener('enter', continuar)
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

document.getElementById('registro').addEventListener('click', registrar)
function registrar(e) {
    e.preventDefault();
    //crear objeto para pasar 
    let elementos = {
        nombre 
    };

}

document.getElementById('formularioRegistro').addEventListener('keypress', (e) =>{
    if (e.key == 'Enter') {
        e.preventDefault();
    } 
})