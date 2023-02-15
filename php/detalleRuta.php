<?php
$uri = "http://localhost/proyecto%20Integrador/api/route/?id={$_GET['id']}";

$consulta =  (array) json_decode(file_get_contents($uri));

if (@$consulta['success']) {
    $result = (array)json_decode($consulta['ruta']);
    $user = (array) json_decode($consulta['usuario']);
    $arrayPuntos = (array) json_decode($consulta['puntos']);
    $gpxArray = (array) json_decode($consulta['estadisticas']);
?>
    <main>
        <div id="detalleRutas">

            <div id="detalleTitulo">
                <a href="busqueda.php">
                    <span class="rojo botonCirculoPequeño">
                        <img src="../Iconos/caret-left.svg" alt="youtube" class="iconoPequeño">
                    </span>
                </a>
                <h1><?php echo $result['route_name'] ; ?></h1>
            </div>

            <br>
            <div id="derecha">
                <h3 id="nombreUsuario">
                    <!-- Cuando ponga imagenes a los usuarios  -->
                    <img src="../Iconos/person-fill.svg" alt="" class="imagenPerfil" />
                    &nbsp;<?php echo(@$user['username'] ? $user['username'] : 'Anonimo'); ?>
                </h3>
                <div class="rutaRecomendada">
                    <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                    <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                    <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">
                </div>
                <br>
                <div id="botones">
                    <a target="_blank" href="https://www.visualcrossing.com/weather-history/<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>/metric/next7days">
                        <button class="boton rojo">
                            <img src="../Iconos/brightness-high.svg" alt="" class="iconoPequeño">&nbsp;Tiempo
                        </button></a>
                    <button class="boton rojo">
                        <img src="../Iconos/cloud-arrow-down.svg" alt="" class="iconoPequeño">&nbsp;Descargar(nf)
                    </button>
                    <a target="_blank" href="https://www.google.com/maps/place/<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>">
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
                    <div>Distancia: <?php echo number_format($result['distance'] / 1000, 2); ?>km</div>
                    <div>Velocidad: <?php echo number_format($gpxArray['avgSpeed'], 2) ?>m/s</div>
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
                    <div>Desnivel positivo: <?php echo $result['slope'] ?>m</div>
                    <div>Desnivel negativo: <?php echo str_replace(',', '', number_format($gpxArray['cumulativeElevationLoss'], 0)) ?>m</div>
                    <div>Max altura: <?php echo str_replace(',', '', number_format($gpxArray['maxAltitude'], 0)) ?>m</div>
                    <div>Min altura: <?php echo str_replace(',', '', number_format($gpxArray['minAltitude'], 0)) ?>m</div>
                    <div>Tiempo: <?php
                                    $horas = floor($gpxArray['duration'] / 3600);
                                    $minutos = floor(($gpxArray['duration'] - ($horas * 3600)) / 60);
                                    $segundos = $gpxArray['duration'] - ($horas * 3600) - ($minutos * 60);

                                    echo $horas . 'h : ' . $minutos . 'min';
                                    ?>
                    </div>
                </div>

                <div style="float: left; position: relative;">
                    <h3>Rutas sugeridas</h3>
                    <br>
                    <div id="rutasRecomendadas">
                    </div>
                </div>
            </div>
            <br>
        </div>
    </main>
    <script src="../js/rutasRecomendadas.js"></script>
    <script>
        rutasRecomendadas(1);
    </script>
    <script>
        let map = L.map('mapa').setView([<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>], 11);

        L.tileLayer('https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=817534cc1dfa4813b498960345425794', {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.thunderforest.com/terms/">ThunderForest</a>'
        }).addTo(map);
        let icono = L.icon({
            iconUrl: `../marcadores/<?php echo $result['activity'] ?>.png`,
            iconSize: [30, 40],
            iconAnchor: [15, 40],
            popupAnchor: [0, -20]
        });
        let marker = L.marker([<?php echo $result['start_lat']; ?>, <?php echo $result['start_lon']; ?>], {
            icon: icono
        }).addTo(map);


        var polyline = L.polyline(<?php echo json_encode($arrayPuntos); ?>, {
            color: 'black'
        }).addTo(map);
    </script>
<?php
} else {
    echo '
    <main>
        <center>
            <br>
            <h1>No existe esta ruta</h1>
            <img src="../img/computer-drinking.gif" id="trabajando"
        </center>
    </main>';
}
?>