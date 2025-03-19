/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function iniciarSesion() {
    // Simular la autenticación (comparar con valores predeterminados)
    var usuario = document.querySelector('input[name="usuario"]').value;
    var contrasena = document.querySelector('input[name="contrasena"]').value;

    // Valores predeterminados (puedes cambiarlos según tus necesidades)
    var usuarioPredeterminado = "usuario@gmail.com";
    var contrasenaPredeterminada = "contrasena123";

    if (usuario === usuarioPredeterminado && contrasena === contrasenaPredeterminada) {
        // Autenticación exitosa, puedes realizar acciones adicionales aquí
        alert("Inicio de sesión exitoso");
        // Ocultar el formulario de inicio de sesión
        document.querySelector('.contenedor__login-register').style.display = "none";
        
        // Llamar a la función para agregar al carrito
        agregarAlCarrito('Alpha-T Nutrex – Test Booster', 50, 'img/producto/1.jpg');
    } else {
        alert("Error de inicio de sesión. Por favor, inténtalo de nuevo.");
    }
}
