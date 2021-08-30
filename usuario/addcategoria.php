<?php

require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$message = '';
if (isset ($_POST['name'])  && isset($_POST['categoriaStatus']) ) {
  $name = $_POST['name'];
  $estado = $_POST['categoriaStatus'];
  $sql = 'INSERT INTO categorias(nombre_categorias	, activo_categorias, estado_categorias) VALUES(:name, :categoriaStatus, :categoriaStatus)';
  $statement = $conexion->prepare($sql);
  if ($statement->execute([':name' => $name, ':categoriaStatus' => $estado])) {
	$message = 'Categoría añadida con éxito';
	header("Location: ../usuario/categorias.php");
	
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
<a class="txt7" href="../usuario/categorias.php">Ir atras</a>
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

									<th class="cell100 column8">Nueva categoría</th>
									
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>

								<tr class="row100 body">
									<form method="post">
									<div class="form-group">
         							 	<label for="name" class="txt8">Nombre:</label>
          								<input class="txt8" type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoría" autocomplete="off" required>
									</div>
									<hr/>
									<div class="form-group">
										<label for="fabricanteStatus" class="txt8">Estado: </label>
				      					<select class="txt9" id="categoriaStatus" name="categoriaStatus" required>
				      					<option value="">Selecciona</option>
				      					<option value="1">Disponible</option>
				      					<option value="2">No disponible</option>
				      					</select>  
        							</div><br>
									<button type="submit" class="txt6">
										Agregar categoría
									</button>
									</form>
								</tr>
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include('../include/usuario/footer.php') ?>
</body>
</html>