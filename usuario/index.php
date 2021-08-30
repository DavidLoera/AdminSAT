<?php 

require_once '../config/database.php';
$objeto = new Conexion();
$conexion = $objeto->Conectarse();
date_default_timezone_set('America/Mexico_City');

$sql = 'SELECT * FROM productos';
$statement = $conexion->prepare($sql);
$statement->execute();
$productos = $statement->fetchAll(PDO::FETCH_OBJ);

//Contador Productos
$stmt = $conexion->query('SELECT * FROM productos');
$contadorprod= $stmt->rowCount();

//Contador Categorías
$stmt1 = $conexion->query('SELECT * FROM categorias');
$contadorcat= $stmt1->rowCount();

//Contador Categorías
$stmt2 = $conexion->query('SELECT * FROM marcas');
$contadorfab= $stmt2->rowCount();


$usuario = $_SESSION["s_usuario"];

?>

<?php include("../config/auth.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("../include/usuario/head.php")?>
</head>
<body>
	
		<?php include("../include/usuario/header.php")?>

		<h5 class = "box">Bienvenido, <?php echo $usuario ?></h5>
		<hr/>
		<center>
	    <div class="container-login00">
		    <div class="wrap-login00">
				<div class="col-md-4">
					<div class="card">
		  				<div class="cardHeader">
		    				<h1><?php echo date('d'); ?></h1>
		 				 </div>
		 					<div class="cardContainer">
			  				<center>
							<p>El día de hoy es: <?php echo  date('d').'-'.date('m').'-'.date('Y'); ?></p>
							</center>
		 					</div>
					</div><br><br>
					<div class="card2">
		  				<div class="cardHeader2">
							<h1> <?php echo $contadorprod ?> </h1>
							<h5>Dispostivios en total</h5>
		 				 </div>
		 					<div class="cardContainer2">
			  				<center>
							<p><a href="./productos.php">Más información</a></p>
							</center>
		 				</div>
					</div><br><br>
					<div class="card">
		  				<div class="cardHeader">
							<h1><?php echo $contadorcat?></h1>
							<h5>Categorías en total</h5>
		 				 </div>
		 					<div class="cardContainer2">
			  				<center>
							<p><a href="./categorias.php">Más información</a></p>
							</center>
		 				</div>
					</div><br><br>	
					<div class="card2">
		  				<div class="cardHeader2">
							<h1><?php echo $contadorfab?></h1>
							<h5>Fabricantes en total</h5>
		 				 </div>
		 					<div class="cardContainer2">
			  				<center>
							<p><a href="./fabricantes.php">Más información</a></p>
							</center>
		 				</div>
					</div> 					 			
				</div>
			</div>
		</div><br>
		</center>
	 

	

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
	<?php include('../include/usuario/footer.php') ?>
</body>
</html>