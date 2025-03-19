

<?php
// Paso 1: Conexión a la base de datos (reemplaza con tus propios detalles)
$conexion = mysqli_connect("localhost","root","","bdutp");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Paso 2: Consulta SQL
$query = "SELECT * FROM producto";

$resultado = mysqli_query($conexion, $query);


// Paso 3: Mostrar los productos en la página
?>

<br>
<br><br>
<div class="productos-container fila1">
<div class="producto">
    <img src="img/producto/1.jpg" alt="Producto 1"/>
    <h2 onclick="showProductDetails('Alpha-T Nutrex – Test Booster', 'Aumenta tu producción de testosterona, ayuda a aumentar la masa muscular y fuerza, mejora libido, resistencia, rendimiento y recuperación.<br><b>Natural, Seguro y Efectivo</b><br>ALPHA-T PREMIUM es el mejor potenciador de testosterona de su clase. Rara vez ha habido un producto estimulante natural de testosterona, donde los ingredientes clave han demostrado ser efectivos (¡y seguros!) en múltiples estudios doble ciego, aleatorios y controlados con placebo en humanos:')">Alpha-T Nutrex – Test Booster</h2>
    <p>Precio: S/50</p>
    <button class="agregar-carrito" onclick="agregarAlCarrito('Alpha-T Nutrex – Test Booster',50,'img/producto/1.jpg')">Agregar al carrito</button>
    <!--button class="agregar-carrito" onclick="mostrarLogin()">Agregar al carrito</button-->
</div>
<div class="producto">

   <img src="img/producto/2.png" alt="Producto 2"/>
   <h2 onclick="showProductDetails('Amino Mutant - 300 y 600 Tabs', ' Amino Mutant proporciona un amplio espectro de aminoácidos, tanto aminoácidos esenciales como no esenciales. Los aminoácidos esenciales son importantes ya que no pueden ser sintetizados por el cuerpo humano, pero eso no significa que los no esenciales no sean importantes, ya que también forman parte de las proteínas y si no están en la cantidad suficiente, es necesario destruir otros aminoácidos para sintetizarlos, es por esto que también es de gran importancia consumirlos.<br> BENEFICIOS:<ul><li>Aminoácidos en forma libre y péptidos.</li><li>Mezcla de aminoácidos esenciales y ramificados.</li><li>Contribuye al desarrollo muscular.</li></ul>')">Amino Mutant - 300 y 600 Tabs</h2>
   <p>Precio: S/60</p>
   <button class="agregar-carrito" onclick="agregarAlCarrito('Amino Mutant',60,'img/producto/2.png')">Agregar al carrito</button>
</div>
<div class="producto">

    <img src="img/producto/3.png" alt="Producto 3"/>
    <h2 onclick="showProductDetails('Anabolic Prime Pro', 'La Anabolic Prime-Pro de Kevin Levrone es una combinación de hidrolizado de proteína de suero de leche patentado Optipep, con concentrado de proteína de suero de leche al 80%. Es un hidrolizado de alta calidad con un bajo contenido de azúcares y grasas, caracterizándose por una rápida absorción y un alto valor biológico, proporcionando un apoyo excelente durante la construcción de músculos y la reducción de grasa corporal.<br>Proteína premiun para construcción muscular.<br><br><b>BENEFICIOS:</b><ul><li>Fácil absorción</li><li>21 gr. de proteína por servicio</li><li> 113 kcal por servicio</li><li> Sabor chocolate</li></ul>')">Anabolic Prime Pro</h2>
    <p>Precio: S/45</p>
    <br>
    <button class="agregar-carrito" onclick="agregarAlCarrito('Anabolic Prime Pro',45,'img/producto/3.png')">Agregar al carrito</button>
</div>
<div class="producto">

    <img src="img/producto/4.png" alt="Producto 4"/>
    <h2 onclick="showProductDetails('Animal Pak', 'No hay un arma nutritiva mejor para alimentar tus entrenamientos intensos que Animal Pak, cargado con los más avanzados y mejores nutrientes culturistas. Cada sobre contiene una potente combinación de complejos minerales avanzados, potenciadores del rendimiento, agentes lipotrópicos, enzimas digestivas y energéticos fabulosos para antes de entrenar. Todos se combinan de forma equilibrada.<br><br><b>BENEFICIOS:</b><ul><li>Suplemento multivitamínico, mineral, multinutriente mejor considerado por culturistas y practicantes de fitness.</li><li>Favorece una recuperación más rápida y aumenta el metabolismo energético.</li><li>Incrementa la masa muscular.<br>44 tomas por envase.</li><li>Presentación en Pastilla y Polvo</li></ul>')">Animal Pak</h2>
    <p>Precio: S/70</p>
    <br>
    <button class="agregar-carrito" onclick="agregarAlCarrito('Animal Pak',70,'img/producto/4.png')">Agregar al carrito</button>
</div>
</div>
<div class="productos-container fila2">
<div class="producto">
    <img src="img/producto/5.png" alt="Producto 5"/>
    <h2 onclick="showProductDetails('Arginina GAT', 'Arginina GAT es un gran combustible de óxido nítrico. L-Arginina de Gat es un aminoácido básico condicionalmente esencial y es un precursor para la producción de óxido nítrico. Los atletas de alto rendimiento necesitan que la mayor cantidad de sangre como sea posible fluya hacia sus músculos. La L-Arginina puede ayudar a mejorar el flujo sanguíneo y la capacidad de ejercicio y es necesaria para la producción de creatina. Eso hace de L Arginina de Gat un suplemento de culturismo excelente para tu entrenamiento.<br><br><b>BENEFICIOS:</b><ul><li>180 Tabletas </li><li>Combustible de oxido nítrico.</li></ul>')">Arginina GAT</h2>
    <p>Precio: S/50</p>
    <br>
    <button class="agregar-carrito" onclick="agregarAlCarrito('Arginina GAT',50,'img/producto/5.png')">Agregar al carrito</button>
</div>
<div class="producto">
    <img src="img/producto/6.png" alt="Producto 6"/>
 
    <h2 onclick="showProductDetails('B-Nox Androrush Betancourt', 'B-nox Androrush de Betancourt Nutrition presentan se hace presente al mercado del fitness y culturismo como la nueva fórmula Pre-entreno totalmente distinta a los pre-entrenos comunes que ya se conocen. El B-Nox contiene propiedades que te brindaran una energía explosiva, mayor recuperación muscular, bombeo y vascularización increíble. BullNox Androrush de Betancourt Nutrition es la nueva fórmula, repotenciada, alimentadora de musculo y energía de óxido nítrico que harán de tus días de entrenamiento batallas inigualables., y si por si no fuese suficiente BullNox contiene Tríbulos terrestis que se encargaran de estimular instantáneamente los andrógenos como la hormona principal de crecimientos del varón, la Testosterona.<br><br><b>BENEFICIOS:</b><ul><li>Formula de estimulación instantáneo de Andrógenos como la Testosterona.</li><li>Proporciona una constante energía de mayor rendimiento y mayor prolongación.</li><li>Aumenta la fuerza, concentración y resistencia.</li><li>Aumentan por más tiempo los niveles de L-Arginina y Óxido Nítrico.</li><li>Crecimiento de las fibras cardiovasculares y musculares.</li><li>Mantiene el desarrollo potencial anabólico de los músculos.</li><li>Contiene una fórmula de Tríbulos Terrestis (precursor natural de testosterona.</li></ul>')">B-Nox Androrush Betancourt</h2>
    <p>Precio: S/60</p>
    <button class="agregar-carrito" onclick="agregarAlCarrito('B-Nox Androrush Betancourt',60,'img/producto/6.png')">Agregar al carrito</button>
</div>
<div class="producto">
    <img src="img/producto/7.jpg" alt="Producto 7"/>
  
    <h2 onclick="showProductDetails('Barras Proteicas Indulgence', 'Barra de alto contenido proteico y bajo en azúcar. La indulgencia de proteínas es un refrigerio de 50 g de alto contenido proteico, bajo en azúcar, vegetariano lacto, conveniente y delicioso, producido con sabores 100% naturales y el mejor chocolate belga derretido sobre una gruesa capa de caramelo encima de una capa base crujiente. Tu bocado de proteína sin culpa. Protein Indulgence es una barrita de proteínas desarrollada por la marca inglesa Applied Nutrition. Con una creciente reputación en el mercado de los complementos alimenticios y la nutrición deportiva, la marca ha decidido seguir con bocadillos de proteína en barra de proteínas totalmente diferentes<br><br><b>BENEFICIOS:</b><ul><li>Rico en proteínas (con 15 g por barrita)</li><li>Bajo contenido de azúcares<br>Elaborado con sabores 100% naturales.</li></ul>')">Barras Proteicas Indulgence</h2>
    <p>Precio: S/45</p>
    <button class="agregar-carrito" onclick="agregarAlCarrito('Barras Proteicas Indulgence',45,'img/producto/7.jpg')">Agregar al carrito</button>
</div>
<div class="producto">

    <img src="img/producto/8.png" alt="Producto 8"/>
    <h2 onclick="showProductDetails('Bcaa Amino Hydrate - 32 y 100 Servicios', 'BCAA Amino Hydrate ha sido formulado para proporcionar cantidades máximas de aminoácidos de cadena ramifica, altamente probados que maximizarán la intensidad y la longevidad de su entrenamiento mientras inundan su cuerpo con una mezcla perfecta de electrolitos y sales rehidratantes con citrulina agregada para el bombeo muscular. <br><br><b>BENEFICIOS:</b><ul><li>7 Gr de BCAA </li><li>1 Gr de Citrulina</li><li>Cero azucar</li><li>Cero Carbohidratos</li></ul>')">Bcaa Amino Hydrate - 32 y 100 Servicios</h2>
    <p>Precio: S/70</p>
    <button class="agregar-carrito" onclick="agregarAlCarrito('Bcaa Amino Hydrate ',70,'img/producto/8.png')">Agregar al carrito</button>
</div>
</div>  
<br>
<div class="productos-container">
        <?php
        // Bucle para mostrar cada producto
        while ($producto = mysqli_fetch_assoc($resultado)) {
            echo '<div class="producto">';
            echo '<img src="img/producto/' . $producto['foto'] . '" alt="' . $producto['nombre'] . '"/>';
            echo '<div class="producto-info" onclick="showProductDetails(\'' . $producto['nombre'] . '\', \'' . $producto['descripcion'] . '\')">';
            echo '<h2>' . $producto['nombre'] . '</h2>';
            echo '<p>Precio: S/' . $producto['precio'] . '</p>';
            echo '</div>'; // Cierre del contenedor producto-info
            echo '<button class="agregar-carrito" onclick="agregarAlCarrito(\'' . $producto['nombre'] . '\', ' . $producto['precio'] . ', \'' . $producto['foto'] . '\')">Agregar al carrito</button>';
            echo '</div>';
        }
        ?>
    </div>



<!-- Ventana modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <!-- Contenido de la ventana modal -->
        <h2 id="productTitle"></h2>
        <div id="productDetails"></div>
    </div>
</div>

<?php
// Paso 4: Cerrar la conexión
mysqli_close($conexion);
?>

<!-- Modal de inicio de sesión/registro -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal2()">&times;</span>
        
        <!-- Contenido del modal -->
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion" onclick="openLogin()">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse" onclick="openRegister()">Registrarse</button>
                </div>
                  
            </div>

            <!-- Formulario de Login y registro -->
            <div class="contenedor__login-register">
                <!-- Login -->
                
                <form action="" method="post" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" name="usuario" placeholder="Correo Electrónico">
                    <input type="password"  name="contrasena" placeholder="Contraseña">
                     <button onclick="iniciarSesion();">Entrar</button>
                </form>

                <!-- Register -->
                <form action="" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo">
                    <input type="text" placeholder="Correo Electrónico">
                    <input type="text" placeholder="Usuario">
                    <input type="password" placeholder="Contraseña">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<div id="respuestaCarrito" style="display: none">
   
    
</div>
