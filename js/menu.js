if (sessionStorage.getItem('id') != null) {
    document.getElementById('inicioSesion').innerHTML = `
    <button class="azul boton" id= 'desplegable'>
        <img src="../Iconos/person-fill.svg" class="iconoPequeño">
        <span>&nbsp;&nbsp;Mi cuenta</span>
    </button>
    <div id="menu" class="azul">
    <a href="edicionPerfil.php">
            <button class="boton rojo"><img src="../Iconos/person-fill-gear.svg" alt="" class="iconoPequeño">&nbsp;Configuración</button>
        </a>
        <a href="misRutas.php">
            <button class="boton rojo"><img src="../Iconos/signpost-fill.svg" alt="" class="iconoPequeño">&nbsp;Mis rutas</button>
        </a>
        <a>
            <button class="boton rojo" id='cerrarSesion'>Cerrar sesión</button>
        </a>
    </div>`;
} else {
    document.getElementById('inicioSesion').innerHTML = `
    <a class="link" href="sesion.php">
        <button class="azul boton" id="desplegable">
            <img src="../Iconos/person-fill.svg" class="iconoPequeño">
            <span>&nbsp;&nbsp;Iniciar sesión</span>
        </button>
    </a>`;
}

if (document.getElementById('cerrarSesion') != null) {
    document.getElementById('cerrarSesion').addEventListener('click', () => {
        sessionStorage.clear();
        window.location = '.';
    })
}
