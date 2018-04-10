<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'slider'>

      <!-- contenido -->

      <!--[if gte IE 9]>
        <style>
        .ie_show { display:block }
        .ie_hide { display:none }
        </style>
      <![endif]-->

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

        dialog_guardar();
     
        }
      </script>

      <div class="container informacion">
        <div class="span11">
          <a href="slider.php" class="btn btn-mini"> << Volver</a>

          <h1>Agregar elemento</h1>

          <form  method="post" name="form_slider" onSubmit="return validar()" enctype="multipart/form-data">
            <fieldset>
              <legend>Llene los espacios de abajo, por favor.</legend>

              
              <label>Nombre del elemento:</label>
              <input type="text" id="input_nombre" name = "input_nombre" placeholder="Nombre del elemento">

              <label>Imagen:</label>
           
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_imagen" id = "input_imagen" accept="image/*" />
                <span onclick = "$('#input_imagen').click();">Examinar</span>
                <div class="archivo">...</div>
              </div>

              <label>Descripción:</label>
              <textarea id="input_descripcion" name = "input_descripcion" placeholder="Descripción" rows="8" style="width:500px;"></textarea>


              <div class="control-group">
                <div class="controls">
                  <button type="submit" name = "guardar_slider"   id = "admin_guardar" class="btn btn-primary">Agregar elemento</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->

<?php
if(isset($_POST["guardar_slider"]) && $_POST["input_nombre"] != '')
{
  $_POST["cmd"] = "";
  require_once('metodos_slider.php');
  guardar($_POST, $_FILES);

}

?>
<?php include("footer.php"); ?>