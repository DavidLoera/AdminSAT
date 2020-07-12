<?php

/*Clase para la conexión a la base de datps*/ 
 class Conexion{

     public static function Conectarse(){

         define('servidor','localhost');
         define('nombre_bd','inevesat');
         define('usuario','root');
         define('password','Upopo2000');         
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