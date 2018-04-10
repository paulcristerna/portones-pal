$(document).ready(function(){

          var ventana = $("#ventana").val();
          $("#"+ventana).parent().addClass("active");

          $(".date_picker").each(function(){

            var fecha = '';
            if($(this).val() != '')
            {
              fecha = $(this).val();
            }
             $(this).datepicker({
              changeMonth: true,
              changeYear: true
            });
             $(this).datepicker('option', {dateFormat: 'yy-mm-dd'});
             $(this).val(fecha);
             $(this).addClass("calendar");

          });

          if(ventana == "tipo_cambio")
          {
            $("form").append("<div id = 'divTipoCambio' style = 'display:none;' title = 'Tipo de Cambio'>El tipo de cambio de esta fecha ya fue capturado desea continuar?</div>");

          }
});





$("#input_moneda_id").livequery("change", function(){
    if($(this).val() >0)
    {
   
        trae_tipo_cambio();
      
      $("#div_tipo_cambio").show();
    }
    else
    {
      $("#div_tipo_cambio").hide();
      $("#input_tipo_cambio").val(1);

    }

});

$('.decimal').livequery("keypress", function(event) {
    if (event.which != 46 && (event.which < 47 || event.which > 59))
    {
        event.preventDefault();
        if ((event.which == 46) && ($(this).indexOf('.') != -1)) {
            event.preventDefault();
        }
    }
});

function trae_tipo_cambio()
{
   $.ajax({
 
                url: "metodos_tipo_cambio.php",
                type: "POST",
                async: false,
                data: { trae_ultimo_tipo_cambio :1},
                success: function(resultado)
                {

                  $("#input_tipo_cambio").val(resultado);
                }
 
            });


}



function data_table()
      {
        $('#listado').dataTable( {
                            "sDom": "<'row'<'span8'l><'span8'f>r>t<'row'<'span8'i><'span8'p>>",
                            "sPaginationType": "bootstrap",
                            "oLanguage": {
                             "sLengthMenu": " _MENU_ Registros por pagina",
                              "sZeroRecords": "No se encontraron registros",
                              "sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",
                              "sInfoEmpty": "Mostrando 0 de 0 de 0 registros",
                              "sInfoFiltered": "(filtered from _MAX_ total records)"
                            }
        });

         $("#listado_filter").remove();

 } 


 
          $(".custom-input-file #input_imagen").livequery("change",function(){
              if(imagen_Size($(this)))
              {
                $(this).parent().find(".archivo").html($(this).val());
              }
          }).css('border-width',function(){
              if(navigator.appName == "Microsoft Internet Explorer")
                  return 0;
          });

          $(".custom-input-file #input_pdf").livequery("change",function(){
              if(imagen_Size($(this)))
              {
                $(this).parent().find(".archivo").html($(this).val());
              }
          }).css('border-width',function(){
              if(navigator.appName == "Microsoft Internet Explorer")
                  return 0;
          });



 function imagen_Size(adjunto) 
 {

           var fileInput = adjunto[0];
           var tamano = fileInput.files[0];
           var tamano_imagen = Math.round(parseInt(tamano.size));
           var tamano_max = Math.round(parseInt(2082533));
           if(tamano_imagen > tamano_max)
           {
           	 	alert("El tamaño de la imagen es supera al tamaño maximo permitido");
              adjunto.val("");
           	 	return false;
           }

           return true;
     
}

function validar_tipo_cambio()
{
 

  $.ajax({
 
                url: "metodos_tipo_cambio.php",
 
                type: "POST",
 
                async: true,
 
                data: { validar_tipo_cambio :1, fecha : $("#input_fecha").val()},
 
                success: function(resultado)
                {
                  if(resultado > 0)
                  {
                     dialogo_tipo_cambio();

                  }
                  else
                  {
                     $("#form_tipo_cambio").removeAttr("onSubmit");
                     $("#form_tipo_cambio").attr("action", "tipo_cambio.php");
                     dialog_guardar();
                     $("#admin_guardar").click();
                     
         
                  }
 
                }
 
            });

}


function dialogo_tipo_cambio()
{
  
    $("#divTipoCambio").dialog(
           {
            bgiframe: true,
            autoOpen: true,
            width: 400,
            draggable: true,
            resizable: true,
            modal: true,
            closeOnEscape: false,
            close: function(){
              $("#divTipoCambio").dialog("destroy"); 
            }
           }
    );


    $("#divTipoCambio").dialog("option", "buttons", {

      "No": function() {
              
           $(this).dialog("close"); 
   
        }, 

     "Si": function() {

          $(this).dialog("close");
          $("#input_validar_tipo_cambio").val(0)
          $("#form_tipo_cambio").removeAttr("onSubmit");
          $("#form_tipo_cambio").attr("action", "tipo_cambio.php");
          dialog_guardar();
          $("#admin_guardar").click();         

        }
             
    });




  setTimeout("ocultar_close_dialog_tipo_cambio()",1);
}

function ocultar_close_dialog_tipo_cambio()
{
    $("#divTipoCambio").parent().find('.ui-dialog-titlebar-close').hide();
}
