<?php include("../config/auth.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("../include/usuario/head.php")?>
<link rel="stylesheet" href="../public/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="../public/fullcalendar/fullcalendar.print.css" media="print">
</head>
<body>
	<div class="limiter">
        <?php include("../include/usuario/header.php")?>
	    <div class="container-login200">
		    <div class="wrap-login200">
				<div class="col-md-4">
					<div class="card">
		  				<div class="cardHeader">
		    				<h1><?php echo date('d'); ?></h1>
		 				 </div>
		 					<div class="cardContainer">
			  				<center>
							<p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
							</center>
		 					</div>
					</div>
					<br>
					<div class="card2">
		  				<div class="cardHeader2">
							<h1><?php echo date('d'); ?></h1>
							<h5>Dispostivios en total</h5>
		 				 </div>
		 					<div class="cardContainer2">
			  				<center>
							<p><a href="./productos.php">Más información</a></p>
							</center>
		 					</div>
					</div> 			 			
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