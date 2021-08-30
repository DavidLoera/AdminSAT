<?php
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_categorias'];
$sql = 'DELETE FROM categorias WHERE id_categorias=:id_categorias';
$statement = $conexion->prepare($sql);
if ($statement->execute([':id_categorias' => $id])) {
  header("Location: usuario/categoria.php");
}