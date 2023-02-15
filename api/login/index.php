<?php
require '../vendor/autoload.php';
require_once('../clases/conexion.php');

use Firebase\JWT\JWT;

$con = new Conexion();
$key = 'This 1s S3cr3T!';
$issuer = 'localhost';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'), true);

    if (isset($json['username']) && isset($json['pass'])) {
        $pass = hash('sha512', $json['pass']);
        $sql = "SELECT id from usuarios WHERE username = '{$json['username']}' AND pass = '{$pass}'";

        try {
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            if ($result) {
                $id = $result[0]['id'];
                $payload = [
                    'iss' => $issuer,
                    'user' => $id
                ];
                $jwt = JWT::encode($payload, $key, 'HS256');

                header("HTTP/1.1 200 Success");
                header("Content-Type: application/json");
                echo json_encode([
                    'success' => true,
                    'id' => $id,
                    'token' => $jwt
                ]);
            } else {
                header("HTTP/1.1 401 Session Error");
                echo json_encode([
                    'success' => false,
                    'msg' => "Datos de sesión incorrectos",
                ]);
            }
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not Found");
            echo json_encode([
                'success' => false,
                'msg' => "No se encuentra el usuario. Inténtelo de nuevo más tarde",
            ]);
        }
    } else {
        header("HTTP/1.1 403 Error");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "Campo requerido vacío",
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
