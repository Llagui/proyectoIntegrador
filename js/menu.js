// Visualizacion de manu desplegable si se ha iniciado sesion
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

} else if ((localStorage.getItem('usuario') != null) && (window.globalThis.location.pathname == '/proyecto%20Integrador/php/index.php' || window.globalThis.location.pathname == '/proyecto%20Integrador/php/')) {
    // Activar en el servidor
    // else if ((localStorage.getItem('usuario') != null) && (window.globalThis.location.pathname == '/php/index.php' || window.globalThis.location.pathname == '/php/')) {
    document.getElementById('inicioSesion').innerHTML = `
    <a class="link" href="sesion.php">
        <button class="azul boton" id="desplegable">
            <img src="../Iconos/person-fill.svg" class="iconoPequeño">
            <span>&nbsp;&nbsp;Iniciar sesión</span>
        </button>
    </a>
    <div id='recuerdo' class="azul">
        <p>
            <b>¡Hola de nuevo ${localStorage.getItem('usuario')}!</b> <br>
            Inicia sesión para seguir <br> con tus aventuras
        </p>
    </div>`;

    window.addEventListener('scroll', () => {
        if (!document.getElementById('recuerdo').classList.contains('fade-out-bck')) {
            document.getElementById('recuerdo').classList.add('fade-out-bck');
        }
    });
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
