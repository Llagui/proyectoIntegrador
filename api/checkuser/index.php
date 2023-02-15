<?php
require_once('../clases/conexion.php');

$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['username'])) {
        $sql = "SELECT username from usuarios WHERE username = '{$_GET['username']}'";

        try {
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            if (!$result) {
                header("HTTP/1.1 200 OK");
                header("Content-Type: application/json");
                echo json_encode([
                    'success' => true,
                    'exists' => false
                ]);
            } else {
                header("HTTP/1.1 200 OK");
                echo json_encode([
                    'success' => true,
                    'exists' => true
                ]);;
            }
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not Found");
            echo json_encode([
                'success' => false,
                'msg' => "Error en la comprobacion de usuarios"
            ]);
        }
    } else {
        header("HTTP/1.1 403 Error");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "Nombre no indicado"
        ]);
    }
    exit;
}else {
    header("HTTP/1.1 400 Bad Request");
    header("Content-Type: application/json");
    echo json_encode([
        'success' => false,
        'msg' => "Metodo incorrecto para llamada"
    ]);
}
