<?php

session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();


//Obtener categorias

$sql = 'SELECT * FROM categorias';
$statement = $conexion->prepare($sql);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_OBJ);



 
