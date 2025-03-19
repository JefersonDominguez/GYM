

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Responder Reclamación</title>
     <link rel="icon" href="../img/Captura1.ico">
    <link href="../css/cssResponderReclamacion.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   
    <br><br>
    <form method="post" action="procesar_respuesta.php">
        <h2>Responder Reclamación</h2>
        <label for="id_reclamacion"><strong>Seleccione la reclamación:</strong></label>
        <select name="id_reclamacion" required>
            <?php
            // Incluye el archivo de conexión a la base de datos
            include("../ConexionBD/Conection.php");

            // Consulta para obtener las reclamaciones sin respuesta
            $consulta_reclamaciones = "SELECT r.id, r.nombre, r.tipo_reclamacion, r.descripcion
                                       FROM reclamaciones r
                                       LEFT JOIN respuesta rs ON r.id = rs.id_reclamacion
                                       WHERE rs.id_reclamacion IS NULL";

            $resultado_reclamaciones = $conex->query($consulta_reclamaciones);

            if (!$resultado_reclamaciones) {
                die("Error en la consulta de reclamaciones: " . $conex->error);
            }

            // Mostrar opciones en el menú desplegable
            while ($fila_reclamacion = $resultado_reclamaciones->fetch_assoc()) {
                echo '<option value="' . $fila_reclamacion['id'] . '">' . $fila_reclamacion['nombre'] . ' - ' . $fila_reclamacion['tipo_reclamacion'] . ' - ' . $fila_reclamacion['descripcion'] .'</option>';
            }
            ?>
        </select>
        <br><br>

        <label for="respuesta"><strong>Respuesta:</strong></label>
        <textarea name="respuesta" required></textarea>

        <label for="estado"><strong>Estado:</strong></label>
        <select name="estado" required>
            <option value="Reclamo Pendiente">Reclamo Pendiente</option>
            <option value="Reclamo Atendido">Reclamo Atendido</option>
        </select>
        <br>
        <br>
        <center><button type="submit">Enviar Respuesta</button> </center>
    </form>

   
    <center><button class="regresar-btn" onclick="window.location.href='../contenidoadmin.php'">Regresar</button></center>
</body>
</html>