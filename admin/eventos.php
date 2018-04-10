<?php include("header.php"); ?>
<!-- inicio del contenido -->

<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
      echo "<script>window.location = 'index.php'</script>";
  }
?>

<input type = 'hidden' id = 'ventana' value = 'eventos'>

      <!-- contenido -->

       <script type="text/javascript">

       function eliminar(id)
        {
          $.ajax({
 
                url: "metodos_eventos.php",
 
                type: "POST",
 
                async: false,
 
                data: { cmd :3, id:id},
 
                success: function(resultado)
                {
                  grid_search();   
                }
 
            });
        }

        function grid_search()
        {
          $("#div_listado").html('');
          $('#esperando').show(); 

          $.ajax({
 
                url: "metodos_eventos.php",
 
                type: "POST",
 
                async: false,
 
                data: { cmd :1, nombre: $("#buscar_nombre").val(), descripcion: $("#descripcion").val(), trae_categorias:0},
 
                success: function(resultado)
                {
                 
                  var contador = 0;
                  var intervalo = setInterval(function(){
                    contador++;

                    if(contador == 10)
                    {
                       $('#esperando').hide();
                       $("#div_listado").html(resultado);
                       data_table();  
                       clearInterval(intervalo);

                    }


                 },250);
 
                }
 
            });

        }

      </script>

      <div class="container informacion">
        <div class="span11">
          <h1>Eventos</h1>
          <hr />

          <p><a href="agregar-evento.php" class="btn"><i class="icon-plus-sign"></i> Agregar evento</a></p>

          <table  class ="table table-striped">
            <tr>
              <th>Nombre</th>
              <td>
               <input type = 'text' id = 'buscar_nombre' class="span3">
              </td>

               <th>Descripcion</th>
              <td>
               <input type = 'text' id = 'descripcion' class="span3">
              </td>
              <td>
                <input type="button" id="buscar" class="btn" onclick="$('#mensaje_mostar').hide(); grid_search()" value="Buscar">
              </td>
          </tr>
          </table>
           <div id="esperando" style="text-align: center; z-index:1000; padding: 15px 0; background-color:#FBF2EF; display:none">
            <span style="font-size: 16px; font-weight:bold; color:#494e50">Cargando Listado</span><br>
            <img src="imagenes/barra_de_progreso.gif">
          </div>

          <center>
          <table width="100%" id="mensaje_mostar"><tr><th>Para mostrar la información del listado presione el botón Buscar</th></tr></table>
          </center>
          <div id = 'div_listado'>
          </div>         
        </div>

      </div><!-- fin informacion -->

<!-- fin del contenido -->
<?php include("footer.php"); ?>