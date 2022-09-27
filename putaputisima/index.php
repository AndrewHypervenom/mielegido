<?php 
include("conexion.php");

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD MDFK</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>    
        <script src="https://kit.fontawesome.com/bf74964ebf.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">

                        <?php if(isset($_SESSION['message'])) { ?>
                            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                                <?= $_SESSION['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php session_unset(); } ?>

                        <form action="guardar.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="correo" class="form-control" placeholder="correo" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="password" name="contraseña" class="form-control" placeholder="contraseña" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="cedula" class="form-control" placeholder="cedula" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" class="form-control" placeholder="telefono" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="ubicacion" class="form-control" placeholder="ubicacion" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="cargo" class="form-control" placeholder="cargo" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="licencia" class="form-control" placeholder="licencia" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="text" name="direccion" class="form-control" placeholder="direccion" autofocus />
                            </div><br>
                            <input type="submit" class="btn btn-success btn-block" name="save" value="Enviar" />
                        </form>
                    </div>
                </div>
            </div><br><br>

            <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Cedula</th>
                                <th>Telefono</h>
                                <th>Ubicacion</th>
                                <th>Cargo</th>
                                <th>Licencia</th>
                                <th>Direccion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $query = "SELECT * FROM usuarios";
                                $resultado_query = mysqli_query($conexion, $query);

                                while($row = mysqli_fetch_array($resultado_query)) { ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['correo'] ?></td>
                                        <td><?php echo $row['contraseña'] ?></td>
                                        <td><?php echo $row['cedula'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><?php echo $row['ubicacion'] ?></td>
                                        <td><?php echo $row['cargo'] ?></td>
                                        <td><?php echo $row['licencia'] ?></td>
                                        <td><?php echo $row['direccion'] ?></td>
                                        <td>
                                            <a href="editar.php?cod_usuario=<?php echo $row['cod_usuario'] ?>" class="btn btn-secondary">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="eliminar.php?cod_usuario=<?php echo $row['cod_usuario'] ?>" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

        </div>
    </body>
</html>