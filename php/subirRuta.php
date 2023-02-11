<!-- <script>
    if (sessionStorage.getItem("usuario") != null) {
        window.location = "index.php";
    }
</script> -->
<main id="contenedor">
    <img src="../img/pexels-tyler-lastovich-808466.jpg" alt="" class="imgFondoIzquierda">

    <div class="azul" id="formularioRutas">
        <h1>Deleitanos con <br> tu ruta</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="ruta">Nombre</label><br>
            <input type="text" name="ruta" id="ruta" class="campo"><br>
            <div id="errorRuta"></div>

            <label for="descripcion">Descripcion</label><br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="campo"></textarea>
            <div id="errorDescripcion"></div>

            <div id="selects">
                <div>
                    <label for="intensidad">Intensidad</label>
                    <select name="intensidad" id="intensidad" placeholder="Ordenar por" class="boton ">
                        <option selected></option>
                        <option value="0">Sencilla</option>
                        <option value="1">Baja</option>
                        <option value="2">Media</option>
                        <option value="3">Alta</option>
                        <option value="4">Muy alta</option>
                    </select><br>
                    <div id="errorIntensidad"></div>
                </div>
                <div>
                    <label for="actividad">Actividad</label>
                    <select name="actividad" id="actividad" placeholder="Ordenar por" class="boton ">ç
                        <option selected></option>
                        <option>Senderismo</option>
                        <option>Ciclismo</option>
                        <option>Correr</option>
                        <option>Alpinismo</option>
                    </select><br>
                    <div id="errorActividad"></div>
                </div>
            </div>
            
            <!-- <label for="tipo">Tipo de ruta</label><br> -->
            Tipo de ruta:<br>
            <div id="tipoRuta">
                <div><input type="radio" name="ingresos" value="true" checked> Circular</div>
                <div><input type="radio" name="ingresos" value="false" id="lineal"> Lineal</div>
            </div>
            <br>

            <label for="gpx">GPX</label><br>
            <input type="file" accept=".gpx" id="gpx" />
            <br><br>
            <div id="errorGpx"></div><br>
            <center>
                <div id="errorFormulario"></div><br>

                <input type="submit" value="Subir ruta" class="boton rojo" name="inicio" id="subirRuta">

            </center>
        </form>
    </div>
    <img src="../img/pexels-jens-johnsson-66100.jpg" alt="" class="imgFondoDerecha subirRutas">
</main>
<script src="../js/subirRuta.js"></script>