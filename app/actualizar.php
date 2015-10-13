<?php
require_once "../models/Usuario.php";
require_once "../util/Configuracion.php";
//var_dump($_POST);
if (empty($_POST['submit'])){
      header("Location:" . Configuracion::baseurl() . "app/listar.php");
      exit;
}

$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

if( $post->id === false ){
    header("Location:" . Configuracion::baseurl() . "app/listar.php");
}

$usuario = new Usuario();
$usuario->setId($post->id);
$usuario->setUsername($post->username);
$usuario->setPassword($post->password);

$usuario->guardar();

header("Location:" . Configuracion::baseurl() . "app/listar.php");
exit;
