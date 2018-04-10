function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
 
 
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}


function add_linea()
{
  var ultima_linea  = $("#ultima_linea").val();
  var nueva_linea = parseInt(ultima_linea ) + parseInt(1);
  $("#ultima_linea").val(nueva_linea);

  //Clonamos la nueva fila
  var fila = $("#fila_cotizar_0").clone();

  //Cambiamos los atributos del tr id  y line
  fila.attr("id", "fila_cotizar_"+nueva_linea);
  fila.attr("line", nueva_linea);
  fila.removeAttr("style");

  //Remplasmos los ids  de los td 
  fila.find("td").find(".input").each(function(){

    var id_anterior = $(this).attr("id");
    var nuevo_id  = id_anterior.substring(0, id_anterior.length-1);
    $(this).attr("id", nuevo_id+nueva_linea);

  });

  //Agregamos la linea a  la tabla

  $("#tabla_cotizacion").append(fila);


  return nueva_linea;

}

function remove_linea(obj)
{
  var linea_removida =  obj.parent().parent().parent().attr("line");
  obj.parent().parent().remove();
  calcula_total_cotizacion();
  return linea_removida;
}

function dialog_guardar()
{

  $("form").append("<div id = 'divGuardar' title = 'Guardando'>Guardando su informacion espere.....</div>");
  $("#divGuardar").dialog(
           {
            bgiframe: true,
            autoOpen: true,
            width: 400,
            draggable: true,
            resizable: true,
            modal: true,
            closeOnEscape: false,
            close: function(){
              $("#divGuardar").dialog("destroy"); 
            }
           }
    );



  setTimeout("ocultar_close_dialog()",1);

   return true;
}

function ocultar_close_dialog()
{
    $("#divGuardar").parent().find('.ui-dialog-titlebar-close').hide();
}
