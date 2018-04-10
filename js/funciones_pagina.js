$(document).ready(function(){

      var ventana = $("#ventana").val();
      $("#"+ventana).parent().addClass("active");

     if($("#ventana").val() == 'productos')
     {

       $(".container").append("<div id = 'divBuscarProducto' style = 'display:none;' title = 'Buscar Producto Por Nombre'><p> <strong>Teclee el nombre del producto</strong></p><input type = 'text' id  = 'nombre_producto' name  = 'nombre_producto'></div>");
        trae_catalago_productos(0, "");
        zoom_imagen(1);
        setTimeout("jpages()",500);
       
        
     }
     else if($("#ventana").val() == 'eventos')
     {
       trae_catalago_eventos();
       zoom_imagen(1);
       setTimeout("jpages()",500);

     }
     else if($("#ventana").val() == 'cotizador')
     {
       add_linea();
       $("#input_producto_id_1").parent().parent().parent().parent().find(".icon-minus-sign").parent().attr("disabled", "disabled");
     }
     else if($("#ventana").val() == 'index')
     {
        zoom_imagen(15);      
     }

    
      
});

$("#inputEmail").livequery("change", function()
{
    if(!validar_email($(this).val()))
    {
        alert("El email no es valido");
        $(this).val("");
    }
});

$(".cantidad").livequery("keyup", function(){

  if($(this).val().length >0)
  {
     calcula_total_cotizacion();
  }
  
});


$('#input_buscador').livequery('keyup', function (e) {
  var key = e.keyCode || e.which;
  if (key === 13) {

   buscar_por_producto($("#categoria_seleccionada_id").val(), $("#input_buscador").val());
    
  }
});   

$(".producto_id").livequery("change",function(){

       var linea = $(this).parent().parent().parent().parent().attr("line");
       if($(this).val() != '' && $(this).val() > 0)
       {
         trae_datos_producto(linea);
       }
       else
       {
          $("#input_precio_"+linea).val(0);
          $("#input_unidad_"+linea).val("");
          $("#input_cantidad_"+linea).attr("disabled", "disabled");
          $("#input_cantidad_"+linea).val();
       }
      

    });

function calcula_total_cotizacion()
{
  var importe = 0;
  $(".cantidad").each(function(){

      var renglon = $(this).parent().parent().attr("line");

      if(renglon > 0)
      {
        if(!isNaN($(this).val()))
        {
           importe += parseInt($("#input_cantidad_"+renglon).val()) * parseFloat($("#input_precio_"+renglon).val());
        }
        else
        {
          importe += 0;
        }    
      }

  });

  importe = parseFloat(importe);
  $("#total").val(importe);
}

function validar_email(valor)
{
        // creamos nuestra regla con expresiones regulares.
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        // utilizamos test para comprobar si el parametro valor cumple la regla
        if(filter.test(valor))
            return true;
        else
            return false;
}

function jpages()
{
    $("div.holder").jPages({
      containerID : "itemContainer",
      keyBrowse: true,
      scrollBrowse : true
    });

}

function zoom_imagen(postion)
{
  $(".img-polaroid").each(function(){

        $(this).elevateZoom({zoomWindowPosition: postion, 
                          zoomWindowOffetx: 2, 
                          zoomWindowHeight: 300, 
                          zoomWindowWidth:400, 
                          borderSize: 0, 
                          easing:true, 
                          zoomLevel : 0.7});
     });



}

function cotizar()
{
  if(validar_cotizacion())
  {
    //imprimir_pdf();
     //$("#total_cotizacion").show();
     $("#tabla_cotizacion").find(".cantidad").removeAttr("disabled");
  }
  else
  {
    return false;
  }
 
}

function validar_cotizacion()
{
  if($("#inputName").val() == '')
  {
    alert("El nombre es requerido");
    return false;
  }

  if($("#inputPhone").val() ==  ''  ||  $("#inputPhone").val().length < 7)
  {
    alert("El numero telefonico no es valido"); 
    return false;
  }

  if($("#inputEmail").val() == '')
  {
    alert("El email es requerido");
    return false;
    
  }

  return true;
}

function imprimir_pdf()
{
    $.ajax({
 
                url: "metodos_cotizador.php",
 
                type: "POST",
 
                async: false,
 
                data: { generar_cotizacion :1, html:$("#tabla_cotizacion").html()},
 
                success: function(resultado)
                {
                  if(resultado != "")
                  {

                     $("#total_cotizacion").show();
                  }
 
                }
 
            });
}


function trae_datos_producto(linea)
{

          $.post("metodos_cotizador.php", {buscar_producto : 1, producto_id : $("#input_producto_id_"+linea).val()},
            function(datos)
            {
                if(datos.length > 0)
                {
                                            
                    $.each(datos, function(key, item)
                    {

                         $("#input_precio_"+linea).val(item.precio);
                         $("#input_unidad_"+linea).val(item.unidad);
                         $("#input_cantidad_"+linea).removeAttr("disabled");

                    });
                    
                }
            },
        "json");

}


function cambiar(elemento)
{
    $(".div_cat").each(function(){

        $(this).removeClass("select");
    });

    elemento.addClass("select");
    $("#productos_cat").hide();
    $("#esperando").show();
    $("#productos_cat").html("");

    trae_catalago_productos(elemento.attr("id"), $("#input_buscador").val());
    

    var contador = 0;
    var intervalo = setInterval(function(){
                    contador++;

                    if(contador == 10)
                    {
                      $("#esperando").hide();
                      $("#productos_cat").show();
                      zoom_imagen(1);
                      setTimeout("jpages()",500);
                      
                    }


  },250);
}

function buscar_por_producto(categoria_id, nombre )
{

   $("#productos_cat").hide();
    $("#esperando").show();
    $("#productos_cat").html("");

    trae_catalago_productos(categoria_id, nombre);
    

    var contador = 0;
    var intervalo = setInterval(function(){
                    contador++;

                    if(contador == 10)
                    {
                      $("#esperando").hide();
                      $("#productos_cat").show();
                      zoom_imagen(1);
                      setTimeout("jpages()",500);
                      
                    }


  },250);

}


function trae_catalago_productos(categoria_id, nombre)
{

  $.ajax({
 
                url: "metodos_catalago_productos.php",
 
                type: "POST",
 
                async: false,
 
                data: { buscar_producto_catalago :1, categoria_id:categoria_id, nombre:nombre},
 
                success: function(resultado)
                {
                  if(resultado != "")
                  {

                    $("#productos_cat").append(resultado);
                    $("#categoria_seleccionada_id").val(categoria_id);
                  }
 
                }
 
            });

}

function trae_catalago_eventos()
{

  $.ajax({
 
                url: "metodos_catalago_eventos.php",
 
                type: "POST",
 
                async: false,
 
                data: { buscar_evento_catalago :1, },
 
                success: function(resultado)
                {
                  if(resultado != "")
                  {

                    $("#eventos_cat").append(resultado);
               
                    
                  }
 
                }
 
            });

}
