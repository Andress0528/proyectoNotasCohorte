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
	<link rel="stylesheet" href="estilos_est.css">
	<link rel="icon" type="image/jpg" href="logito.ico">
	<title>Estudiante</title>
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
			<th style="width: 1000px">
				<table>
					<thead>
						<tr>
							<th><h2>Código Estudiante</h2></th>
							<th><h2>Nombre</h2></th>
							<th><h2>Apellido</h2></th>
							<th><h2>Edad</h2></th>
							<th><h2>Género</h2></th>
							<th><h2>Fecha de nacimiento</h2></th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$query = "SELECT * FROM estudiante WHERE cod_estudiante IN (SELECT fk_estudiante_cod_estudiante FROM matricula WHERE fk_materia_cod_materia IN (SELECT cod_materia FROM materia WHERE fk_profesor_cod_profesor = $cod_profesor))";
							$consulta = pg_query($conn, $query);
							

							while($row = pg_fetch_array($consulta)){
						?>
						<tr>
							<th><?php echo $row['cod_estudiante'] ?></th>
							<th><?php echo $row['nombre'] ?></th>
							<th><?php echo $row['apellido'];  ?></th>
							<th><?php echo $row['edad'] ?></th>
							<th><?php echo $row['genero'] ?></th>
							<th><?php echo $row['fecha_nacim'] ?></th>
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