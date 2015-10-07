<?php
/**
 *
 */
class Configuracion {

    public function __construct() {
    }

    public static function baseurl() {
        return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/crud-php-pgsql/";
    }
}

 ?>
