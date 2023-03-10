<?php
// Devuelve todos los datos de una ruta(pasandole su id)
require '../vendor/autoload.php';
require_once('../clases/conexion.php');

use phpGPX\phpGPX;

$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $sql = "SELECT * from rutas WHERE id = '{$_GET['id']}'";
        try {
            $gpxArray = [];
            $arrayPuntos = [];
            $user = [];
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC)[0];

            if ($result) {
                // Selccionar el usuario que subio la ruta
                $sql2 = "SELECT username from usuarios WHERE id = '{$result['user']}'";
                $user = @$con->query($sql2)->fetch_all(MYSQLI_ASSOC)[0];

                //Recorrer el gpx asociado y sacar las estadisticas secundarias
                $gpx = new phpGPX();
                $file = $gpx->load($result['gpx']);
                foreach ($file->tracks as $track) {
                    $gpxArray = $track->stats->toArray();
                }

                // array con los puntos
                $puntos = (array) $file->tracks[0]->segments[0]->points;
                $pos = 0;
                foreach ($puntos as $sample_point) {
                    $arrayPuntos[$pos][] = $sample_point->latitude;
                    $arrayPuntos[$pos][] = $sample_point->longitude;
                    $pos++;
                }

                header("HTTP/1.1 200 Success");
                header("Content-Type: application/json");
                echo json_encode([
                    'success' => true,
                    'ruta' => json_encode($result),
                    'estadisticas' => json_encode($gpxArray),
                    'puntos' => json_encode($arrayPuntos),
                    'usuario' => json_encode($user),
                ]);
            } else {
                header("HTTP/1.1  401 Route Error");
                echo json_encode([
                    'success' => false,
                    'msg' => "La ruta no existe",
                ]);
            }
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not found ");
            echo json_encode([
                'success' => false,
                'msg' => "No se encuentra la ruta. Int??ntelo de nuevo m??s tarde",
            ]);
        }
    } else {
        header("HTTP/1.1 403 Error");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "Id no enviado",
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
