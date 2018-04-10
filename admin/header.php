<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>PAL | Todo para su portón</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />

    <link href="../css/file.css" rel="stylesheet"> 
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>
    <script src = "../js/jquery.livequery.js"></script>
    <script src = "../js/jquery.livequery.min.js"></script>
    <script src = "../js/funciones.js"></script>
    <script src = "../js/main.js"></script>
    <script type="text/javascript" charset="utf-8">
      /* Default class modification */
      $.extend( $.fn.dataTableExt.oStdClasses, {
        "sSortAsc": "header headerSortDown",
        "sSortDesc": "header headerSortUp",
        "sSortable": "header"
      } );

      /* API method to get paging information */
      $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
      {
        return {
          "iStart":         oSettings._iDisplayStart,
          "iEnd":           oSettings.fnDisplayEnd(),
          "iLength":        oSettings._iDisplayLength,
          "iTotal":         oSettings.fnRecordsTotal(),
          "iFilteredTotal": oSettings.fnRecordsDisplay(),
          "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
          "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
        };
      }

      /* Bootstrap style pagination control */
      $.extend( $.fn.dataTableExt.oPagination, {
        "bootstrap": {
          "fnInit": function( oSettings, nPaging, fnDraw ) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function ( e ) {
              e.preventDefault();
              if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                fnDraw( oSettings );
              }
            };

            $(nPaging).addClass('pagination').append(
              '<ul>'+
                '<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
                '<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
              '</ul>'
            );
            var els = $('a', nPaging);
            $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
            $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
          },

          "fnUpdate": function ( oSettings, fnDraw ) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

            if ( oPaging.iTotalPages < iListLength) {
              iStart = 1;
              iEnd = oPaging.iTotalPages;
            }
            else if ( oPaging.iPage <= iHalf ) {
              iStart = 1;
              iEnd = iListLength;
            } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
              iStart = oPaging.iTotalPages - iListLength + 1;
              iEnd = oPaging.iTotalPages;
            } else {
              iStart = oPaging.iPage - iHalf + 1;
              iEnd = iStart + iListLength - 1;
            }

            for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
              // Remove the middle elements
              $('li:gt(0)', an[i]).filter(':not(:last)').remove();

              // Add the new list items and their event handlers
              for ( j=iStart ; j<=iEnd ; j++ ) {
                sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                  .insertBefore( $('li:last', an[i])[0] )
                  .bind('click', function (e) {
                    e.preventDefault();
                    oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                    fnDraw( oSettings );
                  } );
              }

              // Add / remove disabled classes from the static elements
              if ( oPaging.iPage === 0 ) {
                $('li:first', an[i]).addClass('disabled');
              } else {
                $('li:first', an[i]).removeClass('disabled');
              }

              if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                $('li:last', an[i]).addClass('disabled');
              } else {
                $('li:last', an[i]).removeClass('disabled');
              }
            }
          }
        }
      } );

      /* Table initialisation */
      </script>
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
  </head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">

<!-- cabecera del sitio -->
	<div class="container">
		<div class="site">

      <div class="row header">

        <a href="index.php">
          <img src="../img/logo-pal.png" alt="PAL logo todo para su portón" class="logo">
        </a>

        <div class="span5 contacto pull-right">
          <a href="../index.php" class="btn btn-primary" TARGET="_blank"> <i class="icon-search icon-white"></i>Ver Sitio</a>
          <a href="salir.php" class="btn btn-inverse"><i class="icon-off icon-white"> </i>Cerrar Sesión</a>
          <!--<p class="primero">Juan José Ríos 307 Ote. Int. 3-A <br />
          Col. Miguel Alemán. Culiacán, Sinaloa.</p>
          <p class="segundo"><strong>¡Llamanos!</strong> Tel./Fax: (667) 7-62-52-65</p>
          <p class="tercero">ventas_pal@hotmail.com</p>
          </p>-->
        </div><!-- fin span -->
      </div><!-- fin row -->

			<!-- menu principal del sitio -->
		    <div class="navbar navbar-orange">
		        <div class="navbar-inner">
		            <div class="container">
		                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                </a>
		                <div class="nav-collapse collapse">
		                  <ul class="nav">
		                    <li><a href="productos.php" id="productos">Productos</a></li>
                        <li><a href="eventos.php" id="eventos">Eventos</a></li>
		                    <li><a href="slider.php" id="slider">Slider</a></li>
                        <li><a href="categorias.php" id="categorias">Categorías</a></li>
                        <li><a href="tipo_cambio.php" id="tipo_cambio">Tipo Cambio</a></li>
		                  </ul>

                      
                      <!--<form class="navbar-search pull-right">
                          <input type="text" class="search-query" placeholder="Buscar">
                      </form>	-->	                  
		                 
		                </div><!-- fin nav-collapse -->
		            </div><!-- fin container -->
		        </div><!-- fin de navbar inner -->
		    </div><!-- fin nav -->

<!-- fin de la cabecera -->