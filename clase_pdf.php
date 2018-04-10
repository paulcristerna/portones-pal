<?php
require_once("utilerias/dompdf/dompdf_config.inc.php");
require_once("utilerias/PHPMailer_5.2.0/class.phpmailer.php");
require_once('admin/conexion.php');

$id = $_REQUEST['id'];
$html = genera_html_pdf($id);

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$nombre = "Cotizacion.pdf";
$dompdf->stream($nombre);
$pdf = $dompdf->output();
//$dompdf->output();
file_put_contents($nombre, $pdf);

enviar_correo($nombre);

function genera_html_pdf($documento_id)
{
    $sql_c = "SELECT id, nombre, correo, telefono, fecha, total_cotizacion FROM cotizacion WHERE id = '$documento_id'";
    $rs_c = mysql_query($sql_c);
    $row = mysql_fetch_array($rs_c);

    $html = '<div style =  "width:100%;">';

    $html .='<table style = "width:100%; text-align: right;">';
        $html .='<tr><td style = "text-align: left; font-weight:bold;">PAl Todo Para Su Porton</td><td colspan ="8"></td><td><b>Fecha :</b> '.date("d-m-Y").'</td></tr>';
         $html .='<tr><td style = "text-align: left; font-weight:bold;">Juan Jose Rios 307 Ote. Int. 3-A</td></tr>';
         $html .='<tr><td style = "text-align: left; font-weight:bold;">Col. Miguel Aleman. Culiacan, Sinaloa.</td></tr>';
    $html .='</table>';

    
    if($row['id'] != '')
    {
       
         $html .='<p align= "center">';
            $html .='<strong><h3>Cotizacion<br></h3></strong><hr/>';
        $html .='</p>';

        $html .= '<table style = "width:100%;" >';
            $html .= '<tr><td>Nombre :'.$row['nombre'].'</td></tr>';
            $html .= '<tr><td>Telfono :'.$row['telefono'].'</td></tr>';
            $html .= '<tr><td>Correo :'.$row['correo'].'</td></tr>';

            $sql_d = "SELECT c.nombre, b.cantidad, b.precio, b.unidad
                        FROM cotizacion_detalle AS b
                        INNER JOIN productos AS c ON b.producto_id = c.id 
                        WHERE b.cotizacion_id = '$documento_id'";
            $rs_d = mysql_query($sql_d);

             $html .= '<tr style = "text-align: center;">';
               $html .= '<th style = " background-color:gray;">Producto</th>';
               $html .= '<th style = " background-color:gray;">Cantidad</th>';
               $html .= '<th style = " background-color:gray;">Precio</th>';
               $html .= '<th style = " background-color:gray;">Unidad</th>';
             $html .= '</tr>';
            while ($row_d = mysql_fetch_array($rs_d)) 
            {
                $html .= '<tr style = "text-align: left;">';
                    $html .= '<td>'.$row_d['nombre'].'</td>';
                    $html .= '<td style = "text-align: right;">'.$row_d['cantidad'].'</td>';
                    $html .= '<td style = "text-align: right;">'.$row_d['precio'].'</td>';
                    $html .= '<td>'.$row_d['unidad'].'</td>';
                $html .= '</tr>';
                
            }

        $iva = ($row['total_cotizacion'] * 16)/100;

        $html .='<tr><td  colspan = "2"></td><td style = " background-color: gray; text-align: right;">Total:</td><td style = "text-align: right;">'.number_format($row['total_cotizacion'] ,2).'</td></tr>';
        $html .= '</table>';

    }

    $html .= '<div style = "margin-top:20%;"><hr/>';
        $html .='<ul>';
        $html .= '<li>IVA incluido</li>';
        $html .= '<li>Flete y seguro por cuenta y riesgo del cliente.</li>';
        $html .= '<li>Tiempo de entrega sujeto a disponibilidad.</li>';
        $html .= '<li>Necesario  comprobante de pago para envio de mercancia.</li>';
        $html .= '<li>Algunos poductos son cotizados en dolares americanos, sujetos a variacion en tipo de cambio BANAMEX-VENTA del dia de la compra. </li>';
        $html .='</ul>';
    $html .= '</div></div>';

    return utf8_encode($html);

}//Fin de la funcion genera_html_pdf

function enviar_correo($contenido)
{
    $email  =  new PHPMailer();
    $email->From = "soporte@pal.com.mx"; // Remitente
    $email->FromName = "Portones Pal"; //Nombre de el Remitente
    $email->Subject = "Cotizacion"; // Nota de el subject
    $email->AddAddress("davidgastelum14@gmail.com");
    $email->AddAddress("ventas_pal@pal.com.mx");
    $email->IsHTML(true);//Indicamos que el contenido es no es html
    $email->AddAttachment($contenido);
    $email->Body = "Cotizacion PAL"; //Contenido que va a ser enviado
    $email->Send();

  echo"<script>window.location='cotizador.php'</script>";

}//Fin de la funcion enviar_correo


?>