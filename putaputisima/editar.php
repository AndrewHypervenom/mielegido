<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>    

<?php

include("conexion.php");        

if(isset($_GET['cod_usuario'])){
    $cod_usuario = $_GET['cod_usuario'];
    $query = "SELECT * FROM usuarios WHERE cod_usuario = $cod_usuario";
    $resultado_editar = mysqli_query($conexion, $query);
    if(mysqli_num_rows($resultado_editar) == 1){
        $row = mysqli_fetch_array($resultado_editar);
        $nombre = $row['nombre'];
        $correo = $row['correo'];
        $contraseña = $row['contraseña'];
        $cedula = $row['cedula'];
        $telefono = $row['telefono'];
        $ubicacion = $row['ubicacion'];
        $cargo = $row['cargo'];
        $licencia = $row['licencia'];
        $direccion = $row['direccion'];
    }
}

if(isset($_POST['update'])){
    $cod_usuario = $_GET['cod_usuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];
    $cargo = $_POST['cargo'];
    $licencia = $_POST['licencia'];
    $direccion = $_POST['direccion'];

    $query = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', contraseña = '$contraseña', cedula = '$cedula', telefono = '$telefono', ubicacion = '$ubicacion', cargo = '$cargo', licencia = '$licencia', direccion = '$direccion' WHERE cod_usuario = $cod_usuario";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = 'La puta se actualizo';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?cod_usuario=<?php echo $_GET['cod_usuario']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="<?php echo $nombre ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" class="form-control" placeholder="correo" value="<?php echo $correo ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="password" name="contraseña" class="form-control" placeholder="contraseña" value="<?php echo $contraseña ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="cedula" class="form-control" placeholder="cedula" value="<?php echo $cedula ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" class="form-control" placeholder="telefono" value="<?php echo $telefono ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="ubicacion" class="form-control" placeholder="ubicacion" value="<?php echo $ubicacion ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="cargo" class="form-control" placeholder="cargo" value="<?php echo $cargo ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="licencia" class="form-control" placeholder="licencia" value="<?php echo $licencia ?>" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" class="form-control" placeholder="direccion" value="<?php echo $direccion ?>" autofocus />
                    </div><br>
                    <button class="btn btn-success" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>