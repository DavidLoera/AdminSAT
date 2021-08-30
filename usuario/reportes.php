<?php include("../config/auth.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("../include/usuario/head.php")?>
</head>
<body>
<body>
<?php include("../include/usuario/header.php")?>
		<div class="container-table100">
			<div class="wrap-table100">	
				<div class="table100 ver2 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column7">Generar reporte de los dispositivos</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column7">Hola <a href="configuracion.php"><?php echo "$usuario" ?></a>, genera el reporte de todos tus dispositivos en un formato PDF :D <br><br>
									 Nota: si se demora mucho recargue la pagina	
									</td>
								</tr>
							</tbody>
						</table>
						<center>
						<a class="txt6" href="getreport.php">Generar Reporte</a>
						</center>
					</div>
				</div>
			</div>
		</div>

		

	<?php include('../include/usuario/footer.php') ?>
</body>
</html>