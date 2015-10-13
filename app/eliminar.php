<?php
require_once "../models/Usuario.php";
require_once "../util/Configuracion.php";

$usuario = new Usuario();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if( $id ){
    $usuario->setId($id);
    $usuario->eliminar();
}
header("Location:" . Configuracion::baseurl() . "app/listar.php");
//exit;
?>
