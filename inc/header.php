<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
@require_once("funcionesBD.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road Runner</title>
    <!-- 
        Light 300
        Light 300 Italic
        Regular 400
        Medium 500 
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header class="negro">

        <div class="logo">
            <a href="../php/">
                <img src="../logos/image.png" class="imagenLogo">
            </a>
            <a href="../php/" class="enlaceLogo">
                <span>&nbsp;&nbsp;ROAD RUNNER</span>
            </a>
        </div>

        <div id="inicioSesion">
        </div>
    </header>
    <script src="../js/menu.js"></script>