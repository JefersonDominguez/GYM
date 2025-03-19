
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="index.php">Smart Fit Gym</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link smoothScroll">Home</a>
                </li>

                <li class="nav-item">
                    <a href="#about" class="nav-link smoothScroll">Nosotros</a>
                    <ul class="submenu">
                        <li> <a href="#videos" class="nav-link smoothScroll" >Videos</a></li>
                        <li> <a href="#preguntas" class="nav-link smoothScroll" >Preguntas Frecuentes</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="Tienda.php" class="nav-link smoothScroll">Tienda</a>

                </li>

                <li class="nav-item">
                    <a href="#class" class="nav-link smoothScroll">Clases</a>
                    <ul class="submenu">
                        <li><a href="#schedule" class="nav-link smoothScroll">Horario</a></li>
                    </ul>         
                </li>

                <li class="nav-item">
                    <a href="#contact" class="nav-link smoothScroll">Contacto</a>
                    <ul class="submenu">
                        <li><a href="libroreclamaciones.php" class="nav-link smoothScroll">Libro de <br>Reclamaciones</a></li>
                        <li><a href="librosugerencias.php" class="nav-link smoothScroll">Sugerencias</a></li>
                    </ul>
                </li> 




                <li class="nav-item">
                    <a href="carrito.php" class="nav-link smoothScroll">Carrito  
                        <i class="fas fa-shopping-cart"></i> 
                        <span id="totalItemsCarrito">

                        </span>

                    </a>

                </li>

               
            </ul>
            

            <ul class = "social-icon ml-lg-3">
                
                <li><a href = "https://www.facebook.com/profile.php?id=61552519238246&mibextid=ZbWKwL" class = "fab fa-facebook"></a></li>
                <li><a href = "https://twitter.com/SmartFitGym5509" class = "fab fa-twitter"></a></li>
                <li><a href = "https://www.instagram.com/smartfitgym474" class = "fab fa-instagram"></a></li>
                <li class="nav-item">
                    <span id="estado-sesion"></span>
                    <a href="index.php" id="enlace-cerrar-sesion" onclick="cerrarSesion()"> <i class="fa fa-sign-out-alt"></i></a>
                  
                </li>
            </ul>
        </div>

<script>
    function cerrarSesion() {
        // Peticion al servidor para cerrar sesión y limpiar el carrito
        fetch('cerrar_sesion.php', {
            method: 'POST',
        })
        .then(response => response.json())
        .then(data => {
            // Redirigir a la página de inicio de sesión después de cerrar la sesión
            if (data.success) {
                window.location.href = 'index.php';
            } else {
                alert('Error al cerrar sesión');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al cerrar sesión');
        });
    }
</script>

<!--script>
    function agregarAlCarrito() {
        var usuarioLogueado = verificarSesion(); // Función para verificar si el usuario está logueado

        if (usuarioLogueado) {
            // Lógica para agregar producto al carrito
            console.log("Producto agregado al carrito");
            alert("Producto agregado al carrito");
        } else {
            // Redirigir al usuario para iniciar sesión o registrarse
            alert("Por favor, inicia sesión o regístrate para agregar productos al carrito");
            window.location.href = "http://localhost/Proyecto-Gym/login.php"; // Reemplaza con la página correspondiente
        }
    }

    function verificarSesion() {
        // Lógica para verificar si el usuario está logueado
        // Retorna true si el usuario está logueado, false si no lo está
        // Puedes implementar esto con cookies, sesiones, o llamadas a una API de autenticación
        return true; // Reemplaza con tu lógica de verificación de sesión
    }
    
</script-->



    </div>
</nav>


