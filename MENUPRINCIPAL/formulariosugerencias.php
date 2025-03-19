

<br><br>
<br><br>

<form action="procesar_sugerencia.php" method="post" enctype="multipart/form-data">>
    <fieldset>
        <legend class="text-white" data-aos="fade-up" data-aos-delay="200"> Formulario de Sugerencias para Mejorar Nuestro Gimnasio </legend> 

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required/>
        <br><br>

        <label for="numero_socio">Número de socio:</label>
        <input type="text" id="numero_socio" name="numero_socio" placeholder="Ingrese su numero" required/>
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su email" required/>
        <br><br>

        <label for="tipo_sugerencia">Tipo de Sugerencia:</label>
        <select id="tipo_sugerencia" name="tipo_sugerencia">
            <option value="instalaciones">Mejora en instalaciones</option>
            <option value="clases">Clases y programas</option>
            <option value="equipamiento">Equipamiento</option>
            <option value="horarios">Horarios</option>
            <option value="servicio_cliente">Servicio al cliente</option>
            <option value="otro">Otro</option>
        </select>
        <br><br>
        <legend class="text-white" data-aos="fade-up" data-aos-delay="200"> Detalles de la Sugerencia</legend>
        <label for="descripcion">Descripción de la Sugerencia:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
        <label for="contacto">¿Te gustaría ser contactado para discutir tu sugerencia en detalle?</label><br>
        <input type="radio" id="si" name="contacto" value="si">
        <label for="si">Sí</label>
        <input type="radio" id="no" name="contacto" value="no">
        <label for="no">No</label><br><br>
        <label for="comentarios">Comentarios Adicionales:</label><br>
        <textarea id="comentarios" name="comentarios" rows="4" cols="50"></textarea>


        <div class="control-form">
            <label for="foto">Foto(opcional)</label>
            <input type="file" name="foto" id="foto" accept=".jpg, .png"
                   onchange="mostrarImagenSeleccionada(this)"/>

            <img id="imagenMostrada" src="" alt=""
                 style="max-width: 100%; max-height: 300px"/>

        </div>

        <script>
           function mostrarImagenSeleccionada(input) {
                const imagenMostrada = document.getElementById('imagenMostrada');

                if (input.files && input.files[0]) {
                    const archivoSeleccionado = input.files[0];

                    if (archivoSeleccionado.type === 'image/jpeg' || archivoSeleccionado.type === 'image/png') {
                        const lector = new FileReader();

                        lector.onload = function (e) {
                            imagenMostrada.src = e.target.result;
                        };

                        lector.readAsDataURL(archivoSeleccionado);
                    } else {
                        alert('Por favor, seleccionar un archivo JPG o PNG válido.');
                        input.value = '';
                        imagenMostrada.src = '';
                    }
                } else {
                    imagenMostrada.src = '';
                }
            }
        </script>
        <br><br>
        <input type="submit" name="btnEnviar" value="Enviar"/>
    </fieldset>

</form>


