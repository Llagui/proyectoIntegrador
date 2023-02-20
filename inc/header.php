<!DOCTYPE html>
<html lang="es">
<?php
@session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road Runner</title>
    <!-- 
        Fuentes disponibles
        Light 300
        Light 300 Italic
        Regular 400
        Medium 500 
    -->
    <link rel="shortcut icon" href="../logos/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <!-- Mapa leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>

<body>
    <header class="negro">

        <div class="logo">
            <a href="../php/">
                <img src="../logos/image.png" class="imagenLogo" alt="logo">
            </a>
            <a href="../php/" class="enlaceLogo">
                <span>&nbsp;&nbsp;ROAD RUNNER</span>
            </a>
        </div>

        <!-- Aqui sale el menu -->
        <div id="inicioSesion">
        </div>
    </header>
    <script src="../js/menu.js"></script>