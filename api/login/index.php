<?php
require '../vendor/autoload.php';
require_once('../clases/conexion.php');

use ReallySimpleJWT\Token;

$con = new Conexion();
$secret = 'This 1s S3cr3T!';
$issuer = 'localhost';

$json = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($json['username']) && isset($json['pass'])) {
        // $pass = hash('sha512',$json['pass']);
        $sql = "SELECT id from usuarios WHERE username = '{$json['username']}' AND pass = '{$json['pass']}'";

        try {
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            if ($result != null) {
                $id = $result[0]['id'];
                $token = Token::create($id, $secret, time() + 3600, $issuer);
                header("HTTP/1.1 200 Success");
                header("Content-Type: application/json");
                echo json_encode([
                    'success' => true,
                    'id' => $id,
                    'msg' => "Se ha creado el usuario",
                    'token' => $token
                ]);
            } else {
                header("HTTP/1.1 400 Bad Request");
                echo json_encode([
                    'success' => false,
                    'msg' => "Datos de sesión incorrectos",
                ]);
            }
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not found");
            echo json_encode([
                'success' => false,
                'msg' => "No se encuentra el usuario. Inténtelo de nuevo más tarde",
            ]);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "Alguno de los campos requeridos está vacío",
        ]);
    }
    exit;
}
