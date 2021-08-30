<?php
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_marca'];
$sql = 'SELECT * FROM marcas WHERE id_marca=:id_marca';
$statement = $conexion->prepare($sql);
$statement->execute([':id_marca' => $id ]);
$marcas= $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name'])  && isset($_POST['fabricanteStatus']) ) {
	$name = $_POST['name'];
	$estado = $_POST['fabricanteStatus'];
	$sql = 'UPDATE marcas SET nombre_marca=:name, activo_marca=:fabricanteStatus WHERE id_marca=:id_marca';
	$statement = $conexion->prepare($sql);
	if ($statement->execute([':name' => $name, ':fabricanteStatus' => $estado, ':id_marca' => $id])) {
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
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>

									<th class="cell100 column8">Editar fabricante</th>
									
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
          								<input class="txt8" value="<?= $marcas->nombre_marca; ?>" type="text" name="name" id="name" class="form-control" autocomplete="off">
									</div>
									<hr/>
									<div class="form-group">
										<label for="categoriaStatus" class="txt8">Estado: </label>
				      					<select class="txt9"  id="fabricanteStatus" name="fabricanteStatus">
				      					<option value="<?php echo $marcas->activo_marca ?>"><?php if( $marcas->activo_marca == 1){echo 'Se encuentra como: Disponible';}else{echo 'Se encuentra como: No disponible';}?></option>
				      					<option value="1">Disponible</option>
				      					<option value="2">No disponible</option>
				      					</select>  
        							</div><br>
									<button type="submit" class="txt6">
										Actualizar fabricante
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