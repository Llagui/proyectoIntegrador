<main>
    <div class="rojo" id="barraBusqueda">
        <form action="#" method="post" id="formBusquedaPequeño">
            <div id="buscar">
                <input type="submit" value="" class="azul " id="circulo">
                <input type="image" src="../Iconos/search.svg" class="iconoPequeño" id="lupa">
                <?php
                if($_GET != null && $_GET['name'] != '') {
                    echo'<input id="busqueda" value="'.$_GET["name"].'">';
                }else{
                    echo'<input id="busqueda">';
                }
                ?>
                
            </div>

            <div class="scrollmenu">
                <select name="ordenar" id="ordenar" placeholder="" class="boton azul" class="hs-firstname">
                    <option value="" selected >Ordenar por</option>
                    <!-- No funcionan con la api actual -->
                    <option value="distance">Distancia</option>
                    <option value="distance">Intensidad</option>
                    <option value="distance">Desnivel</option>
                </select>
                <select name="distancia" id="distancia" class="boton azul">
                    <option value="" selected >Distancia</option>
                    <option value="&min_dist=0&max_dist=10000">0km - 10 km</option>
                    <option value="&min_dist=10000&max_dist=20000">10km - 20km</option>
                    <option value="&min_dist=20000&max_dist=50000">20km - 50km</option>
                    <option value="&min_dist=50000">50km - ∞km</option>
                </select>
                <select name="intensidad" id="intensidad" placeholder="Ordenar por" class="boton azul">
                    <option value="" selected >Intensidad</option>
                    <!-- No funcionan con la api actual -->
                    <option value="">Baja</option>
                    <option value="">Media</option>
                    <option value="">Alta</option>
                    <option value="">Muy alta</option>
                </select>
                <select name="tipo" id="tipo" class="boton azul">
                    <option value="" selected >Tipo</option>
                    <option value="true">Circular</option>
                    <option value="false">Lineal</option>
                </select>
                <select name="desnivel" id="desnivel" placeholder="Ordenar por" class="boton azul">
                    <option value="" selected >Desnivel</option>
                    <option value="&min_slope=0&max_slope=1000">0m - 1km</option>
                    <option value="&min_slope=1000&max_slope=5000">1km - 5km</option>
                    <option value="&min_slope=5000&max_slope=10000">5km - 10km</option>
                    <option value="&min_slope=10000">10km - ∞km</option>
                </select>
                <select name="actividad por" id="actividad" placeholder="Ordenar por" class="boton azul">
                    <option value="">Actividad</option>
                    <!-- No funcionan con la api actual -->
                    <option value="">Senderismo</option>
                    <option value="">Ciclismo</option>
                    <option value="">Correr</option>
                    <option value="">Montañismo</option>
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