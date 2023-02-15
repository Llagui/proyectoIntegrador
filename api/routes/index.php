<?php
require '../vendor/autoload.php';
require_once('../clases/conexion.php');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use phpGPX\phpGPX;

$key = 'This 1s S3cr3T!';
$issuer = 'localhost';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM rutas WHERE 1 ";
    // Filtros para obtener rutas
    if (isset($_GET['name']) && $_GET['name'] != '') {
        $sql .= "AND route_name like '%{$_GET['name']}%' ";
    }

    if (isset($_GET['min_dist'])) {
        $sql .= "AND distance > {$_GET['min_dist']} ";
    }

    if (isset($_GET['max_dist'])) {
        $sql .= "AND distance < {$_GET['max_dist']} ";
    }

    if (isset($_GET['min_slope'])) {
        $sql .= "AND slope > {$_GET['min_slope']} ";
    }

    if (isset($_GET['max_slope'])) {
        $sql .= "AND slope < {$_GET['max_slope']} ";
    }

    // Circular (true 1|false 0)
    if (isset($_GET['circular'])) {
        $sql .= "AND circular = {$_GET['circular']} ";
    }

    if (isset($_GET['intensity'])) {
        $sql .= "AND intensity = {$_GET['intensity']} ";
    }

    // true|false
    if (isset($_GET['activity'])) {
        $sql .= "AND activity = '{$_GET['activity']}' ";
    }

    // User (identificador del usuario)
    if (isset($_GET['user'])) {
        $sql .= "AND user = {$_GET['user']} ";
    }

    try {
        $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

        if ($result != null) {
            header("HTTP/1.1 200 Success");
            header("Content-Type: application/json");
            echo json_encode([
                'success' => true,
                'rutas' => $result
            ]);
        } else {
            header("HTTP/1.1 401 Route Error");
            echo json_encode([
                'success' => false,
                'msg' => "Datos de ruta incorrectos",
            ]);
        }
    } catch (mysqli_sql_exception $e) {
        header("HTTP/1.1 404 Not Found");
        echo json_encode([
            'success' => false,
            'msg' => "No se encuentran las rutas. Inténtelo de nuevo más tarde",
        ]);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $jwt = getallheaders()['Authorization'];
    $decoded = (array) JWT::decode($jwt, new Key($key, 'HS256'));
    //envio los datos en la cabezera pq es necesario enviar el gpx en el body
    $datos = (array) json_decode(getallheaders()['Data']);
    
    if ($decoded['user'] == (int) $datos['user']) {
        $rutaGPX = "../gpx/" . date_timestamp_get(date_create()) . ".gpx";
        
        //creacion gpx
        move_uploaded_file($_FILES['file']['tmp_name'], $rutaGPX);

        // Obtencion de datos del GPX
        $gpx = new phpGPX();
        $file = $gpx->load($rutaGPX);
        $circular = true;
        $gpxArray;
        $primerPunto = (array) $file->tracks[0]->segments[0]->points[0];
        $ultimoPunto = (array) $file->tracks[0]->segments[0]->points[count($file->tracks[0]->segments[0]->points) - 1];
        foreach ($file->tracks as $track) {
            $gpxArray = $track->stats->toArray();
        }

        $sql = "INSERT INTO `rutas`( `route_name`, `distance`, `slope`, `circular`, `start_lat`, `start_lon`, `user`, `desc`, `intensity`, `activity`, `gpx`) VALUES ('{$datos['route_name']}','{$gpxArray['realDistance']}','{$gpxArray['cumulativeElevationGain']}','{$datos['circular']}','{$primerPunto['latitude']}','{$primerPunto['longitude']}','{$datos['user']}','{$datos['desc']}','{$datos['intensity']}','{$datos['activity']}','{$rutaGPX}')";

        try {
            $con->query($sql);
            $id = $con->insert_id;

            header("HTTP/1.1 200 Created");
            header("Content-Type: application/json");
            echo json_encode([
                'success' => true,
                'msg' => "Se ha creado la ruta",
            ]);
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not found");
            echo json_encode([
                'success' => false,
                'msg' => "No se puede registrar la ruta. Inténtelo de nuevo más tarde",
            ]);
        }
    } else {
        header("HTTP/1.1 403 Error");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "Token no valido. Intentelo de nuevo más tarde",
        ]);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    header("Content-Type: application/json");
    echo json_encode([
        'success' => false,
        'msg' => "Metodo incorrecto para llamada"
    ]);
}
