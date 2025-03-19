<?php
// procesar_respuesta.php

include("../ConexionBD/Conection.php");

// Variable para almacenar el mensaje
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos del formulario
    $id_reclamacion = $_POST['id_reclamacion'];
    $respuesta_texto = $_POST['respuesta'];
    $estado = $_POST['estado'];

    // Insertar en la tabla de respuestas
    $insert_query = "INSERT INTO respuesta (id_reclamacion, respuesta_texto, estado) VALUES ($id_reclamacion, '$respuesta_texto', '$estado')";
    
    if ($conex->query($insert_query) === TRUE) {
        // Asignar el mensaje de éxito
        $message = "Respuesta enviada con éxito.";
    } else {
        // Asignar el mensaje de error
        $message = "Error al enviar la respuesta: " . $conex->error;
    }
} else {
    echo "Acceso no permitido.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <script>
        // Función JavaScript para mostrar el mensaje y redirigir después de un tiempo
        function showMessageAndRedirect(message) {
            alert(message); // Puedes personalizar esto según tus necesidades
            // O puedes utilizar librerías como SweetAlert para una apariencia más atractiva
            // swal(message);
            
            // Redirigir a la página RsponderReclamaciones.php después de 3 segundos (3000 milisegundos)
            setTimeout(function() {
                window.location.href = 'ResponderReclamacion.php';
            }, 3000); // 3000 milisegundos = 3 segundos
        }

        // Función para actualizar el contenido del elemento con el mensaje
        function updateMessage() {
            var messageElement = document.getElementById('message');
            messageElement.innerHTML = "<?php echo $message; ?>";
            showMessageAndRedirect("<?php echo $message; ?>");
        }

        // Llamar a la función al cargar la página
        window.onload = updateMessage;
    </script>
</head>
<body>
    <div id="message"></div>
    <!-- Resto del contenido HTML si es necesario -->
</body>
</html>