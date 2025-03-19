/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


document.addEventListener("DOMContentLoaded", function () {
    const preguntas = document.querySelectorAll(".pregunta"); // le está diciendo al "documento" que busque y recoja 
    //todos los elementos que tienen la etiqueta o clase llamada "pregunta". 
    //Luego, estos elementos encontrados se almacenan en una "caja" llamada preguntas

    preguntas.forEach((pregunta) => {
        pregunta.addEventListener("click", () => {   //-->Este EventListener está configurado para responder al evento de clic.
            pregunta.classList.toggle("clicked");  //-->alterna la clase "clicked" en el elemento con la clase "pregunta". 
                                                    // Si ya tiene esa clase, la quita; si no la tiene, la añade. 
        });
    });
});