<script>
    if (sessionStorage.getItem("usuario") == null) {
        window.location = "index.php";
    }
</script>
<main>
    <center>
        <h1>Mis rutas</h1>
        <a href="http://localhost:3000/form">
            <button class="boton rojo"><img src="../Iconos/signpost-split-fill.svg" alt="" class="iconoPequeño">&nbsp;Subir ruta(nf)</button>
        </a>
    </center>
    <br>
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
<script src="../js/misRutas.js"></script>