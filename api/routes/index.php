<?php
require_once('../clases/conexion.php');


$con = new Conexion();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM rutas WHERE 1 ";
    if (isset($_GET['name'])) {
        $sql .= "AND name like '%{$_GET['name']}%' ";
    }

    if (isset($_GET['min_dist'])) {
        $sql .= "AND distance > {$_GET['min_dist']} ";
    }

    if (isset($_GET['max_dist'])) {
        $sql .= "AND distance < {$_GET['max_dist']} ";
    }

    if (isset($_GET['min_slope'])) {
        $sql .= "AND (max_height - min_height) > {$_GET['min_slope']} ";
    }

    if (isset($_GET['max_slope'])) {
        $sql .= "AND (max_height - min_height) < {$_GET['max_slope']} ";
    }

    // Circular (true 1|false 0)
    if (isset($_GET['circular'])) {
        $sql .= "AND circular = {$_GET['circular']} ";
    }

    // User (identificador del usuario)
    if (isset($_GET['user'])) {
        $sql .= "AND user = {$_GET['user']} ";
    } 
    // echo $sql;
    try {
        $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

        if ($result != null) {
            header("HTTP/1.1 200 Success");
            header("Content-Type: application/json");
            echo json_encode($result);
        } else {
            header("HTTP/1.1 404 Not found");
            echo json_encode([
                'success' => false,
                'msg' => "No se encuentra la ruta. Inténtelo de nuevo más tarde",
            ]);
        }
    } catch (mysqli_sql_exception $e) {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode([
            'success' => false,
            'msg' => "Datos de ruta incorrectos",
        ]);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    header("Content-Type: application/json");
    echo json_encode([
        'success' => false,
        'msg' => "Id no enviado",
    ]);

    exit;
}
