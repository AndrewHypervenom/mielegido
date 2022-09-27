<?php

include("conexion.php");

if(isset($_GET['cod_usuario'])){
    $cod_usuario = $_GET['cod_usuario'];
    $query = "DELETE FROM usuarios WHERE cod_usuario = $cod_usuario";
    $resultado_eliminar = mysqli_query($conexion, $query);
    if(!$resultado_eliminar){
        die("Error puta");
    }

    $_SESSION['message'] = 'Se borro a la puta';
    $_SESSION['message_type'] = 'danger';
    
    header("Location: index.php");

}
