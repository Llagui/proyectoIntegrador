<main>
    <!-- Imagen con busqueda -->
    <div id="fondoBusqueda">
        <form action="busqueda.php" method="post">
            <input type="submit" value="" class="azul " id="circulo">
            <input type="image" src="../Iconos/search.svg" class="iconoPequeño" id="lupa" alt="lupa">
            <input id="busqueda" placeholder="Encuentra tu próxima aventura">
        </form>
    </div>

    <section>
        <h2>Rutas recomendadas</h2>
        <!-- Aqui salen las rutas recomendadas -->
        <div id="rutasRecomendadas">
        </div>
    </section>

    <!-- Enlaces busqueda con filtros por actividad -->
    <section style="padding-bottom: 40px;">
        <h2>¿Qué te apetece hacer?</h2>
        <div id="actividades">
            <div class="botonCirculoPequeño rojo" id='moverIzquierda'><img src="../Iconos/caret-left.svg" alt="" class="iconoPequeño"></div>
            <div id="contenedorImagenes">
                <a class="link actividad" href="busqueda.php?activity=senderismo">
                    <div>
                        <img src="../img/senderismo.jpg" alt="">
                        <div class="textoSombra">Senderismo</div>
                    </div>
                </a>
                <a class="link actividad" href="busqueda.php?activity=alpinismo">
                    <div>
                        <img src="../img/montanismo.jpg" alt="">
                        <div class="textoSombra">Alpinismo</div>
                    </div>
                </a>
                <a class="link actividad" href="busqueda.php?activity=correr">
                    <div>
                        <img src="../img/correr.jpg" alt="">
                        <div class="textoSombra">Correr</div>
                    </div>
                </a>
                <a class="link actividad" href="busqueda.php?activity=ciclismo">
                    <div>
                        <img src="../img/ciclismo.jpg" alt="">
                        <div class="textoSombra">Ciclismo</div>
                    </div>
                </a>
            </div>
            <div class="botonCirculoPequeño rojo" id='moverDerecha'><img src="../Iconos/caret-right.svg" alt="" class="iconoPequeño"></div>
        </div>
    </section>

    <section id="venta1" class="azul">
        <img src="../img/personasMovil.jpg" alt="" class="imgGrande">
        <div class="spanDeSpans">
            <h2 class="tituloPequeño">Rutas en la palma de tu mano</h2><br>
            <span class="texto">Todo lo que necesitas para hacer tus rutas favoritas y descubrir otras nuevas lo tienes aquí</span>
        </div>
        <br>
    </section>

    <section id="venta2" class="azul">
        <img src="../img/barbas.jpg" alt="" class="imgGrande">
        <div class="spanDeSpans">
            <h2 class="tituloPequeño">Únete para disfrutar al aire libre sin distrac<wbr>ciones</h2>
            <br>
            <div>
                <a href="busqueda.php">
                    <div class="boton rojo">
                        <img src="../Iconos/router.svg" alt="youtube" class="iconoPequeño">
                        <span>&nbsp;&nbsp;On-Line</span>
                    </div>
                </a>
                <!-- <p></p> -->
                <br>
                <div class="boton rojo">
                    <img src="../Iconos/apple.svg" alt="youtube" class="iconoPequeño">
                    <span>&nbsp;&nbsp;App store</span>
                </div>
                <!-- <p></p> -->
                <br>
                <div class="boton rojo">
                    <img src="../Iconos/google-play.svg" alt="youtube" class="iconoPequeño">
                    <span>&nbsp;&nbsp;Play Store</span>
                </div>
            </div>
        </div>
    </section>
    <br>
    
    <section id="caracteristicas">
        <div>
            <img src="../Iconos/fingerprint.svg" alt="" class="rojo">
            <h2>Registrate</h2>
            <p>Registra fácilmente tu rutas y compártelas con la comunidad</p>
        </div>
        <div>
            <img src="../Iconos/plus-lg.svg" alt="" class="rojo">
            <h2>Crea</h2>
            <p>Convierte tus actividades en historias memorables</p>
        </div>
        <div>
            <img src="../Iconos/suit-heart-fill-black.svg" alt="" class="rojo">
            <h2>Conecta</h2>
            <p>Conoce nuevas rutas y compártelas con la comunidad</p>
        </div>
    </section>

    <section id="comentariosFalsos">
        <h2>¿Qué dice la comunidad?</h2>
        <div class="comentarioFalso">
            <img src="../img/pexels-anastasia-shuraeva-8926952.jpg" alt="">
            <div class="azul">
                Una app imprescindible e imperdible que utilizo todos los días que estoy en la montaña
                <br><br>
                -Ricardo
            </div>
        </div>
        <div class="comentarioFalso">
            <img src="../img/pexels-kampus-production-7787401.jpg" alt="">
            <div class="azul">
                Gracias a esta app he descubierto la zona en la que llevo viviendo 20 años
                <br><br>
                -Elena
            </div>
        </div>
        <div class="comentarioFalso">
            <img src="../img/pexels-lan-yao-13102460.jpg" alt="">
            <div class="azul">
                Su sencillez es increíble, es todo lo que necesito para hacer rutas sin distracciones
                <br><br>
                -Eduardo
            </div>
        </div>
        <div class="comentarioFalso">
            <img src="../img/Looneytunes-roadrunner.webp" alt="">
            <div class="azul">
                ¡Meep! ¡Meep! (Mi app favorita nunca se me acaban las rutas y eso que las hago rápido)
                <br><br>
                -Correcaminos
            </div>
        </div>
    </section>
</main>
<script src="../js/desplazamientoImg.js"></script>
<script src="../js/buscar.js"></script>
<script src="../js/rutasRecomendadas.js"></script>
<script>
    rutasRecomendadas(3);
</script>