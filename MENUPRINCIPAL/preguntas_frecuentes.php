
<?php
include("./ConexionBD/Conection.php");

// Recuperar preguntas frecuentes de la base de datos
$consulta = "SELECT pregunta, respuesta FROM preguntas_frecuentes";
$resultado = mysqli_query($conex, $consulta);

// Crear un array para almacenar las preguntas y respuestas de la base de datos
$preguntasBD = [];

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $preguntasBD[] = $fila;
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>

<section class="preguntas-frecuentes section" id="preguntas">
    <div class="container">
        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Preguntas Frecuentes</h2>
        <div class="row"> 

            <?php
            // Preguntas y respuestas codificadas manualmente
            $preguntasManuales = [
                [
                    'pregunta' => 'Pregunta 1: ¿Qué tipo de productos puedo encontrar en la tienda en línea del gimnasio?',
                    'respuesta' => 'En nuestra tienda en línea, ofrecemos una amplia variedad de productos relacionados con el fitness y el bienestar. Puedes encontrar desde equipos de ejercicio, como pesas, máquinas cardiovasculares y accesorios de yoga, hasta ropa deportiva de alta calidad, suplementos nutricionales y productos de cuidado personal diseñados para mejorar tu experiencia en el gimnasio. También disponemos de productos de marcas reconocidas para ayudarte a alcanzar tus objetivos de fitness y bienestar.'
                ],
                [
                    'pregunta' => 'Pregunta 2: ¿Cuál es la política de devoluciones y garantías de los productos comprados en la tienda en línea?',
                    'respuesta' => 'Entendemos que la satisfacción del cliente es fundamental. Por lo tanto, ofrecemos una política de devoluciones flexible. Si no estás completamente satisfecho con tu compra, puedes devolver los productos dentro de un período específico (consulta nuestras políticas de devoluciones para conocer los detalles). Además, muchos de nuestros productos están respaldados por garantías del fabricante. Te animamos a leer las descripciones de los productos para obtener información sobre las garantías específicas y los procedimientos de devolución.'
                ],
                [
                    'pregunta' => 'Pregunta 3: ¿Cómo puedo obtener asesoramiento sobre qué productos son los más adecuados para mis necesidades personales?',
                    'respuesta' => 'Nuestro equipo de expertos en fitness está aquí para ayudarte. Puedes comunicarte con nosotros a través de nuestro chat en vivo, correo electrónico o teléfono para recibir asesoramiento personalizado. Para ofrecerte la mejor recomendación, cuéntanos tus objetivos de fitness, nivel de experiencia y cualquier restricción o preferencia que tengas. Estamos comprometidos en ayudarte a elegir los productos que se adapten a tus necesidades y te ayuden a alcanzar tus metas.'
                ],
            ];

            // Combinar preguntas y respuestas de la base de datos con las manuales
            $preguntasTotales = array_merge($preguntasManuales, $preguntasBD);

            // Mostrar cada pregunta y respuesta
            foreach ($preguntasTotales as $pregunta) {
                echo '            <div class="col-md-6">';
                echo '                <div class="pregunta">';
                echo '                    <h2>' . $pregunta['pregunta'] . '</h2>';
                echo '                    <div class="respuesta">';
                echo '                        <br>';
                echo '                        <p>' . $pregunta['respuesta'] . '</p>';
                echo '                    </div>';
                echo '                </div>';
                echo '            </div>';
            }
            ?>

        </div>
    </div>
</section>

<script src="js/preguntas.js"></script>
<br>