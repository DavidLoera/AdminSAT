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
				</div>
					<form class="login100-form validate-form">
						<span class="login100-form-title">
                        Ooops... Error 404 <br><br><br><br> Parece que la pagina que buscas no se encuentra :(
						</span>
						<div class="text-center p-t-136">
						<a class="txt2" >
							¿Deseas volver al <a class="txt2" href="index.php">Inicio?</a>
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
	<script src="public/endor/bootstrap/js/bootstrap.min.js"></script>
    <!--CSS Select2-->
	<script src="public/vendor/select2/select2.min.js"></script>
    <!--Script Animacion Jquery-->
	<script src="public/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
    <!--Script Animacion Imagen-->
	<script src="public/js/main.js"></script>
</body>
</html>