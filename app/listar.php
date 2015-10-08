<?php
    require_once "../models/Usuario.php";
    require_once "../util/Configuracion.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Listado de usuarios</title>
        <link   href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            $listaUsuarios = Usuario::recuperarTodos();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Lista de Usuarios</h2>


                <div class="col-lg-1 pull-right" style="margin-bottom: 10px">
                    <a class="btn btn-info" href="<?php echo Configuracion::baseurl() ?>app/add.php">
                        <i class="icon-plus icon-white"></i> Adicionar Usuario                        
                    </a>
                </div>

                <?php
                    if(!empty( $listaUsuarios ) ) {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach( $listaUsuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario->id ?></td>
                            <td><?php echo $usuario->username ?></td>
                            <td><?php echo $usuario->password ?></td>
                            <td><?php echo $usuario->fechacreacion ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Configuracion::baseurl() ?>app/editar.php?id=<?php echo $usuario->id ?>">
                                    <i class="icon-pencil icon-white"></i> Editar
                                </a>
                                <a class="btn btn-danger" href="<?php echo Configuracion::baseurl() ?>app/eliminar.php?id=<?php echo $usuario->id ?>">
                                    <i class="icon-trash icon-white"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php
               } else { ?>
                <div class="alert alert-danger" style="margin-top: 100px">Any user has been registered</div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
