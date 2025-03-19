<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="../img/Captura1.ico">
        <title>Agregar Producto</title>
       
        
        <link href="../css/cssformularioproductos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body> 
        <br>
        <h1>Agregar Nuevo Producto</h1>
        <br>

        <form method="post" action="../ConexionBD/conexion.php" enctype="multipart/form-data">
            <label for="nombre"><b>Nombre del Producto:</b></label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>
            <br>
            <label for="precio"><b>Precio:</b></label>
            <input type="number" id="precio" name="precio" min="0" step="0.01" required><br>
            <br>
            <label for="imagen"><b>Imagen del Producto:</b></label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required><br>
            <br>
            <!-- Nuevo campo para el certificado -->
            <label for="certificado"><b>Certificado:</b></label>
            <input type="text" id="certificado" name="certificado"><br>
            <br>

            <!-- Nuevo campo para la fecha -->
            <label for="fecha"><b>Fecha:</b></label>
            <input type="date" id="fecha" name="fecha"><br>
            <br>
            <button type="submit"><b>Agregar Producto</b></button>
        </form>


        <br>
        <a href="../contenidoadmin.php"" class="button" onclick="history.go(-1);">Regresar</a>
        
        <br>
    </body>
</html>