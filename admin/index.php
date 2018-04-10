<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>PAL | Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">    
    <link href="../css/docs.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icono para la pestaña superior del navegador -->
    <link rel="shortcut icon" href="../img/logo-pal-icon.ico">

    <script type="text/javascript">
        /*$('input[id=file]').change(function() {
          //$('#pretty-input').val($(this).val().replace("C:\\fakepath\\", ""));
        });*/



        function validar()
        {
          if($("#input_usuario").val() == '')
          {
            alert("El campo Usuario es un campo obligatorio.");
            return false;
          }


          if($("#input_contrasena").val() ==  '')
          {

            alert("El  campo Contraseña  es un campo obligatorio.");
            return false;
          }
     
        }
      </script>

  </head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

  <!-- contenido -->
  <div class="container">
    <div class="login">

      <div class="container informacion">
        <div class="span6">

          <img src="../img/logo-pal.png" class="logo-icon pull-left"><h1>Inicio de Sesión</h1>

          <hr />

          <form method="post" name="form_categoria" onSubmit="return validar()" class="form-horizontal">

            <div class="control-group">
              <label class="control-label" for="inputUser">Usuario</label>
              <div class="controls">
                <input type="text" id="input_usuario" name="input_usuario" placeholder="Usuario">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Contraseña</label>
              <div class="controls">
                <input type="password" id="input_contrasena" name="input_contrasena" placeholder="Contraseña">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="inputGoto">Ir a:</label>
              <div class="controls">
                <select name = 'input_seccion' id = 'input_seccion'>
                  <option value = '0'>Seleccione una sección</option>
                  <option value = 'productos'>Productos</option>
                  <option value = 'eventos'>Eventos</option>
                  <option value = 'slider'>Slider</option>
                  <option value = 'categorias'>Categorías</option>
                </select>
              </div>
            </div>            

            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn" name="iniciar_sesion" id="iniciar_sesion">Iniciar Sesión</button>
              </div>
            </div>
          </form>

        </div><!-- fin span -->
      </div><!-- fin informacion -->

    </div><!-- fin login -->
  </div><!-- fin container -->

  <?php 
  if(isset($_POST["iniciar_sesion"]) && $_POST["input_usuario"] != '' && $_POST["input_contrasena"] != '')
  {

    //require_once('metodos_usuario.php');

    //autenticar($_POST); 
    echo"<script> window.location='productos.php';</script>";

  }?>
    <!-- 

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/google-code-prettify/prettify.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    <script src="../js/bootstrap-affix.js"></script>
    <script src="../js/application.js"></script>

  </body>
</html>