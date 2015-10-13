<?php
require_once "../models/Usuario.php";
require_once "../util/Configuracion.php";

if (empty($_POST['submit'])) {
      header("Location:" . Configuracion::baseurl() . "app/listar.php");
      exit;
}

$args = array(
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

//$usuario = new Usuario(null, $post->username, $post->password);
$usuario = new Usuario();
$usuario->setUsername($post->username);
$usuario->setPassword($post->password);

$usuario->guardar();

header("Location:" . Configuracion::baseurl() . "app/listar.php");
exit;
