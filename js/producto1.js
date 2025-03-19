// Script para funciones adicionales, como agregar al carrito o comprar

function showProductDetails(productTitle, productDetails) {
    var modal = document.getElementById("myModal");
    var titleElement = document.getElementById("productTitle");
    var detailsElement = document.getElementById("productDetails");

    // Actualiza el contenido del modal con la información del producto
    titleElement.textContent = productTitle;
    detailsElement.innerHTML = productDetails;

    // Muestra la ventana modal
    modal.style.display = "block";
}
// Función para cerrar la ventana modal
function closeModal() {
    // Obtén una referencia a la ventana modal
    var modal = document.getElementById("myModal");

    // Cierra la ventana modal
    modal.style.display = "none";
}