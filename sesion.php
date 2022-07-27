<?php 
$host = "ec2-23-20-124-77.compute-1.amazonaws.com";
$dbname = "d5e85ocvqe3mr8";
$user = "ltuplbpywjpcpp";
$password = "288b4943760ea93f9bacf926721bc72e533771f06bb2b53714920c85299ce9cf";
$conexion = pg_connect("host =$host dbname = $dbname user = $user password = $password");

$usuario = $_POST['user'];
$contraseña = $_POST['contra'];

$queryAlumnos = "SELECT * from usuarios_alumnos WHERE usuario = '$usuario' AND contrasenia = '$contraseña'";
$consultaAlumnos = pg_query($conexion, $queryAlumnos);

$queryProfesores = "SELECT * from usuarios_profesores WHERE usuario = '$usuario' AND contrasenia = '$contraseña'";
$consultaProfesores = pg_query($conexion, $queryProfesores);

$queryRectorAdmins = "SELECT * from usuario_rector WHERE usuario = '$usuario' AND contrasenia = '$contraseña'";
$consultaRectorAdmins = pg_query($conexion, $queryRectorAdmins);

if(pg_num_rows($consultaAlumnos) > 0){
	session_start();
	$_SESSION['alumno'] = $usuario;
	header("location: alumnos/home.php?cod=$usuario");
	exit();
} else if(pg_num_rows($consultaProfesores) > 0){
	session_start();
	$_SESSION['profesor'] = $usuario;
	header("location: profesores/home.php?cod=$usuario");
	exit();
} else if(pg_num_rows($consultaRectorAdmins) > 0){
	session_start();
	$_SESSION['rector'] = $usuario;
	header("location: rector/home.php");
	exit();
} else {
	
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content="width = device-width, initial-scale = 1.0">
	<title>Login</title>
	<link rel="stylesheet" href="estilos_login.css">
	<link rel="icon" type="image/jpg" href="logito.ico">
</head>
<body>
        <br>
        <br>
        <br>
        <center><b class="btn btn-red">☒ ERROR DATOS INCORRECTOS: Asegúrese de que los datos administrados sean correctos.</b></center>
	<div class="login-box">
		<img class="avatar" src="grulla.png" alt="logo U">
	<form action = "sesion.php" method = "POST">
		<input type="text" name="user" placeholder="Ingrese su usuario">
		<br><br>
		<input type="password" name="contra" placeholder="Ingrese su contraseña">
		<br><br>
		<input type="submit" value="Ingresar"></input>
		<a>Recuerde ingresar según su tipo de usuario:</a><br>
        <a>Rector ➞ Nombre establecido</a><br>
        <a>Profesor ➞ Codigo del profesor registrado </a><br>
        <a>Estudiante ➞ Codigo del estudiante registrado </a><br>
        
	</form>
</body>
</html>