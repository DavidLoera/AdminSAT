<?php

date_default_timezone_set('America/Mexico_City');

// Conexion base de datos
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();



$id = $_GET['id_productos'];
$fecha = date("Y-m-d");  

$sql= "UPDATE productos SET fecha_baja = '$fecha', activo = 2 where id_productos=:id_productos";
$statement = $conexion->prepare($sql);
$statement->execute();
if ($statement->execute([':id_productos' => $id])) {
	header("Location: ../usuario/productos.php");
  }

?>