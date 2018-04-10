<?php
	require_once('admin/conexion.php');


	if(isset($_POST['buscar_producto_catalago']))
	{
		echo trae_catalago_productos($_POST['categoria_id'], $_POST['nombre']);
	}

	function trae_catalago_productos($categoria_id = 0, $nombre = NULL)
	{
		$sql = "SELECT a.id, a.imagen, a.codigo, a.descripcion AS descripcion_producto, a.nombre AS nombre_producto, b.nombre AS nombre_categoria, 
						b.descripcion AS descripcion_categoria, a.precio_moneda_nacional, a.pdf
				FROM productos AS a INNER JOIN categorias AS b ON a.categoria_id = b.id";

		if($categoria_id > 0 && $categoria_id != '')
		{
			$sql .= " AND b.id = '$categoria_id'";
		}

		if($nombre != "")
		{
			$sql .= " AND  a.nombre LIKE '%$nombre%'";
		}
	

		if($categoria_id > 0 && $categoria_id != '')
		{
			$sql .= " ORDER BY a.nombre, a.fecha DESC ";
		}
		else
		{
			$sql .= " ORDER BY a.nombre, a.fecha DESC LIMIT 18";
		}

		
		$rs_sql = mysql_query($sql);

		

		$html = '<div class = "holder" style = "float:right;"></div>';
		$html .= '<div class="span9" id = "itemContainer">';
		$primera = 0;
		while ($row = mysql_fetch_array($rs_sql)) {
			
			if($categoria_id > 0 && $categoria_id != '' && $primera == 0 )
			{
				$html .=' <h2>'.$row['nombre_categoria'].'</h2><p>'.$row['descripcion_categoria'].'</p><hr />';
				$primera  = 1;
			}
			elseif($primera == 0)
			{
				$html .=' <h2>Todas</h2><p>Se muestran los productos de  todas las categorias existentes</p> <hr />';
				$primera  = 1;
			}

			$html.='<div class="row">';
				$html .= ' <div class="span2 pull-left"> <img src="admin/'.$row['imagen'].'" alt="" class="img-polaroid" data-zoom-image="admin/'.$row['imagen'].'" /></div>';
				$html .= '<div class="span5"><h4>'.$row['nombre_producto'].'</h4><p>'.$row['descripcion_producto'].' </p></div>';
				$html .= '<div class="span2"><p>Precio: </p><h3>$'.$row['precio_moneda_nacional'].'</h3>';

				if($row['pdf'] != "")
				{
					$html .= '<p><a href="admin/'.$row['pdf'].'" target="_blank"><strong class="btn">Mas información... </strong></a></p> </div>';
				}
				else
				{
					$html .= '<p><strong class="btn" disabled>Mas información... </strong></p></div>';
				}

			$html.='</div><hr/>';
		}

		$html .= '</div><div class = "holder" style = "float:right;"></div>';

		if($primera ==0)
		{
			return '<strong  class="span5" style = "padding-top:50px; padding-left:20%;"> No hay productos existentes para esta categoria</strong>';
		}
		return $html;

	}//Fin de la funcion trae_catalago_productos

	function trae_categorias_catalago()
	{
		$sql = "SELECT id, nombre FROM categorias ORDER BY nombre";
		$rs_sql = mysql_query($sql);

		$html = "";

		while ($row = mysql_fetch_array($rs_sql)) 
		{
			 
			$html .= '<button id = "'.$row['id'].'"class = "div_cat btn"  onclick = "cambiar($(this));">'.$row['nombre'].'</button>';
		}

		if($html != '')
		{
			return $html;
		}
		else
		{
			$html = '<span>No hay categorias....</span>';

			return $html;
		}


		
	}//Fin de la funcion trae_categorias_catalago

	function trae_producto_reciente()
	{
		$sql = "SELECT imagen, descripcion FROM productos ORDER BY  fecha DESC LIMIT 1";
		$rs_sql = mysql_query($sql);
		$row = mysql_fetch_array($rs_sql);

		if($row['imagen'] != '')
		{
			$html = '<img src="admin/'.$row['imagen'].'" alt="'.$row['descripcion'].'">';
		}
		else{

			$html = '<img src="admin/imagenes/productos/default.png" alt="">';
		}

		return $html;
	}//Fin de la funcion trae_producto_reciente

	function trae_categorias_index()
	{
		$sql =  "SELECT id, nombre, descripcion FROM categorias ORDER BY nombre";
		$rs_sql = mysql_query($sql);

		$html ="";
		while ($row =  mysql_fetch_array($rs_sql)) 
		{
			$html .= ' <li class="span2">
			              <a href="productos.php" class="thumbnail">
			                <center><strong><h4>'.$row['nombre'].'</h4></strong></center>
			              </a>
			            </li>';
		}

		return $html;
	}




?>