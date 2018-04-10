<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'productos'>

  <style type="text/css">

    .holder{
      color: blue !important;
      text-decoration: none !important;
    }
    #limpiar{
      clear: both;
    }

    

  </style>

  <div class="container informacion">
   
    <div class="span11">
      <h1>Productos</h1>
      <hr /> 
      <p align = "right"> <input type="text" id="input_buscador" name = "input_buscador" placeholder="Buscar Producto Nombre" ></p>
    </div><!-- fin row -->

    <div class="span2">
      <h3>Categorías</h3>
       <?php
            require_once('metodos_catalago_productos.php');
                     
            echo trae_categorias_catalago();
        ?>
   <input type = "hidden" id = "categoria_seleccionada_id" value = "">

    </div>
   <div id = "productos_cat">
 
     
    </div><!-- Fin del div productos_cat-->
     <div id="esperando" style="text-align: center; z-index:1000; padding: 15px 0; padding-top:220px; display:none">           
        <img src="img/cargando.gif" width = "70px" height="70px"/><br>
        <span style="font-size: 16px; font-weight:bold; color:#494e50">cargando....</span><br>
    </div>
  </div><!-- fin informacion -->
  <div id = "limpiar">
  </div>

<!-- fin del contenido -->
<?php include("footer.php"); ?>