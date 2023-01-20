<?php
require_once('../clases/conexion.php');
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT usuario FROM usuarios ";

    try {
        $result = $con->query($sql);
        $alumnos = $result->fetch_all(MYSQLI_ASSOC);
        header("HTTP/1.1 200 OK");
        return json_encode($alumnos);
    } catch (mysqli_sql_exception $e) {
        header("HTTP/1.1 404 Not Found");
    }
    exit;
} else {
    header("HTTP/1.1 400 Bad Request");
}
