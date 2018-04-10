<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'cotizador'>

  <div class="container informacion">

    <div class="span11">
      <h1>Cotizador</h1>
      <form  method="post" name="form_producto" onSubmit="return cotizar();" enctype="multipart/form-data">
        <fieldset id ="html_content">
          <legend>Llene los espacios de abajo, por favor.</legend>
          <label>Nombre:</label>
          <input type="text" id="inputName" name = "inputName" placeholder="Nombre">
          <label>Teléfono:</label>
          <input type="text" id="inputPhone" name = "inputPhone" placeholder="Teléfono"  onkeypress="return permite(event, 'num')">
          <label>Correo electrónico:</label>
          <input type="text" id="inputEmail" name = "inputEmail" placeholder="Correo electrónico">
          <p><a href="#" onclick = "add_linea(); return false;" class="btn"><i class="icon-plus-sign"></i> Agregar producto</a></p>
          
          <table class="table table-striped" id = "tabla_cotizacion">
            <input type = "hidden" id = "ultima_linea" value = "0">
            <tr>
              <th></th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Unidad</th>
            </tr>

            <tr style = "display:none;" line = "0" id = "fila_cotizar_0">
              <td>
                <button class="btn" onclick = "remove_linea($(this)); return false;"><i class="icon-minus-sign"></i></button>
              </td>
              <td>
               <div class="input-prepend">
                  <div class="btn-group">
                  <select id = "input_producto_id_0" name = 'input_producto_id_0[]' class = "input producto_id">
                    <option>Seleccione Producto</option>
                    <?php
                       require_once('metodos_cotizador.php');
                      
                        echo trae_productos_select();
                    ?>
                  </select>
              </td>
              <td><input type="text" id = "input_cantidad_0" name = "input_cantidad_0[]"  placeholder="0" step="1" min="0"  class = "input cantidad span2"   onkeypress="return permite(event, 'num')" disabled></td>
              <td><input type = "text" id = "input_precio_0" name = "input_precio_0[]" value = "" readonly  class = "input precio span2"></td>
              <td><input type = "text" id = "input_unidad_0" name = "input_unidad_0[]" value = "" readonly  class = "input unidad span1"></td>
            </tr>
          </table>

              <p align = "right" id ="total_cotizacion" style = "display:none;"><strong>Total Cotizacion:</strong><br><input type="text" style = " width:100px;  text-align:right; " id = "total" name = "total" placeholder="0" step="1" min="0"  class = "total" readonly></p>

          <button type="submit" name  = "generar_cotizacion" class="btn btn-primary">Cotizar</button>
        </fieldset>
      </form>
    </div><!-- fin span -->

  </div><!-- fin informacion -->

<!-- fin del contenido -->


<?php


if(isset($_POST["generar_cotizacion"]) && $_POST["inputName"] != '')
{

  require_once('metodos_cotizador.php');

  guardar($_POST);
}

?>

<?php include("footer.php"); ?>