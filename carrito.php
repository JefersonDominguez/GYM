<?php
session_start();

// Definir la función obtenerRutaImagenProducto en PHP
function obtenerRutaImagenProducto($imagen) {
    // Si la imagen comienza con "img/", asumimos que es una imagen definida manualmente
    if (strpos($imagen, "img/") === 0) {
        return $imagen;
    } else {
        // De lo contrario, asumimos que es una imagen de la base de datos y construimos la ruta completa
        return "img/producto/" . $imagen;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mi carrito</title>
        <link rel="icon" href="img/Captura1.ico">
        <link href="css/csscarrito.css" rel="stylesheet" type="text/css"/>
    </head>
    <body> 
        <h1>Mi Carrito</h1>

        <?php
        if (!isset($_SESSION['user_id'])) {
            echo '<a href="login.php" class="volver-link">Debe registrar la sesion</a>';
        } else {
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = array();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
                $eliminarProducto = $_POST['eliminar'];
                $index = -1;
                foreach ($_SESSION['carrito'] as $key => $item) {
                    if ($item['producto'] === $eliminarProducto) {
                        $index = $key;
                        break;
                    }
                }
                if ($index !== -1) {
                    array_splice($_SESSION['carrito'], $index, 1);
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto']) && isset($_POST['precio']) && isset($_POST['imagen'])) {
                $producto = $_POST['producto'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $_SESSION['carrito'][] = array('producto' => $producto, 'precio' => $precio, 'imagen' => $imagen);
            }

            $totalitems = count($_SESSION['carrito']);
            echo "<div id=totalItems> $totalitems </div>";
            echo '<h2>Numero de productos: ' . $totalitems . '</h2>';

            if (!empty($_SESSION['carrito'])) {
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>DESCARTAR</th>';
                echo '<th>IMAGEN</th>';
                echo '<th>NOMBRE DEL PRODUCTO</th>';
                echo '<th>PRECIO</th>';
                echo '</tr>';
                
                $totalcarrito = 0;
                foreach ($_SESSION['carrito'] as $item) {
                    $totalcarrito += $item['precio'];
                    echo '<tr>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="eliminar" value="' . htmlspecialchars($item['producto']) . '">';
                    echo '<td><button type="submit" class="eliminar">Descartar</button></td>';
                    echo '</form>';
                    echo '<td><img src="' . obtenerRutaImagenProducto($item['imagen']) . '" alt="' . htmlspecialchars($item['producto']) . '" width="50"></td>';
                    echo '<td>' . htmlspecialchars($item['producto']) . '</td>';
                    echo '<td>' . $item['precio'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '<div id="totalCarrito" style="text-align: center;">Total carrito: ' . $totalcarrito . '</div>';
            } else {
                echo '<p>No hay productos en el carrito.</p>';
            }
        }
        ?>
        <br>
    <center> <a href="Tienda.php" class="volver-link">Volver</a></center>
</body>
</html>
