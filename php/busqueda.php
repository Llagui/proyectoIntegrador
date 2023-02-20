<main>
    <div class="rojo" id="barraBusqueda">
        <!-- Formulario de busqueda de rutas -->
        <form action="#" method="post" id="formBusquedaPequeño">
            <!-- Filtrado por nombre -->
            <div id="buscar">
                <input type="submit" value="" class="azul " id="circulo">
                <input type="image" src="../Iconos/search.svg" class="iconoPequeño" id="lupa" alt="lupa">
                <?php
                // Esta aqui por la lupa en la pantalla de inicio para que 'autofiltre'
                if (isset($_GET['name']) && $_GET['name'] != '') {
                    echo '<input id="busqueda" value="' . $_GET["name"] . '">';
                } else {
                    echo '<input id="busqueda">';
                }
                ?>
            </div>
            <!-- Resto de filtros -->
            <div class="scrollmenu">
                <select name="ordenar" id="ordenar" class="boton azul">
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
                    // Esta aqui por los enlaces en la pantalla de inicio para que 'autofiltre'
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
        <!-- Aqui saldra el mapa -->
        <div id="mapa"></div>
        <!-- Aqui aparecen las rutas que se generan por las consultas a la API -->
        <div id="rutas">
        </div>
    </div>
</main>

<script src="../js/mapa.js"></script>
<script src="../js/buscar.js"></script>
<script>
    // Click para que se auto lance la pagina
    document.getElementById('lupa').click();
</script>