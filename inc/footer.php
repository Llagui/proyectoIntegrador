<footer class="negro">
    <a href="../php/" class="logo">
        <img src="../logos/image.png" class="imagenLogo" alt="logo">
        <span>&nbsp;&nbsp;ROAD RUNNER</span>
    </a>

    <br>
    <div></div>
    <div id="primeraColumna">
        <div id="RRSS">
            <span class="rojo botonCirculoPequeño">
                <img src="../Iconos/facebook.svg" alt="facebook" class="iconoPequeño">
            </span>
            <span class="rojo botonCirculoPequeño">
                <img src="../Iconos/linkedin.svg" alt="linkedin" class="iconoPequeño">
            </span>
            <span class="rojo botonCirculoPequeño">
                <img src="../Iconos/instagram.svg" alt="instagram" class="iconoPequeño">
            </span>
            <span class="rojo botonCirculoPequeño">
                <img src="../Iconos/twitter.svg" alt="twitter" class="iconoPequeño">
            </span>
            <span class="rojo botonCirculoPequeño">
                <img src="../Iconos/youtube.svg" alt="youtube" class="iconoPequeño">
            </span>
        </div>
        <br>
        <div id="usos">
            <a href="../php/busqueda.php">
                <div class="boton rojo">
                    <img src="../Iconos/router.svg" alt="youtube" class="iconoPequeño">
                    <span>&nbsp;&nbsp;On-Line</span>
                </div>
            </a>
            <div class="boton rojo">
                <img src="../Iconos/apple.svg" alt="youtube" class="iconoPequeño">
                <span>&nbsp;&nbsp;App store</span>
            </div>
            <div class="boton rojo">
                <img src="../Iconos/google-play.svg" alt="youtube" class="iconoPequeño">
                <span>&nbsp;&nbsp;Play Store</span>
            </div>
        </div>
    </div>

    <div id="segundaColumna">
        <span class="tituloPequeño">NAVEGACIÓN</span>
        <!-- Menu navegacion -->
        <ul id="navegacion">
        </ul>
    </div>
    <div id="terceraColumna">
        <span class="tituloPequeño">ENLACES ÚTILES</span>
        <ul>
            <li>Acerca de</li>
            <li>Únete al equipo</li>
            <li>Contacto</li>
            <li>Road Runner +</li>
        </ul>
    </div>
    <div id="cuartaColumna">
        <span>Mapas</span>
        <span>Privacidad</span>
        <span>Términos de uso</span>
    </div>
    <div id="quintaColumna">
        © 2023 Road Runner S.L.
    </div>

</footer>
<script>
    if (sessionStorage.getItem('id') != null) {
        document.getElementById('navegacion').innerHTML = `
        <li><a href="../php/busqueda.php">Busqueda rutas</a></li> 
        <li><a href="../php/edicionPerfil.php">Configuracion de cuenta</a></li> 
        <li><a href="../php/misRutas.php">Mis rutas</a></li>
        <li><a href="../php/subirRuta.php">Subir ruta</a></li>
        `;
    } else {
        document.getElementById('navegacion').innerHTML = `
            <li><a href="../php/busqueda.php">Busqueda rutas</a></li> 
            <li><a href="../php/sesion.php">Iniciar sesión</a></li> 
            <li><a href="../php/registro.php">Registrarse</a></li> 
        `;
    }
</script>
</body>

</html>