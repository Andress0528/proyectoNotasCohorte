<?php
    session_start();

    $sesion = $_SESSION['profesor'];

    if($sesion == null || $sesion == ''){
        session_destroy();
        header("Location: ../index.php");
    }

    $cod_profesor = $_GET['cod']; 


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
            <a href="crudEstudiante\estudiante.php?cod=<?php echo $cod_profesor?>"><span class="icon icon-eye "></span>   Ver estudiantes</a>
            <a href="crudCohorte\cohorte.php?insertar=true&cod=<?php echo $cod_profesor?>"><span class="icon icon-drawer "></span>   Administrar cohortes</a>
        </nav>
        <label for="btn-menu">✖️</label>
    </div>
</div>
</body>
</html>