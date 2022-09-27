<?php

    session_start();

    if(!isset($_SESSION['cod_rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['cod_rol'] != 3){
            header('location: login.php');
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Administrador</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Conductor</h1>
    <a href="cerrarsesion.php">Cerrar Sesion</a>
</body>
</html>