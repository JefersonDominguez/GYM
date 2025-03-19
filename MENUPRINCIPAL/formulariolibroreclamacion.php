


    <br><br>
    <br><br>
    <center><h2 class="text-white" data-aos="fade-up" data-aos-delay="200"> Libro de Reclamaciones</h2></center>
    <br><br>
    <form class="formulario" action="procesar_reclamacion.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend class="text-white" data-aos="fade-up" data-aos-delay="200"> Información Personal</legend>
            <label>Nombre</label>


            <input type="text" id="Nombre" name="txtNombre" placeholder="Ingrese su nombre" required/>
            <br><br>
            <label>Apellido</label>
            <input type="text" id="Apellido" name="txtApellido" placeholder="Ingrese su apellido" required/>


            <br><br>
            <label>Correo Electrónico</label>
            <input type="email" id="Correo" name="txtEmail" placeholder="Ingrese su correo electrónico" required/>
            <br><br>


            <label>Teléfono</label>
            <input type="tel"  id="Telefono" name="txtTelefono" placeholder="Ingrese su número de teléfono" maxlength="5" required/>
        </fieldset>
        <br>


        <fieldset>



            <legend class="text-white" data-aos="fade-up" data-aos-delay="200"> Detalles de la Reclamación</legend>
            <label>Tipo de Reclamación</label>
            <select id="Tipo_Reclamacion" name="cboTipoReclamacion">
                <option value="Servicio">Servicio</option>
                <option value="Producto">Producto</option>
                <option value="Facturación">Facturación</option>
                <option value="Otro">Otro</option>
            </select>


            <br><br>
            <label>Descripción de la Reclamación</label>
            <textarea  id="descripcion" name="txtDescripcion" rows="5" cols="62"  wrap required></textarea>
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
                        console.log(archivoSeleccionado.type);
                        if (archivoSeleccionado.type === 'image/jpeg'
                                || archivoSeleccionado.type === 'image/png') {
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


        </fieldset>


        <br>
        <center> <input type="submit" name="btnEnviar" value="Enviar Reclamación" /></center>

    </form>

    <br><br>