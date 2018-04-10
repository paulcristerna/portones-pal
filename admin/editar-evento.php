<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'eventos'>

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

          /*if($("#input_imagen").val() ==  '')
          {

            alert("El  campo imagen es un campo obligatorio");
            return false;
          }*/

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

             <?php

                if($_REQUEST["id"] != '' && $_REQUEST["id"] >0)
                {
                  $_POST['cmd'] = '';
                  require_once('metodos_eventos.php');


                  echo cargar_edicion($_REQUEST["id"]);
                }

              ?>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" name = "editar_evento" class="btn btn-primary">Editar evento</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->

<?php
if(isset($_POST["editar_evento"]) && $_POST["input_nombre"] != '')
{
   $_POST["cmd"] = "";
  require_once('metodos_eventos.php');

  editar($_POST, $_FILES);

}

?>
<?php include("footer.php"); ?>