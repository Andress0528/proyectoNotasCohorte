<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();

	$fk_estudiante_cod_estudiante = $_POST['fk_estudiante_cod_estudiante'];
	$num_cohorte = $_POST['num_cohorte'];
	$nota_cohorte = $_POST['nota_cohorte'];
	$porcentaje_cohorte = $_POST['porcentaje_cohorte'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_final = $_POST['fecha_final'];
	$fk_materia_cod_materia = $_POST['fk_materia_cod_materia'];

	if(strtotime($fecha_inicio) >= strtotime($fecha_final)){
		Header("Location:cohorte.php?insertar=false");
		die();
	} 


	$query = "INSERT INTO cohorte(fk_estudiante_cod_estudiante, nota_cohorte, porcentaje_cohorte, fecha_inicio, fecha_final, fk_materia_cod_materia, num_cohorte) VALUES($fk_estudiante_cod_estudiante, '$nota_cohorte', $porcentaje_cohorte, '$fecha_inicio', '$fecha_final', '$fk_materia_cod_materia', '$num_cohorte')";
	$consulta = pg_query($conn, $query);

	if($consulta){
		Header("Location:cohorte.php?insertar=true&cod=1");
	}

?>