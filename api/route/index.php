<?php
/*************
 * No la uso por exigencias del proyecto
 */
require_once('../clases/conexion.php');


$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $sql = "SELECT * from rutas WHERE id = '{$_GET['id']}'";

        try {
            $result = $con->query($sql)->fetch_all(MYSQLI_ASSOC);

            // print_r(json_encode($result[0]));
            if ($result != null) {
                header("HTTP/1.1 200 Success");
                header("Content-Type: application/json");
                echo json_encode($result[0]);
            } else {
                header("HTTP/1.1 404 Not found");
                echo json_encode([
                    'success' => false,
                    'msg' => "No se encuentra el usuario. Inténtelo de nuevo más tarde",
                ]);
            }
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode([
                'success' => false,
                'msg' => "Datos de usuario incorrectos",
            ]);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        echo json_encode([
            'success' => false,
            'msg' => "Id no enviado",
        ]);
    }
    exit;
}
