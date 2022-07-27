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
	 <link rel="stylesheet" href="estilos_ins_materia.css">
	 <link rel="icon" type="image/jpg" href="logito.ico">
	<title>Inscribir materia</title>
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
			<th style = "width: 500px">
				<h1>Inscribir materia: </h1>
					<form action = "inscribirMateria.php" method = "POST">
						<input type="number" name="fk_estudiante_cod_estudiante" min = "1" value="<?php echo $cod_estudiante ?>" readonly>
						<br><br>
						<input type="number" name="fk_materia_cod_materia" min = "1" placeholder="Codigo de materia">
						<br><br>
						<input type="submit">
					</form>
			</th>
			<th>
				<table>
					<tr>
						<thead>
						<th><h2>Materias inscritas: </h2></th>
						</thead>
						
					</tr>
					<tr>
						<?php 

							$query = "SELECT * FROM matricula WHERE fk_estudiante_cod_estudiante = $cod_estudiante ORDER BY fk_materia_cod_materia";
							$consulta = pg_query($conn, $query);
							

							while($row = pg_fetch_array($consulta)){
						?>
						<tr>
							<th><?php echo $row['fk_materia_cod_materia'] ?></th>
						</tr>
						<?php 
							}
						 ?>
					</tr>
				</table>
			</th>
			<th style="width: 1000px">
				<table border = "1" style="margin: 0 auto;">
					<thead>
						<tr>
							<h2>Materias disponibles: </h2>
							<th><h2>Código de materia</h2></th>
							<th><h2>Nombre de materia</h2></th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$queryMaterias = "SELECT * FROM materia ORDER BY cod_materia";
							$consultaMaterias = pg_query($conn, $queryMaterias);
							

							while($rowMaterias = pg_fetch_array($consultaMaterias)){
						?>
						<tr>
							<th><?php echo $rowMaterias['cod_materia'] ?></th>
							<th><?php echo $rowMaterias['nombre_materia'] ?></th>
						</tr>
						<?php 
							}
						 ?>
					</tbody>
				</table>
			</th>
		</tr>
		<tr>
			<th style = "width: 500px">
				<h1>Cancelar materia: </h1>
					<form action = "cancelarMateria.php" method = "POST">
						<input type="number" name="fk_estudiante_cod_estudiante" min = "1" value="<?php echo $cod_estudiante ?>" readonly>
						<br><br>
						<input type="number" name="fk_materia_cod_materia" min = "1" placeholder="Codigo de materia">
						<br><br>
						<input type="submit">
					</form>
			</th>
		</tr>
	</table>
</body>
</html>