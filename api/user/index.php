<?php
require '../vendor/autoload.php';
require_once('../clases/conexion.php');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$con = new Conexion();
$key = 'This 1s S3cr3T!';
$issuer = 'localhost';
$jwt = getallheaders()['Authorization'];
$decoded = (array) JWT::decode($jwt, new Key($key, 'HS256'));


if ($decoded['user'] == $_GET['id']) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $sql = "SELECT fullname,username,email,birthday,height,weight,activities from usuarios WHERE id = '{$_GET['id']}'";

            try {
                $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);
                $result[0]['activities'] = explode(',', $result[0]['activities']);

                if ($result != null) {
                    header("HTTP/1.1 200 Success");
                    header("Content-Type: application/json");
                    echo json_encode([
                        'success' => true,
                        'user' => $result[0]
                    ]);
                } else {
                    header("HTTP/1.1 401 User Error");
                    echo json_encode([
                        'success' => false,
                        'msg' => "Datos de usuario incorrectos",
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
            header("HTTP/1.1 403 Bad Request");
            header("Content-Type: application/json");
            echo json_encode([
                'success' => false,
                'msg' => "Id no enviado",
            ]);
        }
        exit;
    } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $json = json_decode(file_get_contents('php://input'), true);

        //No es obligatoria la contraseña pues queda claro que es el usuario por el JWT
        //Solo se pone un nueva
        if (isset($json['email'])  && isset($json['id'])) {

            $json['activities'] = implode(",", $json['activities']);
            $pass = hash('sha512', $json['pass']);
            $sql = "UPDATE usuarios SET email = '{$json['email']}', height = '{$json['height']}', weight = '{$json['weight']}', birthday = '{$json['birthday']}', activities = '{$json['activities']}'";

            //Si se quiere cambiar la contraseña
            if ($json['pass'] != '') {
                $sql .= ", pass = '{$pass}'";
            }

            $sql .=  "WHERE id = {$json['id']}";

            try {
                $con->query($sql);

                header("HTTP/1.1 200 OK");
                header("Content-Type: application/json");
                echo json_encode([
                    'success' => true,
                    'msg' => "Usuario actualizado",
                ]);
            } catch (mysqli_sql_exception $e) {
                header("HTTP/1.1 404 Not found");
                echo json_encode([
                    'success' => false,
                    'msg' => "No se puede actualizar el usuario. Inténtelo de nuevo más tarde",
                ]);
            }
        } else {
            header("HTTP/1.1 401 User Request");
            header("Content-Type: application/json");
            echo json_encode([
                'success' => false,
                'msg' => "Campo requerido vacío",
            ]);
        }
        exit;
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        if (isset($_GET['id'])) {
            $sql = "DELETE FROM usuarios WHERE id = {$_GET['id']}";
            
            try {
                $con->query($sql);

                header("HTTP/1.1 200 OK");
                header("Content-Type: application/json");
                echo json_encode([
                    'success' => true,
                    'msg' => "Usuario Eliminado",

                ]);
            } catch (mysqli_sql_exception $e) {
                header("HTTP/1.1 404 Not found");
                echo json_encode([
                    'success' => false,
                    'msg' => "No se puede eliminar el usuario. Inténtelo de nuevo más tarde",
                ]);
            }
        } else {
            header("HTTP/1.1 403 Error Request");
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
} else {
    header("HTTP/1.1 405 Bad Token");
    header("Content-Type: application/json");
    echo json_encode([
        'success' => false,
        'msg' => "Token incorrecto"
    ]);
}
