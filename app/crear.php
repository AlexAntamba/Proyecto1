<?php
    require_once "../util/Configuracion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Crear usuarios</title>
    <link   href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Adicionar Usuario</h2>
            <form action="<?php echo Configuracion::baseurl() ?>app/guardar.php"
                method="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input type="text" name="username" value=""
                             autocomplete="off"
                            class="form-control"
                            id="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" name="password" value=""
                            autocomplete="off"
                            class="form-control" id="password"
                            placeholder="Password">
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" name="submit" class="btn btn-primary" value="Guardar">
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
