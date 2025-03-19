<?php
// Inicia la sesión si aún no está iniciada (debes hacerlo antes de cerrar la sesión)
session_start();

// Destruye la sesión para cerrarla
session_destroy();

// Redirige al usuario a la página de inicio o a donde desees
header('Location: index.php'); // Cambia 'index.php' por la página a la que quieres redirigir al usuario
exit;
?>