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
    $precio = $_POST["precio"];

    // Procesar la imagen
    $imagenNombre = $_FILES["imagen"]["name"];
    $imagenTmpName = $_FILES["imagen"]["tmp_name"];
    $imagenSize = $_FILES["imagen"]["size"];

    // Directorio donde se guardan las imágenes (ajusta según tu configuración)
    $directorioDestino = "img/producto/";

    // Verificar si el directorio de destino existe, si no, créalo
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0755, true);
    }

    // Mover la imagen al directorio de destino
    move_uploaded_file($imagenTmpName, $directorioDestino . $imagenNombre);

    // Obtener la conexión a la base de datos
    $conexion = getConexion();

    // Preparar la consulta SQL para insertar el nuevo producto
    $consulta = "INSERT INTO producto (nombre, precio, foto) VALUES (?, ?, ?)";

    // Utilizar mysqli_prepare para evitar problemas de SQL Injection
    $stmt = mysqli_prepare($conexion, $consulta);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "sds", $nombre, $precio, $imagenNombre);

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
                echo "<p>Producto agregado con éxito:</p>";
                echo "<ul>";
                echo "<li>Nombre: $nombre</li>";
                echo "<li>Precio: S/$precio</li>";
                echo "<li>Imagen: $imagenNombre</li>";
                echo "</ul>";
            } else {
                echo "Error al agregar el producto a la base de datos.";
            }
        }
    }
}
?>