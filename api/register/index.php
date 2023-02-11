<?php
require '../vendor/autoload.php';
require_once('../clases/conexion.php');

use Firebase\JWT\JWT;

$con = new Conexion();

$key = 'This 1s S3cr3T!';
$issuer = 'localhost';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $json = json_decode(file_get_contents('php://input'), true);
    if (isset($json['fullname']) && isset($json['username']) && isset($json['email']) && isset($json['pass'])) {
        $json['activities'] = implode(",", $json['activities']);
        $pass = hash('sha512',$json['pass']);
        $sql = "INSERT INTO usuarios (username, fullname, email, pass, height, weight, birthday, activities) VALUES ('{$json['username']}','{$json['fullname']}','{$json['email']}','{$pass}','{$json['height']}','{$json['weight']}','{$json['birthday']}','{$json['activities']}')";
        // echo $sql;
        try {
            $con->query($sql);
            $id = $con->insert_id;
            $payload = [
                'iss' => $issuer,
                'user' => $id
            ];

            $jwt = JWT::encode($payload, $key, 'HS256');
            
            header("HTTP/1.1 200 Created");
            header("Content-Type: application/json");
            echo json_encode([
                'success' => true,
                'id' => $id,
                'msg' => "Se ha creado el usuario",
                'token' => $jwt
            ]);
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 404 Not found");
            echo json_encode([
                'success' => false,
                'msg' => "No se puede registrar el usuario. Inténtelo de nuevo más tarde",
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
    
}
