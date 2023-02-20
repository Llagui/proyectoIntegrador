// Funcion que devuelve los datos de n numero de rutas al azar
function rutasRecomendadas(num, id = 0) {
    fetch('../api/routes/', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Authorization': `${sessionStorage.getItem('token')}`,
        },
    }).then(response => {
        return response.json();

    }).then(function (data) {
        // Des organizacion de rutas
        let datos = data['rutas'].filter(ruta => ruta.id != id).sort(() => 0.5 - Math.random());

        // Imprecion de rutas
        datos.slice(0, num).forEach(element => {
            let intensidad;
            // traduccion de intensidad a letras
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
            document.getElementById("rutasRecomendadas").innerHTML += `
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
                </a>`;
        });

    })
}
