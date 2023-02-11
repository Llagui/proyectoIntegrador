
<script>
    if (sessionStorage.getItem("usuario") == null) {
        window.location = "index.php";
    }
</script>
<main id="contenedor">
    <img src="../img/pexels-oziel-gómez-840667.jpg" alt="" class="imgFondoDerecha">

    <div class="azul" id="formularioCambios">
        <form action="registro.php" method="post"  enctype="multipart/form-data">

            <h1>¡Bienvenido<br> a la configuración de <br> tu cuenta!</h1>
            <div id="cambiosCuenta">
                <div class="imagenPerfil">
                    <img src="../Iconos/person-fill.svg" alt="" />
                    <div class="file">
                        Cambiar foto
                        <input type="file" name="file" value="" />
                    </div>
                </div>
                <label for="nombre" id="cambioNombre">
                    Nombre completo <input type="text" name="datos[nombre]" id="nombre" class="campo" disabled>
                    <div id="errorNombre"></div>
                </label>

                <label for="usuario" id="cambioUsuario">
                    Usuario <input type="text" name="datos[usuario]" id="usuario" class="campo" disabled>
                    <div id="errorUsuario"></div>

                </label>

                <label for="correo">
                    Correo electronico<input type="text" name="datos[correo]" id="correo" class="campo" maxlength="50">
                    <div id="errorCorreo"></div>
                </label>

                <label for="fecha">
                    Fecha nacimento<input type="date" name="datos[fecha]" id="fecha" class="campo">
                    <input type="hidden" name="datos[fecha]" value="1901/01/01">
                    <div id="errorFecha"></div>
                </label>

                <label for="contraseña">
                    Nueva contraseña <input type="password" name="datos[contraseña]" id="contraseña" class="campo">
                    <div id="seguridadContraseña"></div>
                    <div id="errorContraseña"></div>
                </label>

                <label for="repitaContraseña">
                    Repita la contraseña <input type="password" name="repitaContraseña" id="repitaContraseña" class="campo" disabled><br>
                    <div id="coincidenciaContraseñas"></div>
                </label>

                <label for="estatura">
                    Estatura (cm) <input type="number" name="datos[estatura]" id="estatura" class="campo"><br>
                    <div id="errorEstatura"></div>
                </label>

                <label for="peso">
                    Peso (kg) <input type="number" name="datos[peso]" id="peso" class="campo"><br>
                    <div id="errorPeso"></div>
                </label>

                <label for="actividades" id="cambioActividades">
                    <p>Actividades favoritas</p>
                    <div id="aficciones">

                        <input type="checkbox" name="datos[senderismo]" id="senderismo"> Senderismo<br>
                        <input type="checkbox" name="datos[ciclismo]" id="ciclismo"> Ciclismo<br>
                    </div>
                    <div id="aficciones">
                        <input type="checkbox" name="datos[montañismo]" id="montañismo"> Montañismo<br>
                        <input type="checkbox" name="datos[correr]" id="correr"> Correr<br>
                    </div>
                </label>
            </div>
            <br>
            <center>
            <div id="errorFormulario"></div>
            
                <input type="submit" value="Guardar cambios" class="boton rojo" name="registro" id='guardarCambios'><br>

        </form>
        <button class="boton rojo" id="eliminar">Eliminar cuenta</button>
        <br>
        <a href="index.php">Volver</a>
        </center>

    </div>
    <div id="ventanaEliminar">
        <div class="azul">
            <center>
                <h2>No nos dejes :( <br> ¿Estas seguro de querer eliminar la cuenta?</h2>
                <div id="errorEliminar"></div>
                <button class="boton rojo" id="confirmar">Confirmar</button>
                <br>
                <button class="boton rojo" id="cancelar">Cancelar</button>
            </center>
        </div>
    </div>

    <img src="../img/pexels-rrinna-2071553.jpg" alt="" class="imgFondoIzquierda">
</main>
<script src="../js/seguridadContraseña.js"></script>
<script src="../js/registro.js"></script>
<script src="../js/ventanaEliminar.js"></script>
<script src="../js/edicionCuenta.js"></script>