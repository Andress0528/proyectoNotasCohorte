<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();
	$cod_profesor = $_GET['codProfesor'];

	$codigo_cohorte = $_POST['codigo_cohorte'];
	$fk_estudiante_cod_estudiante = $_POST['fk_estudiante_cod_estudiante'];
	$fk_materia_cod_materia = $_POST['fk_materia_cod_materia'];
	$num_cohorte = $_POST['num_cohorte'];
	$nota_cohorte = $_POST['nota_cohorte'];
	$porcentaje_cohorte = $_POST['porcentaje_cohorte'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_final = $_POST['fecha_final'];

	$query = "UPDATE cohorte SET fk_estudiante_cod_estudiante = $fk_estudiante_cod_estudiante, fk_materia_cod_materia = $fk_materia_cod_materia, num_cohorte = $num_cohorte, nota_cohorte = $nota_cohorte, porcentaje_cohorte = $porcentaje_cohorte, fecha_inicio = '$fecha_inicio', fecha_final = '$fecha_final' WHERE codigo_cohorte = $codigo_cohorte";
	$consulta = pg_query($conn, $query);
	
	if($consulta){
		Header("Location: cohorte.php?insertar=true&cod=$cod_profesor");
	}



?>