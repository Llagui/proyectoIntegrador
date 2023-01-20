<?php
define("HOST", "localhost");
define("USER", "roadrunner");
define("PASSWORD", "roadrunner");
define("DATABASE", "roadrunner");

function addUser(array $datos)
{
    $insertado = false;
    try {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        //Consulta y conexion a base de datos
        //Creacion del consulta para instrucciones predefinidas
        $sql = "INSERT INTO usuarios (nombreCompleto,usuario,correo,contraseña,estatura,peso,fechaNacimiento,senderismo,montañismo,ciclismo,correr) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $connect->prepare($sql);
        $insertados = 0;
        //Ejecicion de las instrucciones predefinidas
        $datos["contraseña"] = hash("sha512", $datos["contraseña"]);

        $stmt->bind_param("sssssssssss", $datos['nombre'], $datos['usuario'], $datos['correo'], $datos['contraseña'], $datos['estatura'], $datos['peso'], $datos['fecha'], $datos['senderismo'], $datos['montañismo'], $datos['ciclismo'], $datos['correr']);
        $stmt->execute();
        $insertados += $connect->affected_rows;

        if ($insertados > 0) {
            $insertado = true;
        }

        $stmt->close();
        $connect->close();
    } catch (Exception $e) {
        $insertado = false;
        echo $e->getMessage();
    }
    return $insertado;
}

function validateUser(string $usuario, string $contraseña)
{
    $valido = false;
    try {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        //Consulta y conexion a base de datos
        $contraseña = hash("sha512", $contraseña);
        $sql = "SELECT * FROM usuarios WHERE usuario ='$usuario' AND contraseña = '$contraseña'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $valido = true;
        }
        mysqli_close($connect);
    } catch (mysqli_sql_exception $e) {
        $valido = false;
    }
    return $valido;
}

function getIDWithUser(string $usuario)
{
    $user = false;
    try {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
        $result = mysqli_query($connect, $sql);
        if (mysqli_affected_rows($connect) > 0) {
            $user = array();
            while ($register = mysqli_fetch_assoc($result)) {
                $user[] = $register;
            }
        }
        mysqli_close($connect);
    } catch (mysqli_sql_exception $e) {
        $user = false;
    }
    return $user[0]['idUsuario'];
}

// function getUsernames()
// {
//     $user = false;
//     try {
//         $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
//         $sql = "SELECT usuario FROM usuarios";
//         $result = mysqli_query($connect, $sql);
//         if (mysqli_affected_rows($connect) > 0) {
//             $user = array();
//             while ($register = mysqli_fetch_assoc($result)) {
//                 $user[] = $register;
//             }
//         }
//         mysqli_close($connect);
//     } catch (mysqli_sql_exception $e) {
//         $user = false;
//     }
//     return $user;
// }
