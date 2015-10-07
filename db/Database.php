<?php
/**
 *
 */
class Database extends PDO
{
    //Datos de conexión a la base de datos
    private $basedatos = "blog";
    private $host = "localhost";
    private $usuario = "postgres";
    private $contrasena = "postgres";
    private $puerto = 5432;

    private $conexion;

    //Conexión con postgres con pdo
    function __construct()
    {
        try{
            $this->$conexion = parent::__construct("pgsql:host=$this->host;port=$this->puerto;dbname=$this->basedatos;user=$this->usuario;password=$this->password");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //función para cerrar una conexión pdo
    public function close()
    {
        $this->$conexion = null;
    }
}
