<?php
require_once("../db/Database.php");
require_once("../interfaces/IUser.php");
/**
 * Implementacion del modelo Usuario
 */
class Usuario extends IUsuario
{
    private $conexion;
    private $id;
    private $username;
    private $password;

    function __construct(Database $db)
    {
        $this->conexion = new $db;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /*
     insertamos usuarios en una tabla con postgreSql
    */
    public function save()
    {
        try{
            //Prepara el query
            $query = $this->conexion->prepare('INSERT INTO usuarios(username, password) values (?,?)');

            //Asigna valores
            $query->bindParam(1,$this->username);
            $query->bindParam(2,$this->password);

            //Ejecuta query
            $query->execute();

            //Cierra conexion
            $this->conexion->close();
        }
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
    }

    public function update()
    {
        try{
            $query = $this->con->prepare('UPDATE usuarios SET username = ?, password = ? WHERE id = ?');
			$query->bindParam(1, $this->username, PDO::PARAM_STR);
			$query->bindParam(2, $this->password, PDO::PARAM_STR);
            $query->bindParam(3, $this->id, PDO::PARAM_INT);

            $query->execute();
            $this->conexion->close();
        }
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
    }

    //obtenemos usuarios de una tabla con postgreSql
    public function get()
    {
        try{
            if(is_int($this->id))
            {
                $query = $this->conexion->prepare('SELECT * FROM usuarios WHERE id = ?');
                $query->bindParam(1, $this->id, PDO:: PARAM_INT);

                $query->execute();
                $this->conexion->close();

                return $query->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                $query = $this->con->prepare('SELECT * FROM usuarios');
                $query->execute();
                $this->con->close();

                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
    }

    public function delete()
    {
        try{
            $query = $this->conexion->prepare('DELETE FROM usuarios WHERE id = ?');
            $query->bindParam(1,$this->id, PDO::PARAM_INT);
            $query->execute();
            $this->conexion->close();

            return true;
        }
        catch(PDOException $e)
        {
	        echo  $e->getMessage();
	    }
    }

    public function baseurl()
    {
        return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/php/crudpgsql/";
    }

    public function checkUser($usuario)
    {
        if(! $usuario){
            header("Location:".Usuario::baseurl()."app/list.php");
        }
    }
}

 ?>
