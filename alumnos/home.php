<?php
    session_start();
    $sesion = $_SESSION['alumno'];

    if($sesion == null || $sesion == ''){
        session_destroy();
        header("Location: ../index.php");
    }
    $cod_estudiante = $_GET['cod']; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/jpg" href="logito.ico">
</head>
<body>
    <header class="header">
        <div class="container">
        <div class="btn-menu">
            <label for="btn-menu">☰</label>
        </div>
            <div class="logo">
                <h1>INICIO</h1>
            </div>
            <nav class="menu">
                <a href="logout.php">Cerrar Sesión ⊝ </a>
            </nav>
        </div>
    </header>
    <div class="capa"></div>
<input type="checkbox" id="btn-menu">
<div class="container-menu">
    <div class="cont-menu">
        <nav>
            <a href="inscribirMateria\formatoInscripcion.php?cod=<?php echo $cod_estudiante?>"><span class="icon icon-book "></span>   Materias</a>
            <a href="verNotas\verNotas.php?cod=<?php echo $cod_estudiante?>"><span class="icon icon-eye "></span>   Ver notas</a>
        </nav>
        <label for="btn-menu">✖️</label>
    </div>
</div>
</body>
</html>