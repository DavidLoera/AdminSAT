<?php
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$message = '';
if (isset ($_POST['name'])  && isset($_POST['fabricanteStatus']) ) {
  $name = $_POST['name'];
  $estado = $_POST['fabricanteStatus'];
  $sql = 'INSERT INTO marcas(nombre_marca, activo_marca, estado_marca) VALUES(:name, :fabricanteStatus, :fabricanteStatus)';
  $statement = $conexion->prepare($sql);
  if ($statement->execute([':name' => $name, ':fabricanteStatus' => $estado])) {
	header("Location: ../usuario/fabricantes.php");
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
<a class="txt7" href="../usuario/fabricantes.php">Ir atras</a>
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

									<th class="cell100 column8">Nuevo fabricante</th>
									
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
          								<input class="txt8" type="text" name="name" id="name" class="form-control" placeholder="Nombre del fabricante" autocomplete="off" required>
									</div>
									<hr/>
									<div class="form-group">
										<label for="fabricanteStatus" class="txt8">Estado: </label>
				      					<select class="txt9" id="fabricanteStatus" name="fabricanteStatus" required>
				      					<option value="">Selecciona</option>
				      					<option value="1">Disponible</option>
				      					<option value="2">No disponible</option>
				      					</select>  
        							</div><br>
									<button type="submit" class="txt6">
										Agregar fabricante
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