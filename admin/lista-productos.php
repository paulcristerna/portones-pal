<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'productos'>

      <div class="container informacion">
        <div class="span11">
          <a href="productos.php" class="btn btn-mini"> << Volver</a>
          <h1>Lista de productos</h1>

            <?php

                if($_REQUEST["id"] != '' && $_REQUEST["id"] >0)
                {
                  $_POST['cmd'] = '';

                  require_once('metodos_producto.php');

                  echo cargar_lista($_REQUEST["id"]);
                }

              ?>

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name  = "editar_producto" class="btn btn-primary">Editar producto</button>
                </div>
              </div>
            </fieldset>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

<!-- fin del contenido -->
<?php include("footer.php"); ?>