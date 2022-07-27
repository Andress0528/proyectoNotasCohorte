<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();
	$cod_estudiante = $_GET['cod'];

	$sesion = $_SESSION['alumno'];

	if($sesion == null || $sesion == ''){
	    session_destroy();
	    header("Location: ../../index.php");
	}

?>

<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "width = device width, initial-scale = 1">
	<link rel="stylesheet" href="estilos_nota.css">
	<link rel="icon" type="image/jpg" href="logito.ico">
	<title>Cohorte</title>
</head>
<body>
	<header class="header">
	<div class="container">
	<nav class="menu">
	<h2><a href="..\home.php?cod=<?php echo $cod_estudiante?>">⮌ Volver</a></h2>
	</nav>
    </div>
    </header>
	<div class="capa"></div>
	<div id="main-container"></div>

	<table>
		<tr>
			<th style="width: 1000px">
				<table>
					<thead>
						<tr>
							<th><h2>Código Cohorte</h2></th>
							<th><h2>Código Estudiante</h2></th>
							<th><h2>Código materia</h2></th>
							<th><h2>Numero cohorte</h2></th>
							<th><h2>Nota cohorte</h2></th>
							<th><h2>Porcentaje cohorte</h2></th>
							<th><h2>Fecha de inicio</h2></th>
							<th><h2>Fecha de finalización</h2></th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$query = "SELECT * FROM cohorte WHERE fk_estudiante_cod_estudiante = $cod_estudiante ORDER BY codigo_cohorte";
							$consulta = pg_query($conn, $query);
							

							while($row = pg_fetch_array($consulta)){
						?>
						<tr>
							<th><?php echo $row['codigo_cohorte'];  ?></th>
							<th><?php echo $row['fk_estudiante_cod_estudiante'];  ?></th>
							<th><?php echo $row['fk_materia_cod_materia'];  ?></th>
							<th><?php echo $row['num_cohorte'];  ?></th>
							<th><?php echo $row['nota_cohorte'];  ?></th>
							<th><?php echo $row['porcentaje_cohorte'] ?></th>
							<th><?php echo $row['fecha_inicio'] ?></th>
							<th><?php echo $row['fecha_final'] ?></th>
						</tr>
						<?php 
							}
						 ?>
					</tbody>
				</table>
			</th>
		</tr>
	</table>
</body>
</html>