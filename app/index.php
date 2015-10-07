<?php

require_once("../db/Database.php");

 $conexion = new Database();

echo "<h1>Hola mundo </h1>";

print_r(PDO::getAvailableDrivers()); 
//require_once 'dbconfig.php';
/*
$dsn = "pgsql:host='localhost';port='5432';dbname='blog';user='postgres';password='postgres'";

try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);

 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>blog</strong> database successfully!";
 }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}
*/
