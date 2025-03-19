
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Preguntas Frecuentes para el Administrador</title>
    <link rel="icon" href="../img/Captura1.ico">

    
    <link href="../css/cssadminPreguntasFrecuentes.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <!-- Formulario para ingresar nueva pregunta -->
   
    <form action="procesar_pregunta.php" method="post">
        <h1>Ingrese Nueva Pregunta</h1>
        <label for="pregunta"><strong>Pregunta:</strong></label>
        <input type="text" id="pregunta" name="pregunta" required>

        <label for="respuesta"><strong>Respuesta:</strong></label>
        <textarea id="respuesta" name="respuesta" rows="4" required></textarea>

        <center><button type="submit">Agregar Pregunta</button></center>
    </form>

  
    <button onclick="window.location.href='../contenidoadmin.php'">Regresar</button>

</body>
</html>