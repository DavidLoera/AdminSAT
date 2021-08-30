<?php
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_categorias'];
$sql = 'SELECT * FROM categorias WHERE id_categorias=:id_categorias';
$statement = $conexion->prepare($sql);
$statement->execute([':id_categorias' => $id ]);
$categorias = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name'])  && isset($_POST['categoriaStatus']) ) {
	$name = $_POST['name'];
	$estado = $_POST['categoriaStatus'];
	$sql = 'UPDATE categorias SET nombre_categorias=:name, activo_categorias=:categoriaStatus WHERE id_categorias=:id_categorias';
	$statement = $conexion->prepare($sql);
	if ($statement->execute([':name' => $name, ':categoriaStatus' => $estado, ':id_categorias' => $id])) {
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
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>

									<th class="cell100 column8">Editar categoría</th>
									
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
          								<input class="txt8" value="<?= $categorias->nombre_categorias; ?>" type="text" name="name" id="name" class="form-control" autocomplete="off">
									</div>
									<hr/>
									<div class="form-group">
										<label for="categoriaStatus" class="txt8">Estado: </label>
				      					<select class="txt9"  id="categoriaStatus" name="categoriaStatus">
				      					<option value="<?php echo  $categorias-> activo_categorias?>"><?php if( $categorias->activo_categorias == 1){echo 'Esta como: Disponible';}else{echo 'Esta como: No disponible';}?></option>
				      					<option value="1">Disponible</option>
				      					<option value="2">No disponible</option>
				      					</select>  
        							</div><br>
									<button type="submit" class="txt6">
										Actualizar categoría
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