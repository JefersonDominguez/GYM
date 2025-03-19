<!DOCTYPE html>
<html>
    <head>
        <title>Procesamiento de Contacto</title>
    </head>
    <body>
        <h1>Resumen del Contacto</h1>
        <hr size="20px" color="#F43C14 " />
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $name = $_POST["cf-name"];
    $email = $_POST["cf-email"];
    $tel = $_POST["cf-tel"];
    $message = $_POST["cf-message"];

    // Configura la dirección de correo a la que deseas recibir los mensajes
    $to = "tucorreo@example.com"; // Reemplázalo con tu dirección de correo electrónico

    // Asunto del correo
    $subject = "Nuevo mensaje de contacto";

    // Cuerpo del correo
    $body = "Nombre: $name\n";
    $body .= "Email: $email\n";
    $body .= "Teléfono: $tel\n";
    $body .= "Mensaje:\n$message";

    // Encabezados para el correo
    $headers = "From: $email";

    // Envía el correo
    mail($to, $subject, $body, $headers);

    // Muestra un mensaje de agradecimiento en la misma página
    echo "<h1>Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.</h1>";
}
?>

        <br>
        <a href="index.php">Volver</a>
    </body>
</html>
