<script>
    if (sessionStorage.getItem("usuario") != null) {
        window.location = "index.php";
    }
</script>
<main id="contenedor">
    <?php
    if (isset($_REQUEST["cerrarSesion"])) {
        $_SESSION = array();
        session_destroy();
    ?>
        <script>
            sessionStorage.clean();
            window.location = "index.php";
        </script>
    <?php
    }
    ?>
    <img src="../img/pexels-suliman-sallehi-1822461.jpg" alt="" class="imgFondoIzquierda">

    <div class="azul" id="formularioSesion">
        <h1>¡Hola de nuevo! <br> Inicia sesión y empieza a explorar</h1>
        <form action="sesion.php" method="post">
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" class="campo"><br>
            <div id="errorUsuario"></div><br>

            <label for="contraseña">Contraseña</label><br>
            <input type="password" name="contraseña" id="contraseña" class="campo"><br>
            <div id="errorContraseña"></div><br>

            <div id="errorFormulario"></div><br>
            <center>
                <input type="submit" value="Iniciar Sesión" class="boton rojo" name="inicio" id="botonSesion">
                <p>
                    ¿No tienes cuenta? <br>
                    <a href="registro.php"><b>Registrate aquí</b></a>
                </p>
            </center>
        </form>
    </div>
    <img src="../img/pexels-lan-yao-13103876.jpg" alt="" class="imgFondoDerecha">

</main>

<script src="../js/sesion.js"></script>