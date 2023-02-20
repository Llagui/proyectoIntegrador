<script>
    // redireccion si intenta acceder un usuario que ha iniciado sesion
    if (sessionStorage.getItem("usuario") != null) {
        window.location = "index.php";
    }
</script>
<main id="contenedor">
    <img src="../img/pexels-suliman-sallehi-1822461.jpg" alt="" class="imgFondoIzquierda">

    <div class="azul" id="formularioSesion">
        <h1>¡Hola de nuevo! <br> Inicia sesión y empieza a explorar</h1>
        <!-- formulario inicio de sesion -->
        <form action="sesion.php" method="post">
            <label for="usuario">Usuario</label><br>
            <input type="text" name="usuario" id="usuario" class="campo"><br>
            <div id="errorUsuario"></div><br>

            <label for="contraseña">Contraseña</label><br>
            <input type="password" name="contraseña" id="contraseña" class="campo"><br>
            <div id="errorContraseña"></div><br>
            <center>
                <div id="errorFormulario"></div><br>

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