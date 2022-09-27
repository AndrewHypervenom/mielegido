<?php
    include_once 'C:\xampp\htdocs\Crud con Sesiones\modelo\conexion.php';

    session_start();

    if(isset($_SESSION['cod_rol'])){
        switch($_SESSION['cod_rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
                header('location: cliente.php');
            break;

            case 3:
                header('location: conductor.php');
            break;

            default:
        }
    }

    if(isset($_POST['name_usuario']) && isset($_POST['password_usuario'])){
        $username = $_POST['name_usuario'];
        $password = $_POST['password_usuario'];

        $db = new conexion();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE name_usuario = :name_usuario AND password_usuario = :password_usuario');
        $query->execute(['name_usuario' => $username, 'password_usuario' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['cod_rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin.php');
                break;

                case 2:
                    header('location: cliente.php');
                break;
    
                case 3:
                    header('location: conductor.php');
                break;

                default:
            }
        }else{
            echo "Nombre de usuario o contraseña incorrecto";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Iniciar Sesion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <form action="#" method="post">
        <p>Usuario</p>
        <input type="text" placeholder="Usuario" name="name_usuario" />
        <p>Password</p>
        <input type="text" placeholder="Password" name="password_usuario" />
        <br><br>

        <input type="submit" value="Iniciar" />
    </form>
</body>
</html>