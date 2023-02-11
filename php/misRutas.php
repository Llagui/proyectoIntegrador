<script>
    if (sessionStorage.getItem("usuario") == null) {
        window.location = "index.php";
    }
</script>
<main>
    <center>
        <h1 id="tituloMisRutas">Mis rutas</h1>
        <?php
        if(isset($_GET['rutaCreada'])){
            echo"<div id='exito'>Se ha creado la ruta</div>";
        }
        ?>
        <a href="subirRuta.php">
            <button class="boton rojo"><img src="../Iconos/signpost-split-fill.svg" alt="" class="iconoPequeño">&nbsp;Subir ruta</button>
        </a>
    </center>
    <br>
    <div id="barraBusqueda"class="misRutas">
        <form action="#" method="post" id="formBusquedaPequeño">
            <div id="buscar">
                <input type="submit" value="" class="azul " id="circulo">
                <input type="image" src="../Iconos/search.svg" class="iconoPequeño" id="lupa">
                <input id="busqueda">
            </div>

            <div class="scrollmenu">
                <select name="ordenar" id="ordenar" placeholder="" class="boton azul" class="hs-firstname">
                    <option value="" selected>Ordenar por</option>
                    <option value="distancia+">&#129045; Distancia</option>
                    <option value="distancia-">&#129047; Distancia </option>
                    <option value="intensidad+">&#129045; Intensidad (nf)</option>
                    <option value="intensidad-">&#129047; Intensidad (nf)</option>
                    <option value="desnivel+">&#129045; Desnivel</option>
                    <option value="desnivel-">&#129047; Desnivel </option>
                </select>
                <select name="distancia" id="distancia" class="boton azul">
                    <option value="" style="border:solid 20px" selected>Distancia</option>
                    <option value="&min_dist=0&max_dist=10000">0km - 10 km</option>
                    <option value="&min_dist=10000&max_dist=20000">10km - 20km</option>
                    <option value="&min_dist=20000&max_dist=50000">20km - 50km</option>
                    <option value="&min_dist=50000">50km - ∞km</option>
                </select>
                <select name="intensidad" id="intensidad" placeholder="Ordenar por" class="boton azul">
                    <option value="" selected>Intensidad(nf)</option>
                    <!-- No funcionan con la api actual -->
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
                <select name="desnivel" id="desnivel" placeholder="Ordenar por" class="boton azul">
                    <option value="" selected>Desnivel</option>
                    <option value="&min_slope=0&max_slope=1000">0m - 1km</option>
                    <option value="&min_slope=1000&max_slope=5000">1km - 5km</option>
                    <option value="&min_slope=5000&max_slope=10000">5km - 10km</option>
                    <option value="&min_slope=10000">10km - ∞km</option>
                </select>
                <select name="actividad por" id="actividad" placeholder="Ordenar por" class="boton azul">
                    <option value="">Actividad</option>
                    <!-- No funcionan con la api actual -->
                    <option>Senderismo</option>
                    <option>Ciclismo</option>
                    <option>Correr</option>
                    <option>Alpinismo</option>
                </select>
            </div>
        </form>
    </div>

    <div id="misRutas">
        <div id="rutas">
            <!-- <div class="rutaRecomendada azul" onclick="">
                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

                <div class="tituloPequeño titulo">Sendero de O Monte</div>
                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                <div class="descripcion">
                    elusdhybgfliuukghvweuirghv
                    w ehtuob2gw 4i4
                    wteh4nvb+j
                </div>
                <div class="caract1">
                    <div>Distancia: 5km</div>
                    <div>Intensidad: Media</div>
                </div>
                <div class="caract2">
                    <div>Tipo: Circular</div>
                    <div>Desnivel: 100m</div>
                </div>
                <div id="botones">
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/pencil-square.svg" alt="" class="iconoPequeño"><span>&nbsp;Modificar</span>(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/trash3-fill.svg" alt="" class="iconoPequeño"><span>&nbsp;Eliminar</span>(nf)
                        </button>
                    </a>
                    <a href="detalleRuta.php?id=${element.id}">
                        <button class="boton rojo">
                            <img src="../Iconos/plus-lg.svg" alt="" class="iconoPequeño"><span>&nbsp;Ver detalle</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="rutaRecomendada azul" onclick="">
                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

                <div class="tituloPequeño titulo">Sendero de O Monte</div>
                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                <div class="descripcion">
                    elusdhybgfliuukghvweuirghv
                    w ehtuob2gw 4i4
                    wteh4nvb+j
                </div>
                <div class="caract1">
                    <div>Distancia: 5km</div>
                    <div>Intensidad: Media</div>
                </div>
                <div class="caract2">
                    <div>Tipo: Circular</div>
                    <div>Desnivel: 100m</div>
                </div>
                <div id="botones">
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/pencil-square.svg" alt="" class="iconoPequeño">&nbsp;Modificar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/trash3-fill.svg" alt="" class="iconoPequeño">&nbsp;Eliminar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/plus-lg.svg" alt="" class="iconoPequeño">&nbsp;Ver detalle
                        </button>
                    </a>
                </div>
            </div>
            <div class="rutaRecomendada azul" onclick="">
                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

                <div class="tituloPequeño titulo">Sendero de O Monte</div>
                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                <div class="descripcion">
                    elusdhybgfliuukghvweuirghv
                    w ehtuob2gw 4i4
                    wteh4nvb+j
                </div>
                <div class="caract1">
                    <div>Distancia: 5km</div>
                    <div>Intensidad: Media</div>
                </div>
                <div class="caract2">
                    <div>Tipo: Circular</div>
                    <div>Desnivel: 100m</div>
                </div>
                <div id="botones">
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/pencil-square.svg" alt="" class="iconoPequeño">&nbsp;Modificar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/trash3-fill.svg" alt="" class="iconoPequeño">&nbsp;Eliminar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/plus-lg.svg" alt="" class="iconoPequeño">&nbsp;Ver detalle
                        </button>
                    </a>
                </div>
            </div>
            <div class="rutaRecomendada azul" onclick="">
                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

                <div class="tituloPequeño titulo">Sendero de O Monte</div>
                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                <div class="descripcion">
                    elusdhybgfliuukghvweuirghv
                    w ehtuob2gw 4i4
                    wteh4nvb+j
                </div>
                <div class="caract1">
                    <div>Distancia: 5km</div>
                    <div>Intensidad: Media</div>
                </div>
                <div class="caract2">
                    <div>Tipo: Circular</div>
                    <div>Desnivel: 100m</div>
                </div>
                <div id="botones">
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/pencil-square.svg" alt="" class="iconoPequeño">&nbsp;Modificar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/trash3-fill.svg" alt="" class="iconoPequeño">&nbsp;Eliminar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/plus-lg.svg" alt="" class="iconoPequeño">&nbsp;Ver detalle
                        </button>
                    </a>
                </div>
            </div>
            <div class="rutaRecomendada azul" onclick="">
                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

                <div class="tituloPequeño titulo">Sendero de O Monte</div>
                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                <div class="descripcion">
                    elusdhybgfliuukghvweuirghv
                    w ehtuob2gw 4i4
                    wteh4nvb+j
                </div>
                <div class="caract1">
                    <div>Distancia: 5km</div>
                    <div>Intensidad: Media</div>
                </div>
                <div class="caract2">
                    <div>Tipo: Circular</div>
                    <div>Desnivel: 100m</div>
                </div>
                <div id="botones">
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/pencil-square.svg" alt="" class="iconoPequeño">&nbsp;Modificar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/trash3-fill.svg" alt="" class="iconoPequeño">&nbsp;Eliminar(nf)
                        </button>
                    </a>
                    <a href="">
                        <button class="boton rojo">
                            <img src="../Iconos/plus-lg.svg" alt="" class="iconoPequeño">&nbsp;Ver detalle
                        </button>
                    </a>
                </div>
            </div> -->
        </div>
    </div>

</main>
<script src="../js/buscar.js"></script>
<script>
    document.getElementById('lupa').click();
</script>