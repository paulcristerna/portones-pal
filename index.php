<?php include("header.php"); ?>
<!-- inicio del contenido -->

<input type = 'hidden' id = 'ventana' value = 'index'>



              <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                </ol>
                <div class="carousel-inner">
                  <?php
                      require_once('metodos_pagina_slider.php');
                               
                      echo trae_sliders();
                  ?>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>

      
      <div class="container">        
        <div class="span2">
          <h4>Tenemos las mejores marcas...</h4>
          <ul class="thumbnails">
            <li class="span2">
              <img src="img/marcas/chamberlain.jpg" class="thumbnail" alt="Chamberlain logo">
            </li>
            <li class="span2">
              <img src="img/marcas/liftmaster.jpg" class="thumbnail" alt="Liftmaster logo">
            </li>            
            <li class="span2">
              <img src="img/marcas/craftsman.jpg" class="thumbnail" alt="Craftsman logo">
            </li> 
            <li class="span2">
              <img src="img/marcas/merik.jpg" class="thumbnail" alt="Merik logo">
            </li>                
            <li class="span2">
              <img src="img/marcas/erreka.jpg" class="thumbnail" alt="Erreka logo">
            </li>
            <li class="span2">
              <img src="img/marcas/amarr.jpg" class="thumbnail" alt="Amarr logo">
            </li>
            <li class="span2">
              <img src="img/marcas/rw.jpg" class="thumbnail" alt="Richards Willcox logo">
            </li>                       
            <li class="span2">
              <img src="img/marcas/lynx.jpg" class="thumbnail" alt="Lynx logo">
            </li>
          </ul>                  
                    
        </div>

        <div class="span9">
          <h1>Productos</h1>

          <ul class="thumbnails">
            <li class="span5">
              <a href="productos.php" class="thumbnail" >
                <img src="img/productos.jpg" alt="" id = "imagen_data" style=" height:200px;"  data-zoom-image="img/promo.jpg"/ >
              </a>
            </li>

            <?php
                 require_once('metodos_catalago_productos.php');

                 $cat =trae_categorias_index();
                 
                 if($cat != "")
                 {
                    echo $cat;
                 }
            ?>
          </ul>

          <hr />
        

        <div class="row">

          <div class="span3">
            <a href="cotizador.php" class="enlace"><h3>Cotizador</h3></a>
            <a href="cotizador.php" class="thumbnail">
              <img src="img/cotizador.jpg" alt="cotizador portones pal">
            </a>
            <p class="parrafo">
              <strong>Utilice nuestra cotización en línea</strong>, calcule el costo real de su proyecto 
              fácilmente. Si tiene alguna duda o no encuentra lo que busca, por favor siéntase en libertad 
              de contactarnos. 
              <br /><a href="cotizador.php">Más Información...</a>
            </p>
          </ul>
          </div><!-- fin span -->


          <div class="span3">
            <a href="eventos.php" class="enlace"><h3>Eventos</h3></a>
            <a href="eventos.php" class="thumbnail">
              <img src="img/eventos.jpg" alt="eventos portones pal">
            </a>
            <p class="parrafo">
              <strong>Contamos con diversos eventos</strong> de demostración de nuestros productos para que esté 
              totalmente convencido que somos la mejor opción en cuanto a automatización de portones 
              eléctricos.
              <br /><a href="eventos.php">Más Información...</a>
            </p>
          </ul>
          </div><!-- fin span -->
        
      
          <div class="span3">
            <a href="nuestra-empresa.php" class="enlace"><h3>Nuestra Empresa</h3></a>
            <a href="nuestra-empresa.php" class="thumbnail">
             <img src="img/empresa.jpg" alt="nuestra empresa portones pal">
            </a>
            <p class="parrafo">
             <strong>PAL TODO PARA SU PORTON</strong>. Somos una empresa distribuidora al mayoreo 
             y menudeo de todo lo relacionado con la  automatización de portones y sistemas de 
             acceso residencial e industrial. 
             <br /><a href="nuestra-empresa.php">Más Información...</a>
            </p>
          </ul>
          </div><!-- fin span -->

        </div><!-- fin row -->

        <hr />

        <h2>Ultimos Trabajos</h2>

          <ul class="thumbnails">

              <li class="span2 ">               
                  <img src="img/thumbnail-6.png" alt="" id = "imagen_data" style="height: 85px;" class = "thumbnail img-polaroid" data-zoom-image="img/thumbnail-6.png"/ >              
              </li>

              <li class="span2 ">               
                  <img src="img/thumbnail-7.png" alt="" id = "imagen_data" style="height: 85px;" class = "thumbnail img-polaroid" data-zoom-image="img/thumbnail-7.png"/ >              
              </li>

              <li class="span2 ">               
                  <img src="img/thumbnail-8.png" alt="" id = "imagen_data" style="height: 85px;" class = "thumbnail img-polaroid" data-zoom-image="img/thumbnail-8.png"/ >              
              </li>
              
              <li class="span2 ">               
                  <img src="img/thumbnail-9.png" alt="" id = "imagen_data" style="height: 85px;" class = "thumbnail img-polaroid" data-zoom-image="img/thumbnail-9.png"/ >              
              </li>           
          </ul>        

        </div><!-- fin span -->

      </div><!-- fin container -->

<!-- fin del contenido -->
<?php include("footer.php"); ?>