<?php
require_once('admin/conexion.php');


function trae_sliders()
{
	$sql = "SELECT descripcion, estatus, imagen, nombre  FROM slider ORDER BY nombre";
	$rs_sql = mysql_query($sql);

	$html = "";
	$primera =0;
	while ($row = mysql_fetch_array($rs_sql)) 
	{
		if($primera == 0)
		{
			$html .='<div class="item active">';
				$html .= '<img src="admin/'.$row['imagen'].'" alt="">';
				/*$html .= ' <div class="carousel-caption">';
					$html .= '<h3 style = "color:white;">'.$row['nombre'].'</h3>';
					$html .= '<p>'.$row['descripcion'].'</p>';
				$html .= ' </div>';*/
			$html .= '</div>';

			$primera =1;
		}

		$html .='<div class="item">';
				$html .= '<img src="admin/'.$row['imagen'].'" alt="">';
				/*$html .= ' <div class="carousel-caption">';
					$html .= '<h3 style = "color:white;">'.$row['nombre'].'</h3>';
					$html .= '<p>'.$row['descripcion'].'</p>';
				$html .= ' </div>';*/
			$html .= '</div>';
	}

	return $html;
}
?>