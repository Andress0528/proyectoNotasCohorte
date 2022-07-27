<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();

	$sesion = $_SESSION['profesor'];

	if($sesion == null || $sesion == ''){
	    session_destroy();
	    header("Location: ../../index.php");
	}

	$codigo = $_GET['codigoCohorte'];
	$cod_profesor = $_GET['codProfesor'];


	$query = "SELECT * FROM cohorte WHERE codigo_cohorte = $codigo";
	$consulta = pg_query($conn, $query);
	$row = pg_fetch_array($consulta)

?>

<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "width = device width, initial-scale = 1">
	<link rel="stylesheet" href="estilos_cohorte.css">
	<link rel="icon" type="image/jpg" href="logito.ico">
	<title>Actualizar cohorte</title>
</head>
<body>
	<div class="capa"></div>
	<div id="main-container"></div>
	<table>
   	<tr>
   		<th style = "width: 500px">
   		<table>
    <thead> 
    	<tr>
	<th><h1>Ingrese los nuevos datos del cohorte: </h1></th>
	</tr>
    </thead>
    </table>
	<br><br>
	<div>
		<form action = "update.php?codProfesor=<?php echo $cod_profesor ?>" method = "POST">
			<input type="hidden" name="codigo_cohorte" value = "<?php echo $row['codigo_cohorte'] ?>">
			<input type="number" name="fk_estudiante_cod_estudiante" min = "1" placeholder = "Codigo estudiante" value = "<?php echo $row['fk_estudiante_cod_estudiante'] ?>">
			<br><br>
			<input type="number" name="fk_materia_cod_materia" min = "1" placeholder = "Codigo materia" value = "<?php echo $row['fk_materia_cod_materia'] ?>">
			<br><br>
			<input type="number" name="num_cohorte" min = "1" max = "3" placeholder="Numero de cohorte" value = "<?php echo $row['num_cohorte'] ?>" style="width : 155px">
			<br><br>
			<input type="number" name="nota_cohorte" min = "0" max = "5" step = "0.01" placeholder="Nota de Cohorte" value = "<?php echo $row['nota_cohorte'] ?>" style="width : 155px">
			<br><br>
			<input type="number" name="porcentaje_cohorte" min = "0" max = "100" placeholder="Porcentaje cohorte" value = "<?php echo $row['porcentaje_cohorte'] ?>" style="width : 155px">
			<br><br>
			<input type="date" name="fecha_inicio"  max="2021-08-30" placeholder="Fecha inicio" value = "<?php echo $row['fecha_inicio'] ?>" style="width : 155px">
			<br><br>
			<input type="date" name="fecha_final" max="2021-08-30" placeholder="Fecha de nacimiento" value = "<?php echo $row['fecha_final'] ?>" style="width : 155px">
			<br><br>

			<input type="submit" value = "Actualizar">


			
		</form>
	</div>
	</th>
	</tr>
	</table>
	<br>
    <center><a href="cohorte.php?insertar=true&cod=<?php echo $cod_profesor?>" class="btn btn-red">Cancelar</a></center> 

</body>
</html>