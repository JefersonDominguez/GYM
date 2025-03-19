/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


// Función para mostrar el modal de inicio de sesión
function mostrarLogin() {
        openModal();
    
}
       

// Función para abrir el modal
function openModal() {
      document.body.classList.add('modal-open');
    var modal = document.getElementById('modal');
   
    modal.style.display = 'block';
    
}

// Función para cerrar el modal
function closeModal2()   //Elimina la clase "modal-open" del elemento <body>, permitiendo nuevamente el desplazamiento.
{
     document.body.classList.remove('modal-open');
    modal = document.getElementById('modal');
 
    
    modal.style.display = 'none';
   
}

// Función para abrir el formulario de inicio de sesión
function openLogin() {    //Invoca la función openModal(), abriendo el modal.
    openModal();
    // Aquí puedes redirigir a la página de inicio de sesión o mostrar un formulario de inicio de sesión en el modal mismo.
}

// Función para abrir el formulario de registro
function openRegister() {
    openModal();
    // Aquí puedes redirigir a la página de registro o mostrar un formulario de registro en el modal mismo.
}
 