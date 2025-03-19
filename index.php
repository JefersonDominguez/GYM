<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Smart Fit Gym</title>
        <link rel="icon" href="img/Captura1.ico">
        <meta charset="UTF-8">

        <link href="css/videos.css" rel="stylesheet" type="text/css"/>
        <link href="css/submenu_1.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
       
        <link href="css/aos.css" rel="stylesheet" type="text/css"/>
        <link href="css/justificado.css" rel="stylesheet" type="text/css"/>
        <link href="css/justificadoHero.css" rel="stylesheet" type="text/css"/>


        <!-- MAIN CSS -->
        <link href="css/tooplate-gymso-style.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilopreguntas.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssfooter.css" rel="stylesheet" type="text/css"/>

    </head>
    <body data-spy="scroll" data-target="#navbarNav" data-offset="50">
<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<div>Bienvenido, ' . htmlspecialchars($_SESSION['user_name']) . '</div>';
        echo '<a href="logout.php">Cerrar Sesión</a>';
    } else {
        echo '<a href="login.php">Iniciar Sesión</a>';
    }
    ?>
        <!-- MENU BAR -->
        <?php require_once './MENUPRINCIPAL/menubar.php' ?>;


        <!-- HERO -->

        <?php require_once './MENUPRINCIPAL/hero.php' ?>;

        <!-- NOSOTROS-->
        <?php require_once './MENUPRINCIPAL/Nosotros.php' ?>;

        <!-- VIDEOS DE NUESTROS PRODUCTOS Y SERVICIOS -->

        <?php require_once './MENUPRINCIPAL/Videos.php' ?>;

        <!-- CLASS -->
        <?php require_once './MENUPRINCIPAL/clases.php' ?>;

        <!-- HORARIO-->
        <?php require_once './MENUPRINCIPAL/horario.php' ?>;

        <!-- CONTACTANOS -->
        <?php require_once './MENUPRINCIPAL/contactanos.php' ?>;

        <!-- PREGUNTAS FRECEUNTES -->
        <?php require_once './MENUPRINCIPAL/preguntas_frecuentes.php' ?>;



        <!-- FOOTER -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-4 col-md-5">
                        <p class="copyright-text">Copyright &copy; 2023 Smart Fit Gym Co.</p>
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                        <div class="mr-4">
                            <ul>
                                <i class="fa fa-user mr-1"></i>
                                <a href="Admin.php">Panel de Administrador</a>
                            </ul>
                            <ul>
                                <i class="fa fa-user mr-1"></i>
                                <a href="#">SmartFit@company.com</a>
                            </ul>
                            <ul>
                                <span id="estado-sesion"></span>
                                <a href="login.php">
                                    <i class="fa fa-sign-in-alt"></i> Iniciar Sesión
                                </a>
                             </ul>
                        </div>

                        <!-- Agrega iconos de redes sociales debajo del número de teléfono -->
                        <div>
                            <p>
                                <i class="fa fa-phone mr-1"></i><span class="phone-number">010-020-0840</span>
                            </p>
                            <ul class="social-icons">
                                <a href="https://www.facebook.com/profile.php?id=61552519238246&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <a href="https://www.instagram.com/smartfitgym474" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://twitter.com/SmartFitGym5509" target="_blank"><i class="fab fa-twitter"></i></a>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </footer>



        <!-- Modal de la membresia-->
        <!-- se ha implementado un modal de Bootstrap para un formulario de membresía.
        El modal incluye campos para el nombre, correo electrónico, número de teléfono y un mensaje adicional.
        Además, hay un botón de envío y una casilla de verificación para aceptar los términos y condiciones. --> 
        <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">

                        <h2 class="modal-title" id="membershipFormLabel">Formulario Membresía</h2>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="membership-form webform" role="form">
                            <input type="text" class="form-control" name="cf-name" placeholder="John Doe">

                            <input type="email" class="form-control" name="cf-email" placeholder="Johndoe@gmail.com">

                            <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

                            <textarea class="form-control" rows="3" name="cf-message" placeholder="Mensaje adicional"></textarea>

                            <button type="submit" class="form-control" id="submit-button" name="submit">Enviar</button>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="signup-agree">
                                <label class="custom-control-label text-small text-muted" for="signup-agree">Acepto los <a href="#">Términos &amp; Condiciones</a>
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer"></div>

                </div>
            </div>
        </div>

        <!-- SCRIPTS bibliotecas-->
        <script src="js/jquery.min.js"></script> <!-- simplifica la manipulación del DOM y la interacción con el servidor. -->
        <script src="js/bootstrap.min.js"></script> <!-- es un marco de diseño (framework) que proporciona componentes y estilos predefinidos para facilitar el desarrollo de sitios web-->
        <script src="js/aos.js"></script><!-- Animate On Scroll facilita la animación de elementos cuando se desplazan en la ventana del navegador -->
        <script src="js/smoothscroll.js"></script>  <!-- implementa el desplazamiento suave (smooth scroll) en la página.  -->
        <script src="js/custom.js"></script> <!-- mejorar la funcionalidad o la apariencia de la página. -->
        <script src="js/añadircarrito.js" ></script>
       
    </body>





</html>
