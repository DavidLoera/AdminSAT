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

$sql = 'SELECT * FROM usuarios';

$statement = $conexion->prepare($sql);
$statement->execute();
$usuarios = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset ($_POST['delete_id'])) {
	// sql to delete a record
	$delete_id = $_POST['delete_id'];
	$sqldel = "DELETE FROM usuarios WHERE id_usuario=:delete_id ";
	$statement2 = $conexion->prepare($sqldel);
	if ($statement2->execute([':delete_id' => $delete_id])) {
 	 header("Location: ../usuario/configuracion.php");
	}
}

//SQL Update usuario

if (isset ($_POST['usua_id'])) {
	$usua_id = $_POST['usua_id'];
	$name = $_POST['username'];
	$email= $_POST['email'];
	$newpass = $_POST['newpass'];
	$pass = md5($newpass);
	$masterpass = $_POST['masterpass'];

	$sqlupdate = "UPDATE usuarios SET username=:username, password=:password, email=:email, masterpass=:masterpass where id_usuario=:usua_id";
	$statementpass = $conexion->prepare($sqlupdate);
	if ($statementpass->execute([':username' => $name, ':password' => $pass, ':email' => $email, ':masterpass' => $masterpass, ':usua_id' => $usua_id])) {
		header("Location: ../usuario/configuracion.php");
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
	
<?php $usuario = $_SESSION["s_usuario"]; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" hrf="#"> Sistema de administración -</a>
            <a href="https://www.sat.gob.mx/home"><img src="../public/images/sat.png" alt="Imagen SAT" style= "margin-left: -13px;"width="25" height="25"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link">Bienvenido al sistema: <a href="./configuracion.php"> <?php echo "$usuario" ?> </a> </p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./"><i class="fa fa-home"></i> Inicio</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./fabricantes.php"><i class="fa fa-building" aria-hidden="true"></i> Fabricante</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./categorias.php"><i class="fa fa-archive" aria-hidden="true"></i> Categorías</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./productos.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dispositivos</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"></i><a href="./reportes.php"><i class="fa fa-sticky-note" aria-hidden="true"></i> Reportes</a></p>
                    </li>    
                   <li class='nav-item active'>
                   <p class='nav-link'><a href='./configuracion.php'><i class='fa fa-cog' aria-hidden='true'></i> Configuración</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="#"></a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"></i><a id="butonlo" href="#"><i class="fa fa-window-close" aria-hidden="true"></i> Cerrar sesión</a></p>
                    </li>
                </ul>
            </div>
        </nav><br>

		<div class="container-table100">
			<div class="wrap-table100">	
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column10">Usuario</th>
									<th class="cell100 column10">Email</th>
									<th class="cell100 column10">Contraseña</th>
									<?php if(($auth-> id_usuario) == 1){
											echo "<th class='cell100 column10'>Contraseña</th>";
										}
									?> 
								</tr>
							</thead>
						</table>
					</div>
										
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php foreach($usuarios as $usua): ?>
								<tr class="row100 body">
									<td class="cell100 column10"><?= $usua->username; ?></td>
									<td class="cell100 column10"><?= $usua->email; ?></td>
									<td class="cell100 column10"> 

										<?php if(($usua-> password) == true){
											echo '<span class="success">';  echo 'Encriptada'; echo '</span>';
										}else{
											echo '<span class="danger"> No disponible</span>';
										} ?> 
									
									</td>
									
									<?php if(($auth-> id_usuario) == 1){
											echo "<td class='cell100 column10'>";
											echo "<a href='#changepass$usua->id_usuario' data-toggle='modal' class='btn btn-info'>Editar</a> ";
											echo "<a href='#delete$usua->id_usuario' data-toggle='modal' class='btn btn-danger'>Borrar</a>";
											echo "</td>";
										}
									?> 
								</tr>
								<?php if(($usua->id_usuario) == 1): ?>
								<!--Delete Modal -->
									<div id="delete<?= $usua->id_usuario;?>" class="modal fade" role="dialog">
            							<div class="modal-dialog">
               								<form method="post">
                    							<!-- Modal content-->
                    	    					<div class="modal-content">
                            						<div class="modal-header">
                                						<button type="button" class="close" data-dismiss="modal">&times;</button>
                                						<h4 class="modal-title">Ooooops.... </h4>
                           						 	</div>
                        							<div class="modal-body">
                                					<input type="hidden" name="delete_id" >
                                					<div class="alert alert-danger">No puedes borrar este usuario: <strong>
														<?= $usua->username; ?></strong></div>
                                        			<div class="modal-footer">
                                            		<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Ok, lo entiendo</button>
                                       		 </div>
                                    	</div>
                                	</div>
                            </form>
                        </div>
                    </div>
				<?php else: ?>
								<!--Delete Modal -->
								<div id="delete<?= $usua->id_usuario;?>" class="modal fade" role="dialog">
            							<div class="modal-dialog">
               								<form method="post">
                    							<!-- Modal content-->
                    	    					<div class="modal-content">
                            						<div class="modal-header">
                                						<button type="button" class="close" data-dismiss="modal">&times;</button>
                                						<h4 class="modal-title">Eliminar usuario</h4>
                           						 	</div>
                        							<div class="modal-body">
                                					<input type="hidden" name="delete_id" value="<?= $usua->id_usuario; ?>">
                                					<div class="alert alert-danger">¿Desea borrar este usuario: <strong>
														<?= $usua->username; ?></strong>?
														<br><strong>Nota: </strong>Si borra un usuario con registros vinculados podría haber perdida de información, <strong>¿Estas seguro de eliminarlo?</strong>
													</div>
                                        			<div class="modal-footer">
                                            		<button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si, estoy seguro</button>
                                            		<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> No, dejalo por allí</button>
                                       		 </div>
                                    	</div>
                                	</div>
                            </form>
                        </div>
                    </div>		
				<?php endif; ?>
				
				<div id="changepass<?= $usua->id_usuario;?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
						<form method="post">
                            <!-- Modal content-->
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Actualizar credenciales</h4>
                                    </div>
                                    <div class="modal-body">
									<div class="form-group">
											<input type="hidden" name="usua_id" value="<?= $usua->id_usuario; ?>">
                                            <label class="control-label col-sm-7" for="name">Nombre:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" value="<?= $usua->username; ?>" required autofocus autocomplete="off"> </div>
                                        </div><br>
										<div class="form-group">
                                            <label class="control-label col-sm-7" for="name">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" value="<?= $usua->email; ?>" required  autofocus autocomplete="off"> </div>
                                        </div><br>
										<div class="form-group">
                                            <label class="control-label col-sm-7" for="name">Nueva contraseña:</label>
                                            <div class="col-sm-10">
											<div class="input-group">
             								<input id="txtPassword" type="Password" name="newpass" required  class="form-control">
              								<div class="input-group-append">
                    							<button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                  							</div>
           									</div>
										</div><br>
										<?php if(($usua->id_usuario) == 1): ?>
											<div class="form-group">
                                            <label class="control-label col-sm-7" for="name">Contraeña maestra:</label>
                                            <div class="col-sm-10">
											<div class="input-group">
             								<input id="txtPasswordd" type="Password" name="masterpass" value="<?= $usua->masterpass; ?>" class="form-control" readonly>
              								<div class="input-group-append">
                    							<button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPasswordd()"> <span class="fa fa-eye-slash icon"></span> </button>
                  							</div>
           									</div>
										</div><br>
										<?php endif; ?>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info" name="changepass">Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('../include/usuario/footer.php') ?>

	<script type="text/javascript">
		function mostrarPassword(){
			var cambio = document.getElementById("txtPassword");
			if(cambio.type == "password"){
				cambio.type = "text";
				$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
			}else{
				cambio.type = "password";
				$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
			}
		} 
	
		$(document).ready(function () {
		//CheckBox mostrar contraseña
		$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
		});

		
	});
	</script>	
	
	<script type="text/javascript">
		function mostrarPasswordd(){
			var cambio2 = document.getElementById("txtPasswordd");
			if(cambio2.type == "password"){
				cambio2.type = "text";
				$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
			}else{
				cambio2.type = "password";
				$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
			}
		} 
	
		$(document).ready(function () {
		//CheckBox mostrar contraseña
		$('#ShowPassword2').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
		});

		
	});
	</script>
</body>
</html>