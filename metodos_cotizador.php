<?php
require_once('admin/conexion.php');

function trae_productos_select()
{
	$sql = "SELECT id, nombre FROM categorias WHERE estatus = 0";
	$rs_sql = mysql_query($sql);

	$option = '';
	while ($row = mysql_fetch_array($rs_sql)) 
	{
		$option .= '<optgroup label="'.$row['nombre'].'">';
			$sql_p = "SELECT id, nombre FROM productos WHERE categoria_id = '".$row['id']."'";
			$rs_sql_p = mysql_query($sql_p);

			while ($row_p = mysql_fetch_array($rs_sql_p)) 
			{
				$option .= '<option value = "'.$row_p['id'].'">'.$row_p['nombre'].'</option>';
			}
		$option .= '</optgroup>';

	}

	return $option;
}

if(isset($_POST['buscar_producto']))
{
	$result = trae_datos_producto($_POST['producto_id']);
	echo json_encode($result);
}

function guardar($post)
{
	$nombre = $post['inputName'];
	$telefono = $post['inputPhone'];
	$correo = $post['inputEmail'];
	$fecha = date("Y-m-d");

	$sql_cabecero = "INSERT INTO cotizacion(correo, fecha, nombre, telefono)
					VALUES('$correo','$fecha', '$nombre','$telefono')";
	$rs_sql_cabecero = mysql_query($sql_cabecero);

	$cotizacion_id = mysql_insert_id();
	$campos = array("0"=>"producto_id", "1"=>"cantidad", "2"=>"precio", "3"=>"unidad");
	$items = array();
	if($cotizacion_id != '')
	{
		foreach ($campos as $key => $campo) 
		{
			$item = $post['input_'.$campo.'_0'];

			$control = 0;
	         if(count($item)> 0)
	         {
	            foreach($item AS $valor)
	            {

	                $items[$control][$campo] = $valor;
	                $control++;
	                    
	            }
	         }
		}

		$total_cotizacion = 0;
		foreach($items as $_item) 
        {

            if($_item['producto_id'] != '' && $_item['producto_id'] > 0)
            {
            	$array = array();
             	$resultado  = array_merge($array, $_item);
             	
             	$sql_detalle  = "INSERT INTO cotizacion_detalle(cotizacion_id, producto_id, cantidad, precio, unidad, fecha)
								VALUES('".$cotizacion_id."', '".$resultado['producto_id']."', '".$resultado['cantidad']."' , '".$resultado['precio']."', '".$resultado['unidad']."', '$fecha')";
             	$rs_detalle = mysql_query($sql_detalle);
             	$total_cotizacion += $resultado['precio'] * $resultado['cantidad'];
            }
            
        }

        $update   = "UPDATE cotizacion SET total_cotizacion = '$total_cotizacion' WHERE id = '$cotizacion_id'";
        $rs_update = mysql_query($update);

        echo"<script>window.location='clase_pdf.php?id=$cotizacion_id'</script>";

	}
}

function trae_datos_producto($id)
{
	$sql = "SELECT codigo, precio_moneda_nacional  AS precio, descripcion, unidad FROM productos  WHERE id = '$id'";
	$rs_sql = mysql_query($sql);

	$resultado = array();
	if($row = mysql_fetch_array($rs_sql))
	{
		$resultado[] = $row;
	}

	return $resultado;
}

?>