<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);



function getConexion() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "bdutp";
    $port = "3306";
    $cn = mysqli_connect($hostname, $username, $password, $database, $port) or die("Error al conectar");
    return $cn;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = getConexion();

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $consulta = $conexion->prepare("SELECT ID, Pasword, Nombre FROM usuarios WHERE Correo = ?");
    $consulta->bind_param("s", $correo);
    $consulta->execute();
    $resultado = $consulta->get_result();

if ($usuario = $resultado->fetch_assoc()) {
    if (password_verify($contrasena, $usuario['Pasword'])) {
        $_SESSION['user_id'] = $usuario['ID'];
        $_SESSION['user_name'] = $usuario['Nombre'];

        // Regenerar ID de sesión y configurar cookie
        session_regenerate_id(true);

        header('Location: index.php');
        exit;
    }
}
    $error = 'Credenciales incorrectas';
    $consulta->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link href="css/csslogin.css" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
     <link rel="icon" href="img/Captura1.ico">
</head>
<body>
    
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
       
    <form method="post" action="login.php">
        <h2>Iniciar Sesión</h2>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <button type="submit">Iniciar Sesión</button>
        <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
    </form>
        <script src="js/añadircarrito.js" ></script>
</body>
</html>


