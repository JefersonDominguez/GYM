<!DOCTYPE html>
<html>
    <head>
        <title>Procesar Sugerencia - Smart Fit Gym</title>
        <link rel="icon" href="img/Captura1.ico">
        <link href="css/cssprocesar_sugere.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Procesamiento de Sugerencia</h1>
        <hr size="20px" color="#F43C14 " />
        <?php
        //Incluir Conexion a BD
        include("ConexionBD/Conection.php");



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $numero_socio = $_POST["numero_socio"];
            $email = $_POST["email"];
            $tipo_sugerencia = $_POST["tipo_sugerencia"];
            $descripcion = $_POST["descripcion"];

            $contacto = $_POST["contacto"];
            $comentarios = $_POST["comentarios"];
            $fecha_reg_sug = date("d/m/y");

            echo "<p><strong>Nombre:</strong> $nombre</p>";
            echo "<p><strong>Número de Socio:</strong> $numero_socio</p>";
            echo "<p><strong>Correo Electrónico:</strong> $email</p>";
            echo "<p><strong>Tipo de Sugerencia:</strong> $tipo_sugerencia</p>";
            echo "<p><strong>Descripción de la Sugerencia:</strong> $descripcion</p>";
            echo "<p><strong>Desea ser contactado:</strong> $contacto</p>";
            echo "<p><strong>Comentarios Adicionales:</strong> $comentarios</p>";

            // Verificamos si se ha subido una imagen
            if (isset($_FILES['foto'])) {
                if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
                    // Ruta donde se almacena temporalmente la imagen
                    $ruta_temporal = $_FILES['foto']['tmp_name'];

                    // Nombre original de la imagen
                    $nombre_original = $_FILES['foto']['name'];

                    // Carpeta de destino
                    $carpeta_destino = "carpeta_destino/";

                    // Asegúrate de que la carpeta de destino exista
                    if (!file_exists($carpeta_destino)) {
                        mkdir($carpeta_destino, 0777, true);
                    }

                    // Movemos la imagen a una ubicación permanente
                    $ruta_permanente = $carpeta_destino . $nombre_original;

                    // Verificamos si la operación de mover es exitosa
                    if (move_uploaded_file($ruta_temporal, $ruta_permanente)) {
                        // Mostramos la imagen en la página
                        echo '<p><strong>Imagen:</strong></p>';
                        echo '<img src="' . $ruta_permanente . '" alt="Imagen de la sugerencia">';
                    } else {
                        // Muestra mensajes de error
                        echo '<p><strong>Error al subir la imagen:</strong> No se pudo mover el archivo.</p>';
                    }
                } else {
                    // Muestra mensajes de error
                    echo '<p><strong>Error al subir la imagen:</strong> ' . $_FILES['foto']['error'] . '</p>';
                }
            } else {
                // Muestra un mensaje indicando que no se subió ninguna imagen
                echo '<p><strong>No se subió ninguna imagen.</strong></p>';
            }
        } else {
            echo "<p>No se recibieron datos del formulario.</p>";
        }


        $consulta_sug = "INSERT INTO sugenrencias( nombre, numero_socio, email, tipo_sugerencia, descripcion, ser_contactado, comentarios_adicionales, foto, fecha_reg) VALUES ('$nombre','$numero_socio','$email','$tipo_sugerencia','$descripcion','$contacto','$comentarios','$ruta_permanente',' $fecha_reg_sug')";
        $resultado_sug = mysqli_query($conex,$consulta_sug);
        ?>
        <a href="index.php">Volver</a>
    </body>
</html>
