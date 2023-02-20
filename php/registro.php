<script>
    // redireccion si intenta acceder un usuario que ha iniciado sesion
    if (sessionStorage.getItem("usuario") != null) {
        window.location = "index.php";
    }
</script>
<main id="contenedor">
    <img src="../img/pexels-suliman-sallehi-1822461.jpg" alt="" class="imgFondoIzquierda">

    <div class="azul" id="formularioSesion">
        <form action="registro.php" method="post" id="formularioRegistro">
            <div id="pag1">
                <h1>Registrate hoy para empezar a planificar tu próxima aventura</h1>
                <label for="nombre">Nombre completo</label><br>
                <input type="text" name="datos[nombre]" id="nombre" class="campo" maxlength="70"><br>
                <div id="errorNombre"></div>

                <label for="usuario">Usuario</label><br>
                <input type="text" name="datos[usuario]" id="usuario" class="campo" maxlength="50"><br>
                <div id="errorUsuario"></div>

                <label for="correo">Correo electronico</label><br>
                <input type="text" name="datos[correo]" id="correo" class="campo" maxlength="50"><br>
                <div id="errorCorreo"></div>

                <label for="contraseña">Contraseña</label><br>
                <input type="password" name="datos[contraseña]" id="contraseña" class="campo"><br>
                <div id="seguridadContraseña"></div> 
                <div id="errorContraseña"></div>

                <label for="repitaContraseña">Repita la contraseña</label><br>
                <input type="password" name="repitaContraseña" id="repitaContraseña" class="campo" disabled><br>
                <div id="coincidenciaContraseñas"></div>
                <br>
                <center>
                    <button class="boton rojo" id="continuar">Continuar</button>
                    <p><a href="sesion.php">Volver</a></p>
                </center>
            </div>
            <div id="pag2">
                <h1>Rellena estos datos para una expreriencia personalizada</h1>
                <label for="estatura">Estatura (cm)</label><br>
                <input type="number" name="datos[estatura]" id="estatura" class="campo" min="100" max="230"><br>
                <div id="errorEstatura"></div>

                <label for="peso">Peso (kg)</label><br>
                <input type="number" name="datos[peso]" id="peso" class="campo" min="50" max="180"><br>
                <div id="errorPeso"></div>

                <label for="fecha">Fecha nacimento</label><br>
                <input type="hidden" name="datos[fecha]" value="1901/01/01">
                <input type="date" name="datos[fecha]" id="fecha" class="campo"><br>
                <div id="errorFecha"></div>

                <label for="actividades">Actividades favoritas</label><br>
                <div class="aficciones">
                    <input type="checkbox" name="datos[senderismo]" id="senderismo"> Senderismo<br>
                    <input type="checkbox" name="datos[ciclismo]" id="ciclismo"> Ciclismo<br>

                </div>
                <div class="aficciones">
                    <input type="checkbox" name="datos[montañismo]" id="montañismo"> Montañismo<br>
                    <input type="checkbox" name="datos[correr]" id="correr"> Correr<br>
                </div>

                <center>
                    <br>
                    <div id="errorFormulario"></div>
                    <br>
                    <input type="submit" value="Registrarse" class="boton rojo" name="registro" id='registro'>
                    <p><a href="sesion.php">Volver</a></p>
                </center>

            </div>
        </form>
    </div>
    <img src="../img/pexels-lan-yao-13103876.jpg" alt="" class="imgFondoDerecha">
</main>
<script src="../js/seguridadContrasena.js"></script>
<script src="../js/registro.js"></script>