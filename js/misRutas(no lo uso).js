fetch(`../api/routes?user=${sessionStorage.getItem('id')}`, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json;charset=utf-8',
        'Authorization': `${sessionStorage.getItem('token')}`,
    },
}).then(response => {
    // if (response.status == 200) {
    // console.log(response);
    return response.json();
    // }
}).then(function (data) {
    // console.log(data);
    data.forEach(element => {
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
                        <div>Desnivel:${element.max_height - element.min_height}m</div>
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
            `;
    });
    if (data[0] == null) {
        document.getElementById('rutas').innerHTML = `
            <center>
                <br>
                 <p>Parece que no has subido rutas. Súbelas para que aparezcan aquí.</p>
                 <img src="../img/computer-drinking.gif" id="trabajando">
            </center>
        `;
    }


});