<?php
/**
 * Clase de conexión a ala base de datos postgres
 */
class Conexion extends PDO {
    //Datos de conexión a la base de datos
   private $tipo_de_base = 'pgsql';
   private $host = 'localhost';
   private $nombre_de_base = 'blog';
   private $usuario = 'postgres';
   private $contrasena = 'postgres';
   private $puertot= 5432;


    //Instancia
    private $conexion;

    //Conexión con postgres con PDO
    public function __construct() {
        try{
            //Sobreescribo el método constructor de la clase PDO.
            parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
        }
        catch(PDOException $e){
            echo "Error al conectarse con la base de dato".$e->getMessage();
        }
    }
}
