let ruta = document.getElementById('ruta');
let errorRuta = document.getElementById('errorRuta');
ruta.addEventListener("input", rutaError);

function rutaError() {
    let errorEnRuta = false;
    if (ruta.value == '') {
        errorRuta.classList.add('error');
        errorRuta.textContent = 'El nombre es obligatorio';
        errorEnRuta = true;
    } else {
        errorRuta.classList.remove('error');
        errorRuta.textContent = '';
    }
    return errorEnRuta;
}


let descripcion = document.getElementById('descripcion');
let errorDescripcion = document.getElementById('errorDescripcion');
descripcion.addEventListener("input", descripcionError);

function descripcionError() {
    let errorEnDescripcion = false;
    if (descripcion.value == '') {
        errorDescripcion.classList.add('error');
        errorDescripcion.textContent = 'La descripcion es obligatoria';
        errorEnDescripcion = true;
    } else {
        errorDescripcion.classList.remove('error');
        errorDescripcion.textContent = '';
    }
    return errorEnDescripcion;
}


let intensidad = document.getElementById('intensidad');
let errorIntensidad = document.getElementById('errorIntensidad');
intensidad.addEventListener("input", intensidadError);

function intensidadError() {
    let errorEnIntensidad = false;
    if (intensidad.value == '') {
        errorIntensidad.classList.add('error');
        errorIntensidad.textContent = 'La intensidad es obligatoria';
        errorEnIntensidad = true;
    } else {
        errorIntensidad.classList.remove('error');
        errorIntensidad.textContent = '';
    }
    return errorEnIntensidad;
}


let actividad = document.getElementById('actividad');
let errorActividad = document.getElementById('errorActividad');
actividad.addEventListener("input", actividadError);

function actividadError() {
    let errorEnActividad = false;
    if (actividad.value == '') {
        errorActividad.classList.add('error');
        errorActividad.textContent = 'La actividad es obligatoria';
        errorEnActividad = true;
    } else {
        errorActividad.classList.remove('error');
        errorActividad.textContent = '';
    }
    return errorEnActividad;
}


let gpx = document.getElementById('gpx');

let errorGpx = document.getElementById('errorGpx');
gpx.addEventListener("input", gpxError);

function gpxError() {
    let errorEnGpx = false;
    if (gpx.value == '') {
        errorGpx.classList.add('error');
        errorGpx.textContent = 'La gpx es obligatoria';
        errorEnGpx = true;
    } else {
        errorGpx.classList.remove('error');
        errorGpx.textContent = '';
    }
    return errorEnGpx;
}



document.getElementById('subirRuta').addEventListener('click', (e) => {
    e.preventDefault();
    let errores = rutaError();
    errores = descripcionError() || errores;
    errores = intensidadError() || errores;
    errores = actividadError() || errores;
    errores = gpxError() || errores;

    if (!errores) {
        // let data = new FormData();
        // data.append('file', gpx);
        let input = document.querySelector('input[type="file"]');
        let data = new FormData();
        data.append('file', input.files[0]);

        let circular = true
        if (document.getElementById('lineal').checked) {
            circular = false;
        }
        // console.log(descripcion.value.replace(/(?:\r\n|\r|\n)/g, '<br>'));
        let descripcionTxt = descripcion.value.replace(/(?:\r\n|\r|\n)/g, '<br>').normalize('NFD').replace(/[\u0300-\u036f]/g, "");
        let nombre = ruta.value.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
        // console.log(descripcionTxt);

        let elementos = {
            "route_name": nombre,
            "user": sessionStorage.getItem('id'),
            "desc": descripcionTxt,
            "intensity": intensidad.value,
            "activity": actividad.value,
            "circular": circular,
        }
        console.log(JSON.stringify(elementos));

        //envio los datos en la cabezera pq es necesario enviar el gpx en el body
        fetch('../api/routes/', {
            method: 'POST',
            headers: {
                'Authorization': `${sessionStorage.getItem('token')}`,
                'Data': JSON.stringify(elementos)
            },
            body: data
        }).then((response) => {
            // console.log(response);
            return response.json();
        })
            .then(function (data) {
                // console.log(data);
                if (data['success']) {
                    window.location = "misRutas.php?rutaCreada=1";
                } else {
                    let errorFormulario = document.getElementById('errorFormulario');
                    errorFormulario.textContent = data['msg'];
                    errorFormulario.classList.add('errorGrande');
                }
            })
    }
});