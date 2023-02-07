document.getElementById('circulo').addEventListener('click', (e) => busqueda(e));

let lupa = document.getElementById('lupa');
lupa.addEventListener('click', (e) => busqueda(e));

let nombre = document.getElementById('busqueda');
let ordenar = document.getElementById('ordenar');
let distancia = document.getElementById('distancia');
let tipo = document.getElementById('tipo');
let desnivel = document.getElementById('desnivel');
let actividad = document.getElementById('actividad');
let todasRutas;

let mostrarDesde = 0;
let pagina = document.documentElement;
let rutas = document.getElementById('rutas');
let creandoImagenes = false;
if (rutas != null) {
    rutas.addEventListener("scroll", createRoutes);
}

function busqueda(e) {
    e.preventDefault();
    if (rutas != null) {
        rutas.innerHTML = '';
    }

    mostrarDesde = 0;
    let ruta = 'http://localhost:3000/api/route?';
    console.log(window.globalThis.location);
    if (window.globalThis.location.pathname == '/proyecto%20Integrador/php/') {
        window.location = `./busqueda.php?&name=${nombre.value}`;
    } else {
        ruta += (nombre.value == '') ? '' : `&name=${nombre.value}`;
        ruta += (ordenar.value == '') ? '' : `&order=${ordenar.value}`;
        ruta += (distancia.value == '') ? '' : `${distancia.value}`;
        ruta += (tipo.value == '') ? '' : `&circular=${tipo.value}`;
        ruta += (desnivel.value == '') ? '' : `${desnivel.value}`;
        ruta += (actividad.value == '') ? '' : `&activity=${actividad.value}`;
    }
    // console.log(ruta);
    fetch(ruta, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Authorization': `${sessionStorage.getItem('token')}`,
        },
    }).then(response => {
        if (response.status == 200) {
            return response.json();
        }
    }).then(function (data) {
        todasRutas = data;
        createRoutes();
    });
}

function createRoutes() {
    if ((rutas.scrollTop + rutas.clientHeight) > (rutas.scrollHeight - 50) && !creandoImagenes) {
        creandoImagenes = true;
        todasRutas.filter((_, index) => {
            return (index < mostrarDesde + 5 && index >= mostrarDesde);
        })
            .forEach(element => {
                // console.log(element);
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
                        <div>Intensidad: Media</div>
                    </div>
                    <div class="caract2">
                        <div>Tipo: ${element.circular ? 'Circular' : 'Lineal'}
                        </div>
                        <div>Desnivel: ${element.max_height - element.min_height}m</div>
                    </div>
                </div>
                </a>`;
                let marker = L.marker([element.start_lat, element.start_lon]).addTo(map);
                marker.bindPopup(element.route_name);
            });
        mostrarDesde += 5;
        creandoImagenes = false;
    }
}
