/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function agregarAlCarrito(producto, precio, imagen) {
    // Verificar si el usuario está autenticado
    if (usuarioAutenticado()) {
        var formData = new FormData();
        formData.append('producto', producto);
        formData.append('precio', precio);
        formData.append('imagen', imagen);

        fetch("carrito.php", {
            method: "POST",
            body: formData
        })
        .then((res) => res.text())
        .then(data => {
            let resp = document.getElementById("respuestaCarrito");
            resp.innerHTML = data;

            let totItems = document.getElementById("totalItems");
            let cantidadItems = document.getElementById("totalItemsCarrito");
            cantidadItems.innerHTML = totItems.innerHTML;

            // Muestra la alerta solo si la operación fue exitosa
            if (data.includes("agregado al carrito")) { // Ajusta este texto según la respuesta exitosa de tu servidor
                alert(`Producto ${producto} agregado al carrito, Precio: ${precio}`);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Por favor, inicia sesión o regístrate para agregar productos al carrito");
            window.location.href = "http://localhost/Proyecto-Gym/login.php";
        });
    } else {
        // Redirigir al usuario a la página de inicio de sesión
        alert("Por favor, inicia sesión o regístrate para agregar productos al carrito");
        window.location.href = "http://localhost/Proyecto-Gym/login.php";
    }
}
function verificarSesion() {
    // Lógica para verificar si el usuario está logueado
    const usuarioLogueado = usuarioAutenticado();

    console.log("Usuario autenticado:", usuarioLogueado);
    console.log("Token:", obtenerTokenDeCookie()); // Log the token

    return usuarioLogueado;
}

function usuarioAutenticado() {
    // Verificar si hay un token de sesión almacenado en una cookie
    const token = obtenerTokenDeCookie();
    // Aquí puedes realizar alguna verificación de autenticación
    // Puedes utilizar cookies, tokens, o cualquier otro mecanismo de autenticación
    // Devuelve true si el usuario está autenticado, false en caso contrario
    return token !== null;
}

function obtenerTokenDeCookie() {
    // Obtener todas las cookies del documento actual
    const cookies = document.cookie.split(';');

    // Buscar la cookie de sesión (PHPSESSID)
    const sessionCookie = cookies.find(cookie => cookie.trim().startsWith('PHPSESSID='));

    // Si se encuentra la cookie, devolver el valor del ID de sesión (PHPSESSID)
    if (sessionCookie) {
        return sessionCookie.split('=')[1];
    }

    // Si no se encuentra la cookie, devolver null
    return null;
}