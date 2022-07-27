<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();

	$fk_estudiante_cod_estudiante = $_POST['fk_estudiante_cod_estudiante'];
	$fk_materia_cod_materia = $_POST['fk_materia_cod_materia'];



	$query = "DELETE FROM matricula WHERE fk_estudiante_cod_estudiante = $fk_estudiante_cod_estudiante AND fk_materia_cod_materia = $fk_materia_cod_materia";
	$consulta = pg_query($conn, $query);

	if($consulta){
		Header("Location: formatoInscripcion.php?cod=$fk_estudiante_cod_estudiante");
	}

?>