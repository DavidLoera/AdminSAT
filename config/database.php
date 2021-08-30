<?php



/*Clase para la conexión a la base de datos*/ 

 class Conexion{

     public static function Conectarse(){

         define('servidor','localhost');

         define('nombre_bd','inevesat');

         define('usuario','root');
         
         define('password','Vale');
         
         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }
     
 }
?>

