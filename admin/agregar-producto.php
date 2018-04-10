<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'productos'>

      <!-- contenido -->

      <!--[if gte IE 9]>
        <style>
        .ie_show { display:block }
        .ie_hide { display:none }
        </style>
      <![endif]-->

      <script type="text/javascript">

        $(document).ready(function(){

           $.ajax({
 
                url: "metodos_categoria.php",
 
                type: "POST",
 
                async: false,
 
                data: { cmd :5},
 
                success: function(resultado)
                {
                  if(resultado != "")
                  {
                    $("#input_categoria_id").append(resultado);

                  }
 
                }
 
            });

        });


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

          if($("#input_tipo_cambio").val() == '' || $("#input_tipo_cambio").val() <= 0)
          {
            alert("El campo tipo cambio es un campo obligatorio y no puede ser menor a cero");
            return false;
          }

          //$("#admin_guardar").attr("disabled", "disabled");
          
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

              <label>Nombre del producto:</label>
              <input type="text" id="input_nombre" name = "input_nombre" placeholder="Nombre del producto">

              <label>Codigo del producto:</label>
              <input type="text" id="input_codigo" name = "input_codigo" placeholder="Codigo del producto" class = "requerido">

              <label>Unidad del producto:</label>
              <input type="text" id="input_unidad" name = "input_unidad" placeholder="Unidad del producto" class = "requerido">

              <label>Imagen:</label>
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_imagen" id = "input_imagen" accept="image/*" />
                <span onclick = "$('#input_imagen').click();">Examinar</span>
                <div class="archivo">...</div>
              </div>

                 <label>PDF:</label>
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_pdf" id = "input_pdf" accept="application/pdf" />
                <span onclick = "$('#input_pdf').click();">Examinar</span>
                <div class="archivo">...</div>
              </div>

              
               <label>Fecha:</label>
              <input type="text" id="input_fecha" name = "input_fecha" placeholder="Fecha" class = "date_picker" value = "" >

              <label>Descripción:</label>
              <textarea id="input_descripcion" name = "input_descripcion" placeholder="Descripción" rows="8" style="width:500px;"></textarea>

              <label>Categoría:</label>
              <div class="input-prepend">      
               <select name = 'input_categoria_id' id = 'input_categoria_id'>
                <option value =''>Seleccione un categoría</option>
               </select>
            </div>

            <label>Moneda:</label>
              <div class="input-prepend">      
               <select name = 'input_moneda_id' id = 'input_moneda_id'>
                <option value ='0'>Pesos</option>
                <option value ='1'>Dolar</option>
               </select>
            </div>

            <div id = "div_tipo_cambio" style = "display:none;">
             <label>Tipo Cambio:</label>
             <input type="text" id="input_tipo_cambio" name = "input_tipo_cambio" placeholder="0.00" value ="1" class = "decimal" >
            </div>
              <label>Precio:</label>
              <input type="text" id="input_precio" name = "input_precio" placeholder="0.00" value ="">

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name  = "guardar_producto"   id = "admin_guardar" class="btn btn-primary">Agregar producto</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->
<?php


if(isset($_POST["guardar_producto"]) && $_POST["input_nombre"] != '')
{
   $_POST["cmd"] = "";
  require_once('metodos_producto.php');

  guardar($_POST, $_FILES);

}

?>

<?php include("footer.php"); ?>