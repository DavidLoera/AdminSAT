<?php

require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

//Obtener ID de los productos
$id = $_GET['id_productos'];
$sqlid ='SELECT  a.id_usuario, a.id_marca, a.id_categorias ,a.id_productos, nombre_productos, modelo, serie, fecha_alta, fecha_baja, activo, c.nombre_categorias, b.nombre_marca, c.nombre_categorias, d.username
	    FROM productos as a, marcas as b, categorias as c, usuarios as d 
	    WHERE a.id_marca=b.id_marca and a.id_categorias=c.id_categorias and a.id_usuario=d.id_usuario and id_productos = :id_productos';
$statementid = $conexion->prepare($sqlid);
$statementid->execute([':id_productos' => $id ]);
$productos= $statementid->fetch(PDO::FETCH_OBJ);

// SQL Para las marcas de las marcas
$sql = 'SELECT * FROM categorias WHERE activo_categorias = 1';
$statement = $conexion->prepare($sql);
$statement->execute();
$categorias= $statement->fetchAll(PDO::FETCH_OBJ);

// SQL Para las marcas de los categorias
$sql2 = 'SELECT * FROM marcas WHERE activo_marca = 1';
$statement2 = $conexion->prepare($sql2);
$statement2->execute();
$marcas = $statement2->fetchAll(PDO::FETCH_OBJ);


//SQL Para las categorias de los productos

if (isset ($_POST['name']) && isset($_POST['fabricante']) && isset($_POST['modelo']) && isset($_POST['categoria']) && isset($_POST['serie']) && isset($_POST['usuario']) && isset($_POST['estado'])) {
  $name = $_POST['name'];
  $fabricante = $_POST['fabricante'];
  $modelo = $_POST['modelo'];
  $categoria = $_POST['categoria'];
  $noserie = $_POST['serie'];
  $usuario = $_POST['usuario'];
  $estado = $_POST['estado'];
  if($_POST['estado'] == 1){$fechabaja = "0000-00-00";}else{$fechabaja="";}
  $sql3 = 'UPDATE productos SET id_marca=:fabricante, id_categorias=:categoria, id_usuario=:usuario, nombre_productos=:name, modelo=:modelo, serie=:serie, activo=:estado, fecha_baja = "$fechabaja" where id_productos=:id_productos';
  $statement3 = $conexion->prepare($sql3);
  if ($statement3->execute([':name' => $name, ':fabricante' => $fabricante, ':modelo' => $modelo, ':categoria' => $categoria, ':serie' => $noserie, ':usuario' => $usuario, ':estado' => $estado, ':id_productos' => $id])) {
	header("Location: ../usuario/productos.php");
  }

}

 ?>

<?php include("../config/auth.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../include/usuario/head.php")?>

</head>
<body>
<body>
<?php include("../include/usuario/header.php")?>
<a class="txt7" href="../usuario/productos.php">Ir atras</a>
		<div class="container-table100">
			<div class="wrap-table100">	
			<?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>

							<thead>

									<th class="cell100 column8">Actualizar dispositivo</th>
									
							</thead>
						</table>
                    </div>
                    
						<table>
							<tbody>
								<tr class="row100 body">
									<form method="post">
									<div class="form-group">
         							 	<label for="name" class="txt8">Nombre:</label>
          								<input class="txt8" type="text" name="name" id="name" class="form-control" value="<?= $productos->nombre_productos;?>">
									</div>
                                    <hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Marca o fabricante: </label>
				      					<select class="txt9" id="fabricante" name="fabricante">
										<option value="<?php echo $productos->id_marca ?>">Seleccionado: <?php echo $productos->nombre_marca ?></option>
										<?php foreach($marcas as $marc): ?>
				      					<option value="<?= $marc->id_marca; ?>"><?= $marc->nombre_marca; ?></option>
										<?php endforeach; ?>
				      					</select>  
        							</div>
                                    <hr/>
                                    <div class="form-group">
         							 	<label for="name" class="txt8">Modelo:</label>
          								<input class="txt8" type="text" name="modelo" id="modelo" class="form-control" value="<?= $productos->modelo; ?>">
									</div>
                                    <hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Tipo o categoría: </label>
				      					<select class="txt9" id="categoria" name="categoria">
										<option value="<?php echo $productos->id_categorias ?>"> Seleccionado: <?php echo $productos->nombre_categorias ?></option>
										<?php foreach($categorias as $cat): ?>
				      					<option value="<?= $cat->id_categorias; ?>"><?= $cat->nombre_categorias; ?></option>
										<?php endforeach; ?>
				      					</select>  
                                    </div>
                                    <hr/>
                                    <div class="form-group">
         							 	<label for="name" class="txt8">Serie:</label>
          								<input class="txt8" type="text" name="serie" id="serie" class="form-control" value="<?= $productos->serie; ?>">
									</div>
                                    <hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Usuario: </label>
				      					<select class="txt9" id="usuario" name="usuario">
				      					<option value="<?php echo $productos->id_usuario ?>"> <?php echo "$usuario" ?> (en línea) </option>
				      					</select>  
                                    </div>
									<hr/>
                                    <div class="form-group">
                                        <label for="productoStatus" class="txt8">Estado: </label>
				      					<select class="txt9"  id="fabricanteStatus" name="estado">
				      					<option value="<?php echo $productos->activo ?>"><?php if( $productos->activo == 1){echo 'Se encuentra como: Disponible';}else{echo 'Se encuentra como: No disponible';}?></option>
				      					<option value="1">Disponible</option>
				      					<option value="2">No disponible</option>
				      					</select>  
                                    </div><br>
									<button type="submit" class="txt6">
										Actualizar dispositivo
									</button>
									</form>
								</tr>
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>


	<?php include('../include/usuario/footer.php') ?>
</body>
</html>