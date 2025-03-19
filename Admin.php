<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Fit Gym</title>
    <link rel="icon" href="img/Captura1.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="css/cssinicioadmin.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido al Panel de Administrador</h1>
        </header>

        <?php
        // Incluye el archivo de conexión a la base de datos
            include("ConexionBD/Conection.php");
            
      // Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar las credenciales desde la base de datos
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta para verificar las credenciales (usa sentencias preparadas para mayor seguridad)
    $stmt = $conex->prepare("SELECT * FROM usuariosadmin WHERE nombre_usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si las credenciales son correctas
    if ($result->num_rows == 1) {
        // Iniciar sesión (esto es solo un ejemplo, deberías usar un sistema de autenticación más seguro)
        session_start();
        $_SESSION["usuario"] = $usuario;

        // Redirigir a la página principal
        header("Location: contenidoadmin.php");
        exit();
    } else {
        echo "<p class='error'>Credenciales incorrectas. Inténtalo de nuevo.</p>";
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conex->close();
}
?>
        

        <form method="post" action="">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <div class="password-container">
                <input type="password" id="contrasena" name="contrasena" required>
                <i id="toggle-icon" class="fas fa-eye" onclick="togglePassword()"></i>
            </div>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
<script src="js/inicioadmin.js"></script>