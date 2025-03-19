 
<?php
// Incluir Conexion a BD
include('../ConexionBD/conection.php');

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

// Recuperamos los datos del formulario
    $pregunta = $_POST["pregunta"];
    $respuesta = $_POST["respuesta"];

    // Mostramos los datos
    echo "<h2>Resumen de la Pregunta</h2>";
    echo "<hr size='20px' color='#F43C14' />";
    echo "<p><strong>Pregunta:</strong> $pregunta</p>";
    echo "<p><strong>Respuesta:</strong></p>";
    echo "<p>$respuesta</p>";

    

   
// GUARDAMOS LOS DATOS EN LA BASE DE DATOS
    $consulta = "INSERT INTO preguntas_frecuentes(pregunta, respuesta) VALUES ('$pregunta','$respuesta')";
    $resultado = mysqli_query($conex, $consulta);
}
?>

 <a href="../contenidoadmin.php">Regresar</a>