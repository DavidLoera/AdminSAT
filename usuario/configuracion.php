<?php include("../config/auth.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../include/usuario/head.php")?>

</head>
<body>
	<div class="limiter">
    <?php include("../include/usuario/header.php")?>
	    <div class="container-login200">
		    <div class="wrap-login200">
                <h5>Configuración</h5>
                <hr/>
						
		    </div>
		</div>
	</div>

    <!--Scipt Jquery-->
	<script src="../public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--CSS de Bootstrap-->
	<script src="../public/vendor/bootstrap/js/popper.js"></script>
	<script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--CSS Select2-->
	<script src="../public/vendor/select2/select2.min.js"></script>
    <!--Script Animacion Jquery-->
	<script src="../public/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
    <!--Script Validacion de Email-->
	<script src="../public/js/main.js"></script>
</body>
</html>