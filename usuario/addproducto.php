<?php
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

//SQL para obtencion de ID
$usuario2 = $_SESSION["s_usuario"];
$sqlid = "SELECT id_usuario from usuarios WHERE username = '$usuario2' or email = '$usuario2'";
$statementid = $conexion->prepare($sqlid);
$statementid->execute();
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

$message = '';
if (isset ($_POST['name']) && isset($_POST['fabricante']) && isset($_POST['modelo']) && isset($_POST['categoria']) && isset($_POST['serie']) && isset($_POST['usuario']) && isset($_POST['estado'])) {
  $name = $_POST['name'];
  $fabricante = $_POST['fabricante'];
  $modelo = $_POST['modelo'];
  $categoria = $_POST['categoria'];
  $noserie = $_POST['serie'];
  $usuario = $_POST['usuario'];
  $estado = $_POST['estado'];
  $sql3 = 'INSERT INTO productos(id_marca, id_categorias, id_usuario, nombre_productos, modelo, serie, activo) VALUES(:fabricante, :categoria, :usuario, :name, :modelo, :serie, :estado )';
  $statement3 = $conexion->prepare($sql3);
  if ($statement3->execute([':name' => $name, ':fabricante' => $fabricante, ':modelo' => $modelo, ':categoria' => $categoria, ':serie' => $noserie, ':usuario' => $usuario, ':estado' => $estado])) {
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

									<th class="cell100 column8">Nuevo dispositivo</th>
									
							</thead>
						</table>
                    </div>
                    
						<table>
							<tbody>
								<tr class="row100 body">
									<form method="post">
									<div class="form-group">
         							 	<label for="name" class="txt8">Nombre:</label>
          								<input class="txt8" type="text" name="name" id="name" class="form-control" placeholder="Nombre del dispositivo" autocomplete="off" required>
									</div>
                                    <hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Marca o fabricante: </label>
				      					<select class="txt9" id="fabricante" name="fabricante" required>
										<option value=""> Selecciona</option>
										<?php foreach($marcas as $marc): ?>
				      					<option value="<?= $marc->id_marca; ?>"><?= $marc->nombre_marca; ?></option>
										<?php endforeach; ?>
				      					</select>  
        							</div>
                                    <hr/>
                                    <div class="form-group">
         							 	<label for="name" class="txt8">Modelo:</label>
          								<input class="txt8" type="text" name="modelo" id="modelo" class="form-control" placeholder="Nombre del modelo" autocomplete="off" required>
									</div>
                                    <hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Tipo o categoría: </label>
				      					<select class="txt9" id="categoria" name="categoria">
										<option value=""> Selecciona</option>
										<?php foreach($categorias as $cat): ?>
				      					<option value="<?= $cat->id_categorias; ?>"><?= $cat->nombre_categorias; ?></option>
										<?php endforeach; ?>
				      					</select>  
                                    </div>
                                    <hr/>
                                    <div class="form-group">
         							 	<label for="name" class="txt8">Serie:</label>
          								<input class="txt8" type="text" name="serie" id="serie" class="form-control" placeholder="Numero de serie" autocomplete="off" required>
									</div>
                                    <hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Usuario: </label >
				      					<select class="txt9" id="usuario" name="usuario" required> 
				      					<option value="<?= $productos->id_usuario; ?>"> <?php echo "$usuario2" ?> (en línea) </option>
				      					</select>  
                                    </div>
									<hr/>
                                    <div class="form-group">
										<label for="fabricanteStatus" class="txt8">Estado </label>
				      					<select class="txt9" id="estado" name="estado" required>
				      					<option value="">Selecciona</option>
				      					<option value="1">Disponible</option>
				      					<option value="2">No disponible</option>
				      					</select>  
                                    </div><br>
									<button type="submit" class="txt6">
										Agregar dispositivo
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