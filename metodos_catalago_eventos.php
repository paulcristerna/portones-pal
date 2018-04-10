<?php
require_once('admin/conexion.php');


	if(isset($_POST['buscar_evento_catalago']))
	{
		echo trae_eventos();
	}
	function trae_eventos()
	{

		$sql = "SELECT id, descripcion, fecha, imagen, lugar, nombre 
			FROM eventos ORDER BY fecha DESC";
		$rs_sql = mysql_query($sql);

		$html = '<div class = "holder" style = "float:right;"></div><div class="span9" id = "itemContainer">';
		$primera = 0;
		while ($row = mysql_fetch_array($rs_sql)) 
		{
			if($primera == 0)
			{
				$primera = 1;
			}

			$html.='<div class="row">';
				$html .= '<div class="span2 pull-left"><img src="admin/'.$row['imagen'].'" alt="" class="img-polaroid pull-left" data-zoom-image="admin/'.$row['imagen'].'" /></div>';
				$html .= ' <div class="span5"><h4>'.$row['nombre'].'</h4><p>'.$row['descripcion'].' </p></div>';
				$html .= '<div class="span2">Ubicación: <p></p><strong>'.$row['lugar'].'<p></p></strong>Fecha: <p></p><strong>'.$row['fecha'].'</strong></div>';  
			$html.='</div><hr/>';
			
		}
		$html .= '</div><div class = "holder" style = "float:right;"></div><div class="span9" id = "itemContainer">';

		if($primera ==0)
		{
			return '<strong  class="span5" style = "padding-top:50px; padding-left:20%;"> No hay eventos</strong>';
		}
		return $html;

	}

	function trae_evento_reciente()
	{
		$sql = "SELECT imagen, descripcion FROM eventos ORDER BY  fecha DESC LIMIT 1";
		$rs_sql = mysql_query($sql);
		$row = mysql_fetch_array($rs_sql);

		if($row['imagen'] != '')
		{
			$html = '<img src="admin/'.$row['imagen'].'" alt="'.$row['descripcion'].'">';
		}
		else{

			$html = '<img src="admin/imagenes/eventos/default.png" alt="">';
		}

		return $html;
	}//Fin de la funcion trae_evento_reciente
?>