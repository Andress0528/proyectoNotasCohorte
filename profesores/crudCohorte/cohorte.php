<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();

	$sesion = $_SESSION['profesor'];

	if($sesion == null || $sesion == ''){
	    session_destroy();
	    header("Location: ../../index.php");
	}

	$cod_profesor = $_GET['cod'];
?>

<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "width = device width, initial-scale = 1">
	<link rel="stylesheet" href="estilos_cohorte.css">
	<link rel="icon" type="image/jpg" href="logito.ico">
	<title>Cohorte</title>
</head>
<body>
	<header class="header">
	<div class="container">
	<nav class="menu">
	<h2><a href="..\home.php?cod=<?php echo $cod_profesor ?>">⮌ Volver</a></h2>
	</nav>
    </div>
    </header>
	<div class="capa"></div>
	<div id="main-container"></div>

	<table>
		<tr>
			<?php 
				$insertar = $_GET['insertar'];
				if($insertar == "false"){
					echo '<script language = "javascript">alert("No se ha ingresado el cohorte, porque la fecha inicial no puede ser mayor a la fecha final");</script>';
				}

			?>
			<th style = "width: 500px">
				<h1>Agregar cohorte: </h1>
					<form action = "agregarCohorte.php?cod=$cod_profesor" method = "POST">
						<input type="number" name="fk_estudiante_cod_estudiante" min = "1" placeholder = "Codigo estudiante">
						<br><br>
						<input type="number" name="fk_materia_cod_materia" min = "1" placeholder="Codigo materia">
						<br><br>
						<input type="number" name="num_cohorte" min = "1" max = "3" placeholder="Numero cohorte" style="width : 155px">
						<br><br>
						<input type="number" name="nota_cohorte" min = "0" max = "5" step = "0.01" placeholder="Nota de cohorte" style="width : 155px">
						<br><br>
						<input type="number" name="porcentaje_cohorte" min = "0" max = "100" placeholder="Porcentaje cohorte" style="width : 155px">
						<br><br>
						<input type="date" name="fecha_inicio" max="2021-08-29"placeholder="Fecha de inicio" style="width : 155px">
						<br><br>
						<input type="date" name="fecha_final" max="2021-08-29" placeholder="Fecha de finalización" style="width : 155px">
						<br><br>
						<input type="submit">
					</form>
			</th>
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
							<th><h2>Editar</h2></th>
							<th><h2>Eliminar</h2></th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$query = "SELECT * FROM cohorte WHERE fk_materia_cod_materia IN (SELECT cod_materia FROM materia WHERE fk_profesor_cod_profesor = $cod_profesor) ORDER BY codigo_cohorte;";
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
							<th><a href=actualizarCohorte.php?codProfesor=<?php echo $cod_profesor ?>&codigoCohorte=<?php echo $row['codigo_cohorte'] ?> class="btn btn-blu">Editar</a></th></th>
							<th><a href=eliminarCohorte.php?codProfesor=<?php echo $cod_profesor ?>&codigoCohorte=<?php echo $row['codigo_cohorte'] ?> class="btn btn-red">Eliminar</a></th></th>
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