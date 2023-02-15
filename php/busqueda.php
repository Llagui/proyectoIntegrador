<main>
    <div class="rojo" id="barraBusqueda">
        <form action="#" method="post" id="formBusquedaPequeño">
            <div id="buscar">
                <input type="submit" value="" class="azul " id="circulo">
                <input type="image" src="../Iconos/search.svg" class="iconoPequeño" id="lupa">
                <?php
                if (isset($_GET['name']) && $_GET['name'] != '') {
                    echo '<input id="busqueda" value="' . $_GET["name"] . '">';
                } else {
                    echo '<input id="busqueda">';
                }
                ?>

            </div>

            <div class="scrollmenu">
                <select name="ordenar" id="ordenar" class="boton azul" class="hs-firstname">
                    <option value="" selected>Ordenar por</option>
                    <option value="distancia+">&#129045; Distancia</option>
                    <option value="distancia-">&#129047; Distancia</option>
                    <option value="intensidad+">&#129045; Intensidad</option>
                    <option value="intensidad-">&#129047; Intensidad</option>
                    <option value="desnivel+">&#129045; Desnivel</option>
                    <option value="desnivel-">&#129047; Desnivel</option>
                </select>
                <select name="distancia" id="distancia" class="boton azul">
                    <option value="" style="border:solid 20px" selected>Distancia</option>
                    <option value="&min_dist=0&max_dist=10000">0km - 10 km</option>
                    <option value="&min_dist=10000&max_dist=20000">10km - 20km</option>
                    <option value="&min_dist=20000&max_dist=50000">20km - 50km</option>
                    <option value="&min_dist=50000">50km - ∞km</option>
                </select>
                <select name="intensidad" id="intensidad" class="boton azul">
                    <option value="" selected>Intensidad</option>
                    <option value="0">Sencilla</option>
                    <option value="1">Baja</option>
                    <option value="2">Media</option>
                    <option value="3">Alta</option>
                    <option value="4">Muy alta</option>
                </select>
                <select name="tipo" id="tipo" class="boton azul">
                    <option value="" selected>Tipo</option>
                    <option value="true">Circular</option>
                    <option value="false">Lineal</option>
                </select>
                <select name="desnivel" id="desnivel" class="boton azul">
                    <option value="" selected>Desnivel</option>
                    <option value="&min_slope=0&max_slope=1000">0m - 1km</option>
                    <option value="&min_slope=1000&max_slope=5000">1km - 5km</option>
                    <option value="&min_slope=5000&max_slope=10000">5km - 10km</option>
                    <option value="&min_slope=10000">10km - ∞km</option>
                </select>
                <select name="actividad por" id="actividad" class="boton azul">
                    <option value="">Actividad</option>
                    <?php
                    $actividades = ['Senderismo', 'Ciclismo', 'Correr', 'Alpinismo'];
                    foreach ($actividades as $key => $value) {
                        if (isset($_GET['activity']) && $_GET['activity'] == strtolower($value)) {
                            echo "<option selected>{$value}</option>";
                        } else {
                            echo "<option>{$value}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </form>
    </div>


    <div id="resultados">
        <div id="mapa"></div>
        <div id="rutas">
            <!-- <a class="link" href="detalleRuta.php">
                <div class="rutaRecomendada" onclick="">
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
            </a>
            <a class="link" href="detalleRuta.php">
                <div class="rutaRecomendada" onclick="">
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
            </a>
            <a class="link" href="detalleRuta.php">
                <div class="rutaRecomendada" onclick="">
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
            </a>
            <a class="link" href="detalleRuta.php">
                <div class="rutaRecomendada" onclick="">
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
            </a>
            <a class="link" href="detalleRuta.php">
                <div class="rutaRecomendada" onclick="">
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
            </a> -->
        </div>


    </div>

</main>
<script src="../js/mapa.js"></script>
<script src="../js/buscar.js"></script>
<script>
    document.getElementById('lupa').click();
</script>