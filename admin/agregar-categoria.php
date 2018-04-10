<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'categorias'>

      <!-- contenido -->

      <script type="text/javascript">
        /*$('input[id=file]').change(function() {
          //$('#pretty-input').val($(this).val().replace("C:\\fakepath\\", ""));
        });*/



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

          dialog_guardar();
     
        }
      </script>

      <div class="container informacion">
        <div class="span11">
          <a href="categorias.php" class="btn btn-mini"> << Volver</a>

          <h1>Agregar categoría</h1>

           <form method="post" name="form_categoria" onSubmit="return validar()">
            <fieldset>
              <legend>Llene los espacios de abajo, por favor.</legend>

              <label>Nombre del categoría:</label>
              <input type="text" id="input_nombre" name =  "input_nombre" placeholder="Nombre del categoría">

              <label>Descripción:</label>
              <textarea id="input_descripcion"  name =  "input_descripcion" placeholder="Descripción" rows="8" style="width:500px;"></textarea>

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name = "guardar_categoria"  id = "admin_guardar" class="btn btn-primary">Agregar categoría</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->

<?php


if(isset($_POST["guardar_categoria"]) && $_POST["input_nombre"] != '')
{
   $_POST["cmd"] = "";
  require_once('metodos_categoria.php');

  guardar($_POST);

}

?>
<?php include("footer.php"); ?>