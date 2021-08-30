<?php

// Conexion base de datos
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

$sql ='SELECT  id_productos, nombre_productos, modelo, serie, fecha_alta, fecha_baja, activo, c.nombre_categorias, b.nombre_marca, c.nombre_categorias, d.username
	   FROM productos as a, marcas as b, categorias as c, usuarios as d 
	   WHERE a.id_marca=b.id_marca and a.id_categorias=c.id_categorias and a.id_usuario=d.id_usuario';

$statement = $conexion->prepare($sql);
$statement->execute();
$productos = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset ($_POST['delete_id'])) {
	// sql to delete a record
	$delete_id = $_POST['delete_id'];
	$sqldel = "DELETE FROM productos WHERE id_productos=:delete_id ";
	$statement2 = $conexion->prepare($sqldel);
	if ($statement2->execute([':delete_id' => $delete_id])) {
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
<?php include("../include/usuario/header.php")?>
<a class="txt72" href="addproducto.php">Agregar Dispositivo</a>		
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table200">	
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Dispositivo</th>
									<th class="cell100 column2">Marca</th>
									<th class="cell100 column2">Modelo</th>
									<th class="cell100 column2">Tipo</th>
									<th class="cell100 column2">Serie</th>
									<th class="cell100 column2">Fecha alta</th>
									<th class="cell100 column2">Fecha baja</th>
									<th class="cell100 column2">Usuario</th>
									<th class="cell100 column2">Estado</th>
									<?php if(($auth-> id_usuario) == 1){
											echo "<th class='cell100 column3'>Opciones</th>";
										}
									?> 	
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php foreach($productos as $produc): ?>
								<tr class="row100 body">
									<td class="cell100 column1"><?= $produc->nombre_productos; ?></td>
									<td class="cell100 column2"><?= $produc->nombre_marca; ?></td>
									<td class="cell100 column2"><?= $produc->modelo; ?></td>
									<td class="cell100 column2"><?= $produc->nombre_categorias; ?></td>
									<td class="cell100 column2"><?= $produc->serie; ?></td>
									<td class="cell100 column2"><?= $produc->fecha_alta; ?></td>
									<td class="cell100 column2"> 
									<?php if(($produc -> fecha_baja) == '0000-00-00'){
											echo '<span class="success"> Activo</span>';
										}else{
											echo '<span class="danger">'; echo $produc -> fecha_baja; echo '</span>';
										} ?> </span></td>

									</td>
									<td class="cell100 column2"><?= $produc->username; ?></td>
									<td class="cell100 column2"> 

										<?php if(($produc -> activo) == 1){
											echo '<span class="success"> Disponible</span>';
										}else{
											echo '<span class="danger"> No disponible</span>';
										} ?> </span></td>					
									<?php if(($auth-> id_usuario) == 1):?>
											<td class='cell100 column3'>
											<a href='editproducto.php?id_productos=<?= $produc->id_productos; ?>' class='btn btn-info'>Editar</a> 
											<a href='#delete<?= $produc->id_productos; ?>' data-toggle='modal' class='btn btn-danger'><?php if(($produc -> fecha_baja)== '0000-00-00'){ echo "Borrar/Baja";}else{echo "Borrar";}?></a> 
											</td>
									<?php endif; ?>
								</tr>
								<!--Delete Modal -->
								<div id="delete<?= $produc->id_productos;?>" class="modal fade" role="dialog">
            							<div class="modal-dialog">
               								<form method="post">
                    							<!-- Modal content-->
                    	    					<div class="modal-content">
                            						<div class="modal-header">
                                						<button type="button" class="close" data-dismiss="modal">&times;</button>
														<?php if(($produc -> fecha_baja) == '0000-00-00'){
														echo "<h4 class='modal-title'>Eliminar o dar de baja a producto</h4>";
														}else{
														echo "<h4 class='modal-title'>Eliminar producto</h4>";
														}
														?>
                           						 	</div>
                        							<div class="modal-body">
                                					<input type="hidden" name="delete_id" value="<?= $produc->id_productos; ?>">
                                					<div class="alert alert-danger">¿Desea borrar este producto: <strong>
														<?= $produc->nombre_productos; ?></strong>?</div>
                                        			<div class="modal-footer">
													<button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si, estoy seguro</button>
													<?php if(($produc -> fecha_baja) == '0000-00-00'){
													echo "<a class='btn btn-danger' href='bajaproducto.php?id_productos=$produc->id_productos'><span class='glyphicon glyphicon-trash'></span> Dar de baja</a>";
													}
													?>
													<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> No, dejalo por allí</button>
                                       		 </div>
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
						<a class="txt6" href="addproducto.php">Agregar dispositivo</a>
					</center>
				</div>
			</div>
		</div>
	</div>

    
	<?php include('../include/usuario/footer.php') ?>
</body>
</html>