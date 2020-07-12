<!DOCTYPE html>
<html lang="es">
<head>
<?php include("include/head.php")?>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<a href="https://www.sat.gob.mx/home"><img src="public/images/sat.png" alt="IMG" ></a>
					<p><a class="txt4" href="https://www.sat.gob.mx/home">Servicio de administración tributaria</a></p>
				</div>
				<form class="login100-form validate-form" action="" id="formLogin" method="POST">
					<span class="login100-form-title">
                        Sistema de Verificación
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Se necesita un email valido: email@email.com">
						<input class="input100" type="text" name="email" id="usuario" placeholder="Correo de administrador">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="password" name="pass" id="password" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Entrar
						</button>
					</div>
					<br><a class="txt3" href="usuario.php">Entrar como usuario</a>
					<center>
					<p>¿No eres administrador, entra como usuario?</p>
					</center>
					<div class="text-center p-t-136">
						<a class="txt2" >
							Bienvenido al Sistema de administración. Por favor introduzca las credenciales para poder ver sus registros.
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!--Scipt Jquery-->
	<script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--CSS de Bootstrap-->
	<script src="public/vendor/bootstrap/js/popper.js"></script>
	<script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--CSS Select2-->
	<script src="public/vendor/select2/select2.min.js"></script>
    <!--Script Animacion Jquery-->
	<script src="public/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
    <!--Script Validacion de Email-->
	<script src="public/js/main.js"></script>
	<script src="public/js/login.js"></script>
	<script src="public/sweetalert2/sweetalert2.all.min.js"></script>    
</body>
</html>