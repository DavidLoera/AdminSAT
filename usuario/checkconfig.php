<?php

//Verficar usuario o email y la contrasena del sistema

session_start();

require '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();

//recepción de datos enviados mediante POST desde ajax
$password = $_POST['password'];

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

$consulta = "SELECT * FROM usuarios WHERE masterpass = '$pass'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount()==1){
    header("Location: ../usuario/configuracion.php");
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
	
    <div class="modal-dialog">
        <div class="alert alert-success">
        <strong>Recuerda!!</strong> Ingresar correctamente tu contraseña
        </div>
		<form method="post" id="formcheck" >
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Introduce la contraseña maestra</h4>
            </div>
                <div class="modal-body">
				<div class="form-group">
					<input type="hidden" name="usua_id" >
                    <label class="control-label col-sm-7" for="name">Contraseña maestra:</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id ="password"> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" >Entrar</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
     </div>

	<?php include('../include/usuario/footer.php') ?>

</body>
</html>