<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'productos'>

     <script type="text/javascript">

        function validar()
        {
          if($("#input_nombre").val() == '')
          {
            alert("El campo nombre es un campo obligatorio");
            return false;
          }

          /*if($("#input_imagen").val() ==  '')
          {

            alert("El  campo imagen es un campo obligatorio");
            return false;
          }*/

          if($("#input_descripcion").val() ==  '')
          {

            alert("El  campo descripción  es un campo obligatorio");
            return false;
          }

          if($("#input_categoria_id").val() ==  '')
          {

            alert("El campo categoría  es  un campo obligatorio");
            return false;
          }

          if($("#input_precio").val() == '' || $("#input_precio").val() <= 0)
          {
            alert("El campo precio es un campo obligatorio y no puede ser menor a cero");
            return false;

          }

          if($("#input_codigo").val() == '')
          {
            alert("El campo codigo es un campo obligatorio");
            return false;
          }

          if($("#input_unidad").val() == '')
          {
            alert("El campo unidad es un campo obligatorio");
            return false;
          }

          dialog_guardar();
     
        }
      </script>

      <div class="container informacion">
        <div class="span11">
          <a href="productos.php" class="btn btn-mini"> << Volver</a>
          <h1>Agregar producto</h1>

         <form  method="post" name="form_producto" onSubmit="return validar()" enctype="multipart/form-data">
            <fieldset>
              <legend>Llene los espacios de abajo, por favor.</legend>

            <?php

                if($_REQUEST["id"] != '' && $_REQUEST["id"] >0)
                {
                  $_POST['cmd'] = '';
                  require_once('metodos_producto.php');


                  echo cargar_edicion($_REQUEST["id"]);
                }

              ?>

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name  = "editar_producto" id ="admin_guardar" class="btn btn-primary">Editar producto</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->

<?php
if(isset($_POST["editar_producto"]) && $_POST["input_nombre"] != '')
{
   $_POST["cmd"] = "";
  require_once('metodos_producto.php');

  editar($_POST, $_FILES);

}

?>
<?php include("footer.php"); ?>