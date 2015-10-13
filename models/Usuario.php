<?php
require_once("../util/Conexion.php");
require_once "../util/Configuracion.php";
/**
 * Implementacion del modelo Usuario
 */
class Usuario {

    //Definición de atibutos
    private $id;
    private $username;
    private $password;
    private $fechaCreacion;

    const TABLA = 'usuarios';

    function __construct(){//$id=nul, $username, $password
        $this->id = null;
        $this->username = null;
        $this->password = null;
        $this->fechaCreacion = new DateTime();
    }

    public function setId($id){
        $this->id = $id;
        //echo $this->id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function fechaCreacion() {
        return $this->fechaCreacion;
    }

    /*
     insertamos usuarios en una tabla con postgreSql
    */
    public function guardar() {
        $conexion = new Conexion();
        try{
            if($this->id) /*Modifica*/{
                $query = $conexion->prepare('UPDATE '. self::TABLA .' SET username = ?, password = ? WHERE id = ?');
                $query->bindParam(1, $this->username, PDO::PARAM_STR);
                $query->bindParam(2, $this->password, PDO::PARAM_STR);
                $query->bindParam(3, $this->id, PDO::PARAM_INT);

                $query->execute();
            }else /*Inserta*/ {
                //Prepara el query
                $query = $conexion->prepare('INSERT INTO '. self::TABLA .'(username, password) values (?,?)');

                //Asigna valores
                $query->bindParam(1,$this->username);
                $query->bindParam(2,$this->password);

                //Ejecuta query
                $query->execute();
            }

        } catch(PDOException $e){
	        echo  $e->getMessage();
	    }
        //Cierra conexion
        $conexion = null;
    }

    //obtenemos usuarios de una tabla con postgreSql
    public function busarPorId() {
        try{
            //echo $this->id;
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA .' WHERE id = ?');
            $consulta->bindParam(1, $this->id, PDO:: PARAM_INT);

            $consulta->execute();

            //$registro = $consulta->fetch();
            $registro = $consulta->fetch(PDO::FETCH_OBJ);

            if($registro){
                /*$usuario =  new self();
                $usuario->setId($this->id);
                $usuario->setUsername($registro['username']);
                $usuario->setPassword( $registro['password']);*/
                return $registro;

            }else{
                return false;
            }
        }catch(PDOException $e){
	        echo  $e->getMessage();
	    }
    }

    public static function recuperarTodos(){
       $conexion = new Conexion();
       //echo 'SELECT id, username, password FROM ' . self::TABLA . ' ORDER BY id';
       $consulta = $conexion->prepare('SELECT id, username, password, fecha_creacion as fechaCreacion FROM ' . self::TABLA . ' ORDER BY id');

       $consulta->execute();
       $registros = $consulta->fetchAll(PDO::FETCH_OBJ);
       //$registros = $consulta->fetchAll();

       return $registros;
    }

    public function eliminar(){
        $conexion = new Conexion();
        try{
            $query = $conexion->prepare('DELETE FROM '. self::TABLA .' WHERE id = ?');
            $query->bindParam(1,$this->id, PDO::PARAM_INT);
            $query->execute();

            return true;
        }catch(PDOException $e){
	        echo  $e->getMessage();
	    }
    }

    public function verificarkUsuario($usuario) {
        if(! $usuario){
            header("Location:".Configuracion::baseurl()."app/listar.php");
        }
    }
}

 ?>
