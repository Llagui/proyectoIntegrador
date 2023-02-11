<?php
require_once('../api/clases/conexion.php');


$con = new Conexion();
$sql = "SELECT * from rutas WHERE id = '{$_GET['id']}'";
$result = $con->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
$sql2 = "SELECT * from usuarios WHERE id = '{$result['user']}'";
$user = $con->query($sql2)->fetch_all(MYSQLI_ASSOC)[0];
// print_r($user);
?>
<main>
    <div id="detalleRutas">
        <div id="detalleTitulo">
            <h1><?php echo $result['route_name']; ?></h1>
        </div>


        <br>
        <div id="derecha">
            <h3 id="nombreUsuario">
                <!-- Cuando ponga imagenes a los usuarios  -->
                <img src="../Iconos/person-fill.svg" alt="" class="imagenPerfil" />
                &nbsp;<?php echo $user['username']; ?>
            </h3>
            <div class="rutaRecomendada">
                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">
            </div>
            <br>
            <div id="botones">
                <a href="https://www.visualcrossing.com/weather-history/<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>/metric/next7days">
                    <button class="boton rojo">
                        <img src="../Iconos/brightness-high.svg" alt="" class="iconoPequeño">&nbsp;Tiempo
                    </button></a>
                <button class="boton rojo">
                    <img src="../Iconos/cloud-arrow-down.svg" alt="" class="iconoPequeño">&nbsp;Descargar(nf)
                </button>
                <a href="https://www.google.com/maps/place/<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>">
                    <button class="boton rojo">
                        <img src="../Iconos/compass.svg" alt="" class="iconoPequeño">&nbsp;Cómo llegar
                    </button>
                </a>
            </div>
            <div id="descripcion">
                <h4>Descripción</h4>
                <?php echo $result['desc']; ?>
            </div>
            <div>
                <h4>Comentarios</h4>
                <div class="comentario">
                    <img src="../img/Looneytunes-roadrunner.webp">
                    <div class="azul">
                        ¡Meep! ¡Meep! (Ya he hecho la ruta y me ha encantado)
                        <br><br>
                        -Correcaminos
                    </div>
                </div>
                <center>
                    <button class="boton rojo">Ver más (nf)</button>
                </center>

            </div>
        </div>



        <div id="izquierda">

            <div class="corazones" style="margin:18.72px 0"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>

            <div id="mapa">
            </div>
            <div class="azul" id="caract">
                <h3>Características</h3>
                <div>Actividad: <?php echo $result['activity']; ?></div>
                <div>Distancia: <?php echo $result['distance'] / 1000; ?>km</div>
                <div>Intensidad:
                    <?php
                    switch ($result['intensity']) {
                        case 0:
                            echo 'Sencilla';
                            break;
                        case 1:
                            echo 'Baja';
                            break;
                        case 2:
                            echo 'Media';
                            break;
                        case 3:
                            echo 'Alta';
                            break;
                        case 4:
                            echo 'Muy alta';
                            break;
                    }
                    ?>
                </div>
                <div>Tipo: <?php echo ($result['circular'] == 1) ? 'Circular' : 'Lineal'; ?></div>
                <div>Desnivel: <?php echo $result['slope'] ?>m</div>
                <div>Tiempo: 3h</div>
            </div>

            <div style="float: left; position: relative;">
                <h3>Rutas sugeridas</h3>

                <br>
                <div class="rutaRecomendada">
                    <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                    <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                    <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

                    <div class="tituloPequeño titulo">Sendero de O Monte</div>
                    <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                    <div class="caract1">
                        <div>Distancia: 5km</div>
                        <div>Intensidad: Media</div>
                    </div>
                    <div class="caract2">
                        <div>Tipo: Circular</div>
                        <div>Desnivel: 100m</div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</main>
<script>
    let map = L.map('mapa').setView([<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>], 9);

    L.tileLayer('https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=817534cc1dfa4813b498960345425794', {
        maxZoom: 18,
        attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>'
    }).addTo(map);
    let marker = L.marker([<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>]).addTo(map);
</script>