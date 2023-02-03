let botonBusqueda = document.getElementById('circulo');
let nombre = document.getElementById('busqueda');
// let ordenar = document.getElementById('ordenar');
// let distancia = document.getElementById('distancia');
// let tipo = document.getElementById('tipo');
// let desnivel = document.getElementById('desnivel');
// let actividad = document.getElementById('actividad');

botonBusqueda.addEventListener('click', (e) => {
    e.preventDefault();
    let ruta = 'http://localhost:3000/api/route?'

    ruta += (nombre.value == '') ? '' : `&name=${nombre.value}`;
    // ruta += (ordenar.value == null ) ? '': `&order=${ordenar.value}`;
    // ruta += (distancia.value == null ) ? '': `&name=${distancia.value}`;
    // ruta += (tipo.value == null ) ? '': `&name=${tipo.value}`;
    // ruta += (desnivel.value == null ) ? '': `&name=${desnivel.value}`;
    // ruta += (actividad.value == null ) ? '': `&name=${actividad.value}`;
    // ruta += (nombre.value == null ) ? '': `&name=${nombre.value}`;

    fetch(ruta, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Authorization': `${sessionStorage.getItem('token')}`,
        },
    }).then((response) => response.json())
        .then(function (data) { 
            console.log(data);
        //     document.getElementById('rutas').innerHTML +=`
        //     <a class="link" href="detalleRuta.php">
        //     <div class="rutaRecomendada" onclick="">
        //         <img src="../img/pexels-rachel-claire-4997850.jpg" alt="" class="imagenPrincipal">
        //         <img src="../img/pexels-vanessa-garcia-6324457.jpg" alt="" class="imagenSegunda">
        //         <img src="../img/pexels-vanessa-garcia-6324238.jpg" alt="" class="imagenTercera">

        //         <div class="tituloPequeño titulo">Sendero de O Monte</div>
        //         <div class=" corazones"><img src="../Iconos/suit-heart-fill.svg" alt="" class="iconoPequeño">&nbsp;&nbsp;3214</div>

        //         <div class="caract1">
        //             <div>Distancia: 5km</div>
        //             <div>Intensidad: Media</div>
        //         </div>
        //         <div class="caract2">
        //             <div>Tipo: Circular</div>
        //             <div>Desnivel: 100m</div>
        //         </div>
        //     </div>
        // </a>`
        })
});

/*******************************************************************
 * //COMPROBAR SI TOKEN ES VALIDO EN APP
 * 
 * // PONER STATUS EN RESPONSE EN TODOS LOS FETCH
 */


// let btn = document.getElementById('genRutas')
// btn.addEventListener('click', inicio)

// function inicio(event) {
//     event.preventDefault();

//     fetch(`http://localhost:5000/api/route`, {
        
//     })

//         .then(response => {
//             switch (response.status) {
//                 case 200:
//                     console.log("SACASTE LAS RUTAS");
//                     return response.json();
//                     break;
//                 case 401:
//                     console.log("NO PUEDES INICIAR SESION");
//             }
//         })

//         .then(data => {
//             console.log(data);
//             let divRutas =document.getElementById('rutas')
//             let str = "";
//             data.forEach(element => {
//                 let nombre = element.route_name;
//                 let distancia = element.distance
//                 // str += `<h1>${nombre}</h1>`;
//                 str += `
//                 <table>
//                     <tr>
//                         <th colspan='2' id='tablaRutas'>IMAGEN</th>
//                     </tr>
//                     <tr>
//                         <td id='tablaRutas'>${nombre}</td>
//                         <td id='tablaRutas'>${distancia}</td>
//                     </tr>
//                     <tr>
//                         <th colspan='2' id='tablaRutas'>VER DETALLES</th>
//                     </tr>
//                 </table>
//                 `
//             });
//             divRutas.innerHTML = str
//         })

// }
