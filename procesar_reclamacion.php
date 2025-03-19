





<!DOCTYPE html>
<html>
    <head>
        <title>Procesamiento de Reclamación</title>
        <link rel="icon" href="img/Captura1.ico">
        <link href="css/cssprocesar_reclama.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       
        <h2>Resumen de la Reclamación</h2>
        <hr size="20px" color="#F43C14 " />
        <?php

        //Incluir Conexion a BD
        include("ConexionBD/Conection.php");
        

        // Verificamos si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recuperamos los datos del formulario
            $nombre = $_POST["txtNombre"];
            $apellido = $_POST["txtApellido"];
            $correo = $_POST["txtEmail"];
            $telefono = $_POST["txtTelefono"];
            $tipoReclamacion = $_POST["cboTipoReclamacion"];
            $descripcion = $_POST["txtDescripcion"];
            $fecha_reg = date("d/m/y");

            // Mostramos los datos
            echo "<p><strong>Nombre:</strong> $nombre</p>";
            echo "<p><strong>Apellido:</strong> $apellido</p>";
            echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
            echo "<p><strong>Teléfono:</strong> $telefono</p>";
            echo "<p><strong>Tipo de Reclamación:</strong> $tipoReclamacion</p>";
            echo "<p><strong>Descripción de la Reclamación:</strong></p>";
            echo "<p>$descripcion</p>";

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
                        echo '<img src="' . $ruta_permanente . '" alt="Imagen de la reclamación">';
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
            // Si no se ha enviado el formulario, mostrar un mensaje de error
            echo "El formulario no ha sido enviado.";
        }

        //GUARDAMOS LOS DATOS EN LA BASE DE DATOS
        $consulta = "INSERT INTO reclamaciones(nombre, apellido, email, telefono, tipo_reclamacion, descripcion, foto, fecha_reg) VALUES ('$nombre','$apellido','$correo',' $telefono','$tipoReclamacion','$descripcion','$ruta_permanente','$fecha_reg')";
        $resultado = mysqli_query($conex,$consulta);
        ?>

        <br>
        <a href="index.php">Volver</a>
    </body>
</html>
