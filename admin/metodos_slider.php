<?php

require_once('conexion.php');


function guardar($post, $file)
{

	$nombre = $post['input_nombre'];
	$descripcion = $post['input_descripcion'];

	$dir = "imagenes/slider";
	$file_type  =  $file['input_imagen']['type'];
	$file_temp_name  = $file['input_imagen']['tmp_name'];
	$file_name = $file['input_imagen']['name'];

 
	if(is_uploaded_file($file_temp_name)) 
	{ 
		$ruta = "$dir/$file_name";
		move_uploaded_file($file_temp_name, $ruta ); 
	}
	

	$sql_insert = "INSERT INTO slider(descripcion, nombre, estatus, imagen)
			        VALUES('$descripcion', '$nombre', 0, '$ruta')";
	$rs_insert = mysql_query($sql_insert);

	echo"<script>window.location='slider.php'</script>";
	
}

if($_POST['cmd'] == 1)//Listado
{
	$sql = "SELECT id, estatus, imagen, nombre, descripcion FROM slider WHERE estatus in(0,3)";

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
			$html.='<th>Imagen</th>';
			$html.='<th>Nombre</th>';
			$html.='<th>Descripcion</th>';
			$html.='<th>Estatus</th>';
			$html.='<th>Acciones</th>';
		$html.='</tr></thead><tbody>';
	while ($row = mysql_fetch_array($rs_sql))
	{
		$html.='<tr>';

			$html.='<td><img src="'.$row['imagen'].'" class="icon" alt=""></td>';
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
			
			$html.='<td><a href="editar-slider.php?id='.$row['id'].'"><i class="icon-pencil"></i></a> <a onclick=" eliminar('.$row['id'].');  return false; " href=""><i class="icon-remove"></i></a></td>';

		$html.='</tr>';
		
	}

	$html.= '</tbody></table>';

	echo $html;

}

function cargar_edicion($id)
{
	$sql = "SELECT id, estatus, imagen, nombre, descripcion FROM slider WHERE id ='$id'";
	$rs_sql =mysql_query($sql);
	$row = mysql_fetch_array($rs_sql);

	$html = '
			<input type = "hidden" id = "input_id" name = "input_id" value = "'.$row['id'].'">
			<label>Nombre del elemento:</label>
              <input type="text" id="input_nombre" name = "input_nombre" placeholder="Nombre del elemento" value="'.$row['nombre'].'">

             <label>Imagen:</label>
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_imagen" id = "input_imagen" accept="image/*" />
                <span onclick = "$(\'#input_imagen\').click();">Examinar</span>
                <div class="archivo">'.$row['imagen'].'</div>
              </div>

              <label>Descripcion:</label>
              <textarea id="input_descripcion" name = "input_descripcion"  placeholder="Descripcion" rows="8" style="width:500px;">'.$row['descripcion'].'</textarea>
	';

	return $html;
}

function editar($post, $file)
{
	$nombre = $post['input_nombre'];
	$descripcion = $post['input_descripcion'];
	//revisar si la imagen esta vacia solo de actualizan los demas campos
	if(empty($file['input_imagen']['tmp_name'])){
		$sql_update ="UPDATE slider SET nombre ='$nombre', descripcion ='$descripcion' WHERE id = '".$post['input_id']."'";
		$rs_update = mysql_query($sql_update);

	 	echo"<script>window.location='slider.php'</script>";
	}
	else
	{
	

		$dir = "imagenes/slider";
		$file_type  =  $file['input_imagen']['type'];
		$file_temp_name  = $file['input_imagen']['tmp_name'];
		$file_name = $file['input_imagen']['name'];


		if(file_exists($file_temp_name)) 
		{ 
			if(is_uploaded_file($file_temp_name)) 
			{ 
				$ruta = "$dir/$file_name";
				move_uploaded_file($file_temp_name, $ruta ); 
				

			}
		}

		$sql_update ="UPDATE slider SET nombre ='$nombre', descripcion ='$descripcion', imagen = '$ruta' WHERE id = '".$post['input_id']."'";
		$rs_update = mysql_query($sql_update);

		
	 	echo"<script>window.location='slider.php'</script>";
	 }

}

if($_POST['cmd'] == 3)
{

	$sql_img = "SELECT imagen FROM slider WHERE id = '".$_POST['id']."'";
	$rs_img = mysql_query($sql_img);
	$row = mysql_fetch_array($rs_img);

	if($row['imagen'] != '')
	{
		unlink($row['imagen']);  
	}


	$sql = "DELETE FROM slider WHERE id = '".$_POST['id']."'";
	$rs_sql = mysql_query($sql);
}
?>