<?php
session_start();

// Verificar si el administrador está autenticado
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet - Smart Fit Gym</title>
    <link rel="icon" href="img/Captura1.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="css/cssMenuadmin.css" rel="stylesheet" type="text/css"/>
    <link href="css/csscontenidoadmin.css" rel="stylesheet" type="text/css"/>

</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido al Panel de Administrador</h1>
            <p>Hola, <?php echo $_SESSION["usuario"]; ?> | <a href="index.php">Cerrar sesión</a></p>
        </header>

        <!-- Barra de menú -->
        <nav class="menu-con-fondo">
            <a href="MENUPRINCIPAL/formularioProductos.php">Productos</a>      
            <a href="MENUPRINCIPAL/ResponderReclamacion.php">Responder Reclamaciones</a>
            <a href="MENUPRINCIPAL/adminreclamaciones.php">Reclamaciones y Sugerencias</a>
            <a href="MENUPRINCIPAL/adminPreguntasFrecuentes.php">Preguntas Frecuentes</a>
           
        </nav>
        <!-- Nueva sección para la imagen -->
        <section class="imagen-seccion">
            <img src="img/hero-bg.jpg" alt="Imagen de fondo" width="100%">
        </section>
        
    </div>
</body>
</html>