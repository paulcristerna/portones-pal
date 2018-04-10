<?php
require_once('conexion.php');


function guardar($post)
{

	$nombre = $post['input_nombre'];
	$descripcion = $post['input_descripcion'];

	$sql_insert = "INSERT INTO categorias(descripcion, nombre, estatus)
           			 VALUES('$descripcion', '$nombre', 0)";
    $rs_insert = mysql_query($sql_insert);

    echo"<script>window.location='categorias.php'</script>";

}


if($_POST['cmd'] == 5)//Categorias
{
	$sql = "SELECT id, nombre FROM categorias WHERE estatus = 0 ORDER BY nombre";
	$rs_sql = mysql_query($sql);

	$html = "";
	while ($row = mysql_fetch_array($rs_sql)) 
	{
		$html .= "<option value = '".$row['id']."'>".$row['nombre']."</option>";
	}

	echo $html;
}

if($_POST['cmd'] == 1)//Listado
{
	$sql = "SELECT id, nombre, descripcion, estatus FROM categorias WHERE estatus in(0,3)";

	if($_POST['nombre'] != '')
	{
		$sql .= " AND nombre like '".$_POST['nombre']."%'";
	}

	if($_POST['descripcion'] != '')
	{
		$sql .= " AND descripcion like '".$_POST['descripcion']."%'";
	}


	$sql .= "  ORDER BY nombre";


	$rs_sql = mysql_query($sql);
	$html = '<table class="table table-striped" id = "listado">';
		$html.='<thead><tr>';
			$html.='<th>Nombre</th>';
			$html.='<th>Descripcion</th>';
			$html.='<th>Estatus</th>';
			$html.='<th>Acciones</th>';
		$html.='</tr></thead><tbody>';
	while ($row = mysql_fetch_array($rs_sql))
	{
		$html.='<tr>';
			
			$html.='<td>'.$row['nombre'].'</td>';
			$html.='<td>'.$row['descripcion'].'</td>';
			if($row['estatus'] == 0)
			{

				$html.='<td>Activo</td>';	
			}
			elseif($row['estatus'] == 3)
			{
				$html.='<td>Inactivo</td>';	
			}
			
			$html.='<td><a href="editar-categoria.php?id='.$row['id'].'"><i class="icon-pencil"></i></a> <a onclick=" eliminar('.$row['id'].');  return false; " href=""><i class="icon-remove"></i></a></td>';

		$html.='</tr>';
		
	}

	$html.= '</table></tbody>';

	echo $html;

}

function cargar_edicion($id)
{
	$sql = "SELECT id, nombre, descripcion FROM categorias WHERE id ='$id'";
	$rs_sql =mysql_query($sql);
	$row = mysql_fetch_array($rs_sql);

	$html = '
			<input type = "hidden" id = "input_id" name = "input_id" value = "'.$row['id'].'">
			<label>Nombre del categoría:</label>
              <input type="text" id="input_nombre" name =  "input_nombre" placeholder="Nombre del categoría" value = "'.$row['nombre'].'">

              <label>Descripcion:</label>
              <textarea id="input_descripcion"  name =  "input_descripcion" placeholder="Descripcion" rows="8" style="width:500px;">'.$row['descripcion'].'</textarea>
	';

	return $html;
}

function editar($post, $file)
{


	$nombre = $post['input_nombre'];
	$descripcion = $post['input_descripcion'];

	

	$sql_update ="UPDATE categorias SET nombre ='$nombre', descripcion ='$descripcion' WHERE id = '".$post['input_id']."'";
	$rs_update = mysql_query($sql_update);

	 echo"<script>window.location='categorias.php'</script>";

}

if($_POST['cmd'] == 3)
{
	$sql = "DELETE FROM categorias WHERE id = '".$_POST['id']."'";
	$rs_sql = mysql_query($sql);
}

if($_POST['cmd'] == 9)//Validar cancelacion
{
	$sql = "SELECT count(id) AS id FROM productos WHERE categoria_id =  '".$_POST['id']."'";
	$rs_sql = mysql_query($sql);
	$row  = mysql_fetch_array($rs_sql);

	if($row['id'] > 0)
	{
		
		echo "No se puede eliminar esta categoria por que esta relacionada a almenos un producto";
	}
	else
	{
		echo '';
	}
}


?>