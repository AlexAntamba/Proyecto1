<?php
    require_once "../util/Configuracion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar usuarios</title>
    <link   href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    require_once "../models/Usuario.php";
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if( ! $id ) {
        header("Location:" . Configuracion::baseurl() . "app/listar.php");
        exit;
    }

    $usuarioEdit = new Usuario();
    $usuarioEdit->setId($id);
    //echo $usuarioEdit->getId();
    $usuario = $usuarioEdit->busarPorId();
    $usuarioEdit->verificarkUsuario($usuario);
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Editar usuario <?php echo $usuario->username ?></h2>
            <form action="<?php echo Configuracion::baseurl() ?>app/actualizar.php"
                class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input type="text" name="username"
                        value="<?php echo $usuario->username ?>"
                        class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" name="password"
                            value="<?php echo $usuario->password ?>" class="form-control"
                            id="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-actions">
                    <input type="hidden" name="id" value="<?php echo $usuario->id ?>" />
                    <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
                    <!--
                    <button type="submit" value="submit" class="btn btn-primary">
                        <i class="icon-ok icon-white"></i> Actualizar
                    </button>
                    -->
                    &nbsp;
                    <a class="btn btn-danger" href="<?php echo Configuracion::baseurl() ?>app/listar.php">
                        <i class="icon icon-remove icon-white"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
