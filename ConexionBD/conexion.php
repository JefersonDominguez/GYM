
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado del Formulario</title>
        <link rel="icon" href="../img/Captura1.ico">
        <link href="../css/csscertificado.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form>   
            
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

// Función para obtener la conexión a la base de datos
        function getConexion() {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "bdutp";
            $port = "3306";
            $cn = mysqli_connect($hostname, $username, $password, $database, $port) or die("Error al conectar");

            return $cn;
        }

// Procesar el formulario cuando se envía
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger los datos del formulario
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $certificado = $_POST["certificado"];
            $fecha = $_POST["fecha"];

            // Procesar la imagen
            $imagenNombre = $_FILES["imagen"]["name"];
            $imagenTmpName = $_FILES["imagen"]["tmp_name"];
            $imagenSize = $_FILES["imagen"]["size"];

            // Directorio donde se guardan las imágenes (ajusta según tu configuración)
            $directorioDestino = "../img/producto/";

            // Verificar si el directorio de destino existe, si no, créalo
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0755, true);
            }

            // Mover la imagen al directorio de destino
            move_uploaded_file($imagenTmpName, $directorioDestino . $imagenNombre);

            // Obtener la conexión a la base de datos
            $conexion = getConexion();

            // Preparar la consulta SQL para insertar el nuevo producto
            $consulta = "INSERT INTO producto (nombre, descripcion, precio, foto, certificado, fecha) VALUES (?,?, ?, ?,?,?)";

            // Utilizar mysqli_prepare para evitar problemas de SQL Injection
            $stmt = mysqli_prepare($conexion, $consulta);

            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "ssdsss", $nombre, $descripcion, $precio, $imagenNombre, $certificado, $fecha);

            // Verificar si hubo un error al vincular los parámetros
            if (!$stmt) {
                echo "Error al vincular parámetros: " . mysqli_error($conexion);
            } else {
                // Ejecutar la consulta
                $resultado = mysqli_stmt_execute($stmt);

                // Verificar si hubo un error en la ejecución de la consulta
                if (!$resultado) {
                    echo "Error en la ejecución de la consulta: " . mysqli_error($conexion) . "<br>";
                    echo "Consulta SQL: " . $consulta;
                } else {
                    // Cerrar la sentencia y la conexión
                    mysqli_stmt_close($stmt);
                    mysqli_close($conexion);

                    // Verificar si la inserción fue exitosa
                    if ($resultado) {
                        echo "<p><strong>Producto agregado con éxito:</strong></p>";
                        echo "<ul>";
                        echo "<li>Nombre: $nombre</li>";
                        echo "<li>Descripción: $descripcion</li>";
                        echo "<li>Precio: S/$precio</li>";
                        echo "<li>Imagen: $imagenNombre</li>";
                        echo "<li>Certificado: $certificado</li>";
                        echo "<li>Fecha: $fecha</li>";
                        echo "</ul>";
                        ;
                    } else {
                        echo "Error al agregar el producto a la base de datos.";
                    }
                }
            }
        }
        ?>  
</form>
        <br><br>
        <?php
        include('../ConexionBD/Conection.php');
        $cadSQL = "SELECT * FROM producto WHERE certificado IS NOT NULL";
        $registros = mysqli_query($conex, $cadSQL);

// Initialize $resultados as an empty array
        $resultados = [];

        if ($registros && mysqli_num_rows($registros) > 0) {
            while ($row = mysqli_fetch_assoc($registros)) {
                $resultados[] = $row;
            }
        }
        mysqli_close($conex);

        $firma = "Jorge Chicana Aspajo";
        $jpegFilePath = '../img/Certificado.jpg';
        $font = "../fonts/BrittanySignature.ttf";

// Check if $resultados is not empty before using it
        if (!empty($resultados)) {
            foreach ($resultados as $fila) {
                $image = imagecreatefromjpeg($jpegFilePath);

                if (!$image) {
                    die('Error al cargar la imagen JPG');
                }

                $fontColor = imagecolorallocate($image, 7, 7, 7);

                // centrar el texto del certificado
                $text = $fila["certificado"];
                $fontSize = 20;
                $fontSizeL = 50;
                $textWidth = imagettfbbox($fontSize, 0, $font, $text);
                $textWidth = $textWidth[2] - $textWidth[0];
                $imageWidth = imagesx($image); // el ancho de la imagen
                $positionX = ($imageWidth - $textWidth) / 2;
                //imagettftext($image, $fontSize, 0, $positionX, 300, $fontColor, $font, $text);
                // calcular el centro
                imagettftext($image, $fontSizeL, 0, intval($positionX), 370, $fontColor, $font, $fila["nombre"]);
                imagettftext($image, 14, 0, 300, 600, $fontColor, $font, $fila["fecha"]);
                imagettftext($image, 14, 0, 600, 600, $fontColor, $font, $firma);

                $outputFilePath = '../certificados/' . $fila['codigo'] . 'Certificado.jpg';
                imagejpeg($image, $outputFilePath);
                imagedestroy($image);
            }

            // Mostrar imágenes generadas
            echo '<div style="text-align: center">';
            foreach ($resultados as $fila) {
                echo "<img src='../certificados/" . $fila['codigo'] . "Certificado.jpg' />";
                
            }
            echo "</div>";
        } else {
            echo '<p>No se encontraron resultados.</p>';
        }
        echo "</div>";
        ?>

    </body>
</html>