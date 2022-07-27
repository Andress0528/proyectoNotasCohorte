<?php 
	session_start();
	include("conexion.php");
	$conn = conectar();

	$codigo_cohorte = $_GET['codigoCohorte'];
	$cod_profesor = $_GET['codProfesor'];

	$query = "DELETE FROM cohorte WHERE codigo_cohorte = $codigo_cohorte";
	$consulta = pg_query($conn, $query);

	if($consulta){
		Header("Location: cohorte.php?insertar=true&cod=$cod_profesor");
	}

?>