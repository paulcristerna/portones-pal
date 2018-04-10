<?php

require_once('conexion.php');


if(isset($_POST['validar_tipo_cambio']))
{
	$result = validar_tipo_cambio($_POST['fecha']);

	echo$result;

}



if(isset($_POST['trae_ultimo_tipo_cambio']))
{
	$result = trae_ultimo_tipo_cambio();
	echo$result;

}

function trae_ultimo_tipo_cambio()
{
	$sql = "SELECT id, tipo_cambio, fecha FROM tipo_cambio ORDER BY fecha DESC LIMIT 1";
	$rs_sql = mysql_query($sql);
	$row = mysql_fetch_array($rs_sql);

	if($row['id'] != "")
	{
		return $row['tipo_cambio'];
	}
	else
	{
		return 0;
	}
}

function validar_tipo_cambio($fecha)
{
	$sql = "SELECT count(id) AS result FROM tipo_cambio WHERE fecha = '$fecha'";
	$rs_sql = mysql_query($sql);
	$row = mysql_fetch_array($rs_sql);

	return $row['result'];

}

function guardar($post)
{
	$fecha  = $post['input_fecha'];
	$tipo_cambio = $post['input_tipo_cambio'];


	$sql = "INSERT INTO tipo_cambio(fecha, tipo_cambio) VALUES('$fecha', '$tipo_cambio')";
	$rs_sql = mysql_query($sql);
	actualizar_tipo_cambio($tipo_cambio);

	echo"<script>window.location='tipo_cambio.php'</script>";
}

function actualizar_tipo_cambio($tipo_cambio)
{
	if($tipo_cambio != '')
	{
		$sql  = "SELECT  id, precio FROM productos WHERE moneda >0";
		$rs_sql = mysql_query($sql);

		while ($row =  mysql_fetch_array($rs_sql)) 
		{
			$importe_nuevo  = $row['precio'] * $tipo_cambio;

			$update = "UPDATE productos SET precio_moneda_nacional = '$importe_nuevo', tipo_cambio = '$tipo_cambio' WHERE id = '".$row['id']."'";
			$rs_update = mysql_query($update);
		}
	}

}


?>