<?php
require_once('../clases/conexion.php');

$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['username'])) {

        $sql = "SELECT username from usuarios WHERE username = '{$_GET['username']}'";

        try {
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            if ($result == null) {
                header("HTTP/1.1 200 Success");
                header("Content-Type: application/json");
                echo json_encode([
                    'username' => $_GET['username'],
                    'exists' => false
                ]);
            } else {
                header("HTTP/1.1 200 Success");
                echo json_encode([
                    'username' => $_GET['username'],
                    'exists' => true
                ]);;
            }
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not found");
            echo json_encode([
                'success' => false,
                'msg' => "Error en la comprobacion de usuarios"
            ]);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "No se ha indicado el nombre del parámetro"
        ]);
    }
    exit;
}
