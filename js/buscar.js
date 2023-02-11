document.getElementById('circulo').addEventListener('click', (e) => busqueda(e));

let lupa = document.getElementById('lupa');
lupa.addEventListener('click', (e) => busqueda(e));

let nombre = document.getElementById('busqueda');

//los filtros (menos el de nombre) saltan automaticamente pues no hay un boton de aplicar filtros
let ordenar = document.getElementById('ordenar');
//para que la ordenacion sea instantanea
if (ordenar != null) {
    ordenar.addEventListener('input', (e) => {
        lupa.click();
    });
}


let distancia = document.getElementById('distancia');
//para que la busqueda sea instantanea
if (distancia != null) {
    distancia.addEventListener('input', (e) => {
        lupa.click();
    });
}

let intensidad = document.getElementById('intensidad');
//para que la busqueda sea instantanea
if (intensidad != null) {
    intensidad.addEventListener('input', (e) => {
        lupa.click();
    });
}

let tipo = document.getElementById('tipo');
//para que la busqueda sea instantanea
if (tipo != null) {
    tipo.addEventListener('input', (e) => {
        lupa.click();
    });
}

let desnivel = document.getElementById('desnivel');
//para que la busqueda sea instantanea
if (desnivel != null) {
    desnivel.addEventListener('input', (e) => {
        lupa.click();
    });
}

let actividad = document.getElementById('actividad');
//para que la busqueda sea instantanea
if (actividad != null) {
    actividad.addEventListener('input', (e) => {
        lupa.click();
    });
}

let todasRutas;
let mostrarDesde = 0;
let pagina = document.documentElement;
let rutas = document.getElementById('rutas');
let creandoImagenes = false;
let rutasMapa = [];

if (rutas != null) {
    rutas.addEventListener("scroll", createRoutes);
}

function busqueda(e) {
    e.preventDefault();
    if (rutas != null) {
        rutas.innerHTML = '';
    }

    mostrarDesde = 0;
    let ruta = '../api/routes/?';
    // console.log(window.globalThis.location );
    if (window.globalThis.location.pathname == '/proyecto%20Integrador/php/index.php' || window.globalThis.location.pathname == '/proyecto%20Integrador/php/') {
        window.location = `./busqueda.php?name=${nombre.value}`;
    } else if (window.globalThis.location.pathname == '/proyecto%20Integrador/php/misRutas.php') {
        ruta += `user=${sessionStorage.getItem('id')}`;
    }
    ruta += (nombre.value == '') ? '' : `&name=${nombre.value}`;
    // ruta += (ordenar.value == '') ? '' : `&order=${ordenar.value}`;
    ruta += (distancia.value == '') ? '' : `${distancia.value}`;
    ruta += (tipo.value == '') ? '' : `&circular=${tipo.value}`;
    ruta += (desnivel.value == '') ? '' : `${desnivel.value}`;
    ruta += (actividad.value == '') ? '' : `&activity=${actividad.value}`;
    ruta += (intensidad.value == '') ? '' : `&intensity=${intensidad.value}`;

    // console.log(ruta);
    fetch(ruta, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Authorization': `${sessionStorage.getItem('token')}`,
        },
    }).then(response => {
        // console.log(response);
        // if (response.status == 200) {
        return response.json();
        // }
    }).then(function (data) {
        // console.log(data);
        if (data.length >= 2) {
            switch (ordenar.value) {
                case 'distancia+':
                    data = data.sort((a, b) => b.distance - a.distance);
                    break;
                case 'distancia-':
                    data = data.sort((a, b) => a.distance - b.distance);
                    break;
                case 'desnivel+':
                    data = data.sort((a, b) => (b.max_height - b.min_height) - (a.max_height - a.min_height));
                    break;
                case 'desnivel-':
                    data = data.sort((a, b) => (a.max_height - a.min_height) - (b.max_height - b.min_height));
                    break;
                case 'intensidad+':
                    data = data.sort((a, b) => b.intensity - a.intensity);
                    break;
                case 'intensidad-':
                    data = data.sort((a, b) => a.intensity - b.intensity);
                    break;
            }
        }

        rutasMapa.forEach(marcador => {
            marcador.remove();
        });
        todasRutas = data;

        createRoutes();
    });
}

function createRoutes() {

    if ((rutas.scrollTop + rutas.clientHeight) > (rutas.scrollHeight - 50) && !creandoImagenes) {
        creandoImagenes = true;
        // console.log(todasRutas);
        // console.log(mostrarDesde);
        if (todasRutas.length > 0) {
            todasRutas.filter((_, index) => (index < mostrarDesde + 5 && index >= mostrarDesde))
                .forEach(element => {
                    let intensidad;
                    switch (element.intensity) {
                        case '0':
                            intensidad = 'Sencilla';
                            break;
                        case '1':
                            intensidad = 'Baja';
                            break;
                        case '2':
                            intensidad = 'Media';
                            break;
                        case '3':
                            intensidad = 'Alta';
                            break;
                        case '4':
                            intensidad = 'Muy alta';
                            break;
                    }

                    //Sqgun donde este varia la forma de mostrar las rutas
                    if (window.globalThis.location.pathname != '/proyecto%20Integrador/php/misRutas.php') {
                        document.getElementById('rutas').innerHTML += `
                            <a class="link" href="detalleRuta.php?id=${element.id}">
                            <div class="rutaRecomendada" onclick="">
                                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">
                
                                <div class="tituloPequeño titulo">${element.route_name}</div>
                                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                
                                <div class="caract1">
                                    <div>Distancia: ${(element.distance / 1000).toFixed(2)}km</div>
                                    <div>Intensidad: ${intensidad}</div>
                                </div>
                                <div class="caract2">
                                    <div>Tipo: ${(element.circular == 1) ? 'Circular' : 'Lineal'}
                                    </div>
                                    <div>Desnivel: ${element.slope}m</div>
                                </div>
                            </div>
                            </a>
                            <br>`;

                        let marker = L.marker([element.start_lat, element.start_lon]).addTo(map);
                        marker.bindPopup(`<a class='link' href='detalleRuta.php?id=${element.id}'>${element.route_name}</a>`);
                        rutasMapa.push(marker);

                    } else {
                        document.getElementById('rutas').innerHTML += `
                            <div class="rutaRecomendada azul" onclick="">
                                <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
                                <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
                                <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">
                
                                <div class="tituloPequeño titulo">${element.route_name}</div>
                                <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>
                                <div class="descripcion">
                                ${element.desc}
                                </div>
                                <div class="caract1">
                                    <div>Distancia: ${(element.distance / 1000).toFixed(2)}km</div>
                                    <div>Intensidad: ${intensidad}</div>
                                </div>
                                <div class="caract2">
                                    <div>Tipo: ${element.circular ? 'Circular' : 'Lineal'}</div>
                                    <div>Desnivel:${element.slope}m</div>
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
                            </div>`;
                    }

                });
            mostrarDesde += 5;

        } else {
            if (window.globalThis.location.pathname != '/proyecto%20Integrador/php/misRutas.php') {
                document.getElementById('rutas').innerHTML += `<p>No hay niguna ruta que coincida con sus criterios de busqueda</p>`;
            } else {
                document.getElementById('rutas').innerHTML = `
                    <center>
                        <br>
                        <p>Parece que no has subido rutas. Súbelas para que aparezcan aquí.</p>
                        <img src="../img/computer-drinking.gif" id="trabajando">
                    </center>`;
            }
        }
        creandoImagenes = false;
    }
}

