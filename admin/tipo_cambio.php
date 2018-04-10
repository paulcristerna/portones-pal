<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'tipo_cambio'>

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
          if($("#input_fecha").val() == "")
          {
             alert("El campo fecha es un campo obligatorio");
             return false;
          }

          if($("#input_tipo_cambio").val() == '' || $("#input_tipo_cambio").val() <= 0)
          {
            alert("El campo tipo cambio es un campo obligatorio y no puede ser menor a cero");
            return false;
          }

          if($("#input_validar_tipo_cambio").val() == 1)
          {
            validar_tipo_cambio();
            return false;
          }

          return true; 
        }
      </script>

      <div class="container informacion">
        <div class="span11">
          <h1>Actualizar tipo de cambio</h1>

          <form  method="post" name="form_tipo_cambio" id = "form_tipo_cambio" onSubmit="return validar()" action = "tipo_cambio.php" enctype="multipart/form-data">
            <fieldset>
              <legend>Llene los espacios de abajo, por favor.</legend>

              <label>Fecha:</label>
              <input type="text" id="input_fecha" name = "input_fecha" placeholder="Fecha" class = "date_picker">

              <label>Tipo Cambio:</label>
              <input type="text" id="input_tipo_cambio" name = "input_tipo_cambio" placeholder="0.00" class = "decimal">
               <input type="hidden" id="input_validar_tipo_cambio" name = "input_validar_tipo_cambio" value="1">

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name = "guardar_tipo_cambio"   id = "admin_guardar" class="btn btn-primary">Actualizar</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->

<?php
if(isset($_POST["guardar_tipo_cambio"]))
{
  require_once('metodos_tipo_cambio.php');
  guardar($_POST);

}


?>
<?php include("footer.php"); ?>