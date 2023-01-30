<main id="contenedor">
    <?php
    if (isset($_REQUEST["cerrarSesion"])) {
        $_SESSION = array();
        session_destroy();
    ?>
        <script>
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
            <input type="text" name="usuario" id="usuario" class="campo"><br><br>
            <label for="contraseña">Contraseña</label><br>
            <input type="password" name="contraseña" id="contraseña" class="campo"><br><br>
            <center>
                <input type="submit" value="Iniciar Sesión" class="boton rojo" name="inicio" id="botonSesion">
                <p>
                    ¿No tienes cuenta? <br>
                    <a href="registro.php"><b>Registrate aquí</b></a>
                </p>
            </center>
        </form>
        <!-- <?php
                // if (isset($_REQUEST['inicio'])) {
                //     if (validateUser($_REQUEST['usuario'], $_REQUEST['contraseña'])) {
                //         $_SESSION['usuario'] = array(
                //             'usuario' => $_REQUEST['usuario'],
                //             'id' => getIDWithUser($_REQUEST['usuario']),
                //         );
                ?>
                <script>
                    window.location = "index.php";
                </script>
        <?php
        //     } else {
        //         echo "<center><p>Inicio de sesion erróneo</p></center>";
        //     }
        // }
        ?> -->
    </div>
    <img src="../img/pexels-lan-yao-13103876.jpg" alt="" class="imgFondoDerecha">

</main>

<script src="../js/sesion.js"></script>