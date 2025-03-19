

<!DOCTYPE html>
<html lang="es">
<head>
    <link href="css/csslogin.css" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
     <link rel="icon" href="img/Captura1.ico">
    <style>
        /* Estilos para el pop-up */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
    </style>
</head>
<body>
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Registro exitoso. Bienvenido, <?php echo htmlspecialchars($nombre); ?>!</p>
        </div>
    </div>

    <form method="post" action="registro.php">
        <h2>Registro</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <button type="submit">Registrarse</button>
    </form>

    <script>
        <?php if ($registroExitoso): ?>
        var modal = document.getElementById("myModal");
        modal.style.display = "block";

        setTimeout(function() {
            modal.style.display = "none";
            window.location.href = 'login.php';
        }, 1000); // Redirige después de 1 segundo
        <?php endif; ?>
    </script>
</body>

</html>