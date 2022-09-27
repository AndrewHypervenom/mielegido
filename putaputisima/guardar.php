<?php

include("conexion.php");

if(isset($_POST['save'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];
    $cargo = $_POST['cargo'];
    $licencia = $_POST['licencia'];
    $direccion = $_POST['direccion'];

    $query = "INSERT INTO usuarios(nombre, correo, contraseña, cedula, telefono, ubicacion, cargo, licencia, direccion) VALUES ('$nombre', '$correo', '$contraseña', '$cedula', '$telefono', '$ubicacion', '$cargo', '$licencia', '$direccion')";
    $result = mysqli_query($conexion, $query);

    if (!$result){
        die("Error perra");
    }

    $_SESSION['message'] = 'Muy bien puta';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");

}

/* if(isset($_POST['save'])){
    echo "Ahhh";
} */