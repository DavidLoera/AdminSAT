<?php
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

$id = $_GET['id_usuario'];
$sql2 = 'SELECT * FROM usuarios WHERE id_usuario=:id_usuario';
$statement2 = $conexion->prepare($sql2);
$statement2->execute([':id_usuario' => $id ]);
$username = $statement2->fetch(PDO::FETCH_OBJ);

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
<a class="txt7" href="../usuario/configuracion.php">Ir atras</a>
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

						<table>
							<tbody>

								<tr class="row100 body">
									<form method="post">
									<div class="form-group">
         							 	<label for="name" class="txt8">Nombre:</label>
          								<input class="txt8" value="<?= $username-> username; ?>" type="text" name="name" id="name" class="form-control" autocomplete="off">
									</div>
									<hr/>
                                    <div class="form-group">
         							 	<label for="name" class="txt8">Email:</label>
          								<input class="txt8" value="<?= $username->email; ?>" type="text" name="name" id="name" class="form-control" autocomplete="off">
									</div>
                                    <hr/>
                                    <div class="form-group">
         							 	<label for="name" class="txt8">Contraseña:</label>
          								<input class="txt8"  type="password" name="name" id="name" class="form-control" autocomplete="off" placeholder = "Contraseña actual">
									</div><hr/>
									<div class="form-group">
         							 	<label for="name" class="txt8">Nueva contraseña:</label>
          								<input class="txt8" type="password" name="newpassword" id="name" class="form-control" autocomplete="off" placeholder = "Ingrese nueva contraseña">
									</div><hr/>
									<div class="form-group">
         							 	<label for="name" class="txt8">Repita la contraseña:</label>
          								<input class="txt8" type="password" name="confirmpassword" id="name" class="form-control" autocomplete="off" placeholder = "Repita su nueva contraseña">
									</div>
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


	<?php include('../include/usuario/footer.php') ?>
</body>
</html>