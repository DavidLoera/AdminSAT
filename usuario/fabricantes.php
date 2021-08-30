<?php
session_start();
require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

//SQL Autentificacion Administrador
$usuario2 = $_SESSION["s_usuario"];
$sqlauth= "SELECT id_usuario from usuarios WHERE username = '$usuario2' or email = '$usuario2'";
$statementauth = $conexion->prepare($sqlauth);
$statementauth->execute();
$auth= $statementauth->fetch(PDO::FETCH_OBJ);

$sql = 'SELECT * FROM marcas';
$statement = $conexion->prepare($sql);
$statement->execute();
$fabricantes = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset ($_POST['delete_id'])) {
	// sql to delete a record
	$delete_id = $_POST['delete_id'];
	$sqldel = "DELETE FROM marcas WHERE id_marca=:delete_id ";
	$statement2 = $conexion->prepare($sqldel);
	if ($statement2->execute([':delete_id' => $delete_id])) {
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
<a class="txt7" href="addfabricante.php">Agregar Fabricante</a>
		<div class="container-table100">
			<div class="wrap-table100">	
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column8">Fabricante</th>
									<th class="cell100 column9">Estado</th>
									<?php if(($auth-> id_usuario) == 1){
									echo "<th class='cell100 column10'>Opciones</th>";
								}
								?> 
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php foreach($fabricantes as $fabri): ?>
								<tr class="row100 body">
									<td class="cell100 column8"><?= $fabri->nombre_marca; ?></td>
									<td class="cell100 column9"> 

										<?php if(($fabri -> activo_marca) == 1){
											echo '<span class="success"> Disponible</span>';
										}else{
											echo '<span class="danger"> No disponible</span>';
										} ?> 
									
									</td>
									<?php if(($auth-> id_usuario) == 1){
											echo "<td class='cell100 column10'>";
											echo "<a href='editfabricante.php?id_marca=$fabri->id_marca' class='btn btn-info'>Editar</a> ";
											echo "<a href='#delete$fabri->id_marca' data-toggle='modal' class='btn btn-danger'>Borrar</a>";
											echo "</td>";
										}
									?> 
									
								</tr>
								<!--Delete Modal -->
									<div id="delete<?= $fabri->id_marca;?>" class="modal fade" role="dialog">
            							<div class="modal-dialog">
               								<form method="post">
                    							<!-- Modal content-->
                    	    					<div class="modal-content">
                            						<div class="modal-header">
                                						<button type="button" class="close" data-dismiss="modal">&times;</button>
                                						<h4 class="modal-title">Eliminar fabricante</h4>
                           						 	</div>
                        							<div class="modal-body">
                                					<input type="hidden" name="delete_id" value="<?= $fabri->id_marca; ?>">
                                					<div class="alert alert-danger">¿Desea borrar este fabricante: <strong>
														<?= $fabri->nombre_marca; ?></strong>?</div>
                                        			<div class="modal-footer">
                                            		<button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si, estoy seguro</button>
                                            		<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> No, dejalo por allí</button>
                                       		 </div>
                                    	</div>
                                	</div>
                            </form>
                        </div>
                    </div>				
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<center>
					<a class="txt6" href="addfabricante.php">Agregar fabricante</a>
					</center>
				</div>
			</div>
		</div>
	</div>

					
	<?php include('../include/usuario/footer.php') ?>
</body>
</html>