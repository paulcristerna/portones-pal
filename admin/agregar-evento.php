<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'eventos'>

      <!-- contenido -->

      <script type="text/javascript">

        function validar()
        {
          
          if($("#input_nombre").val() == '')
          {
            alert("El campo nombre es un campo obligatorio");
            return false;
          }


          if($("#input_descripcion").val() ==  '')
          {

            alert("El  campo descripción  es un campo obligatorio");
            return false;
          }

          if($("#input_imagen").val() ==  '')
          {

            alert("El  campo imagen es un campo obligatorio");
            return false;
          }

          if($("#input_fecha").val() == "")
          {
            alert("El  campo fecha es un campo obligatorio");
            return false;

          } 

          if($("#input_lugar").val() == "")
          {
            alert("El  campo lugar es un campo obligatorio");
            return false;

          } 

          dialog_guardar();

        }

      </script>
      <div class="container informacion">
        <div class="span11">
          <a href="eventos.php" class="btn btn-mini"> << Volver</a>

          <h1>Agregar evento</h1>

          <form  method="post" name="form_evento" onSubmit="return validar()" enctype="multipart/form-data">
            <fieldset>
            <fieldset>
              <legend>Llene los espacios de abajo, por favor.</legend>

              <label>Nombre del evento:</label>
              <input type="text" id="input_nombre" name = "input_nombre" placeholder="Nombre del evento">

              <label>Imagen:</label>
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_imagen" id = "input_imagen" accept="image/*" />
                <span onclick = "$('#input_imagen').click();">Examinar</span>
                <div class="archivo">...</div>
              </div>

              <label>Descripción:</label>
              <textarea id="input_descripcion" name = "input_descripcion" placeholder="Descripción" rows="8" style="width:500px;"></textarea>

              <label>Lugar:</label>
              <input type="text" id="input_lugar" name = "input_lugar" placeholder="Lugar">

              <label>Fecha:</label>
              <input type="text" id="input_fecha" name = "input_fecha" placeholder="Fecha" class = "date_picker">

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name = "guardar_evento" class="btn btn-primary">Agregar evento</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->

<?php
if(isset($_POST["guardar_evento"]) && $_POST["input_nombre"] != '')
{
   $_POST["cmd"] = "";
  require_once('metodos_eventos.php');

  guardar($_POST, $_FILES);

}

?>
<?php include("footer.php"); ?>