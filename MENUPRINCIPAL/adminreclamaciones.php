<?php
include("../ConexionBD/Conection.php");

$consulta = "SELECT r.*, COALESCE(rs.estado, 'Reclamo Pendiente') AS estado_respuesta
             FROM reclamaciones r
             LEFT JOIN respuesta rs ON r.id = rs.id_reclamacion";
$resultado = $conex->query($consulta);

$consultaSugerencias = "SELECT * FROM sugenrencias";
$resultadoSugerencias = $conex->query($consultaSugerencias);


if (!$resultado) {
    die("Error en la consulta: " . $conex->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Reclamaciones</title>
      <link rel="icon" href="../img/Captura1.ico">
    <link href="../css/cssadminreclamaciones.css" rel="stylesheet" type="text/css"/>
</head>
<body> 
     <div class="container">
    <h2>Registro de Reclamaciones</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Tipo de Reclamación</th>
            <th>Descripción</th>
            <!--th>Foto</th-->
            <th>Fecha de Registro</th>
             <th>Estado de Respuesta</th> 
            <!-- Agrega más encabezados según sea necesario -->
        </tr>

        <?php
        while ($fila = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $fila['id'] . '</td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['apellido'] . '</td>';
            echo '<td>' . $fila['email'] . '</td>';
            echo '<td>' . $fila['telefono'] . '</td>';
            echo '<td>' . $fila['tipo_reclamacion'] . '</td>';
            echo '<td>' . $fila['descripcion'] . '</td>';
           // echo '<td><img src="' . $fila['foto'] . '" alt="Imagen de la reclamación" width="50"></td>';
            echo '<td>' . $fila['fecha_reg'] . '</td>';
            echo '<td>' . $fila['estado_respuesta'] . '</td>';
            // Agrega más celdas según sea necesario
            echo '</tr>';
        }
        ?>
        
    </table>
    <h2>Registro de Sugerencias</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Número de Socio</th>
            <th>Email</th>
            <th>Tipo de Sugerencia</th>
            <th>Descripción</th>
            <th>Ser Contactado</th>
            <th>Comentarios Adicionales</th>
            <th>Fecha de Registro</th>
            <!-- Agrega más encabezados según sea necesario -->
        </tr>

        <?php
        if ($resultadoSugerencias) {
            while ($fila = $resultadoSugerencias->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $fila['id'] . '</td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['numero_socio'] . '</td>';
            echo '<td>' . $fila['email'] . '</td>';
            echo '<td>' . $fila['tipo_sugerencia'] . '</td>';
            echo '<td>' . $fila['descripcion'] . '</td>';
            echo '<td>' . $fila['ser_contactado'] . '</td>';
            echo '<td>' . $fila['comentarios_adicionales'] . '</td>';
            echo '<td>' . $fila['fecha_reg'] . '</td>';
            // Agrega más celdas según sea necesario
            echo '</tr>';
        }
        
            } else {
            echo '<tr><td colspan="9">Error en la consulta de sugerencias: ' . $conex->error . '</td></tr>';
        }
        ?>
    </table>
    <a href="../contenidoadmin.php"" class="button" onclick="history.go(-1);">Regresar</a>
     </div>
</body>
</html>
