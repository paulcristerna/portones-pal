<?php
require_once('conexion.php');

function guardar($post, $file)
{

	$nombre =  $post['input_nombre'];
	$categoria_id = $post['input_categoria_id'];
	$descripcion =  $post['input_descripcion'];
	$precio = $post['input_precio'];
	$codigo = $post['input_codigo'];
	$fecha = $post['input_fecha'];
	$unidad = $post['input_unidad'];
	$tipo_cambio =$post['input_tipo_cambio'];
	$moneda = $post['input_moneda_id'];
	$precio_moneda_nacional = $precio  * $tipo_cambio;

	//Empesamos con las variables de las imagenes
	$dir = "imagenes/productos";

	$file_type_image  =  $file['input_imagen']['type'];
	$file_temp_name_image   = $file['input_imagen']['tmp_name'];
	$file_name_image  = $file['input_imagen']['name'];

	$file_type_pdf  =  $file['input_pdf']['type'];
	$file_temp_name_pdf  = $file['input_pdf']['tmp_name'];
	$file_name_pdf  = $file['input_pdf']['name'];


		

	if(is_uploaded_file($file_temp_name_image)) 
	{ 
		$ruta_image = "$dir/$file_name_image";
		move_uploaded_file($file_temp_name_image, $ruta_image );
	}


	if(is_uploaded_file($file_temp_name_pdf)) 
	{ 
		$ruta_pdf = "$dir/$file_name_pdf";
		move_uploaded_file($file_temp_name_pdf, $ruta_pdf );
	}

	$sql_insert = "INSERT INTO productos(categoria_id, codigo, descripcion, imagen, pdf, nombre, precio, unidad, fecha, moneda, tipo_cambio, precio_moneda_nacional)
		            VALUES('$categoria_id', '$codigo','$descripcion', '$ruta_image', '$ruta_pdf', '$nombre' ,'$precio', '$unidad', '$fecha', '$moneda', '$tipo_cambio', '$precio_moneda_nacional')";
	
	$rs_insert = mysql_query($sql_insert);
	echo "<script>window.location='productos.php'</script>";
	
}

if($_POST['cmd'] == 1)//Listado
{
	$sql = "SELECT a.id, b.nombre AS nombre_categoria, a.codigo, a.imagen, a.nombre AS nombre_producto,
			 a.fecha, a.precio, a.unidad, a.precio_moneda_nacional
			FROM productos AS a INNER JOIN categorias AS b ON a.categoria_id = b.id WHERE b.estatus in(0,3)";

	if($_POST['categoria_id'] != '')
	{

		$sql .= " AND b.id ='".$_POST['categoria_id']."'";

	}

	if($_POST['nombre'] != '')
	{
		$sql .= " AND a.nombre like '%".$_POST['nombre']."%'";
	}

	$sql .= "  ORDER BY a.nombre";

	$style_th = ' style = " width:200px !important; text-align:center !important; cursor: pointer;"';
	$rs_sql = mysql_query($sql);
	$html = '<table class="table table-striped" id = "listado">';
		$html.='<thead><tr>';
			$html.='<th '.$style_th.'>Imagen</th>';
			$html.='<th'.$style_th.'>Codigo</th>';
			$html.='<th'.$style_th.'>Nombre</th>';
			//$html.='<th>Unidad</th>';
			$html.='<th '.$style_th.'>Fecha</th>';
			$html.='<th '.$style_th.'>Categoria</th>';
			$html.='<th '.$style_th.'>Precio</th>';
			$html.= '<th style = " width:500px !important; text-align:center !important; cursor: pointer;">Precio Moneda Nacional</th>';
			$html.='<th '.$style_th.'>Acciones</th>';
		$html.='</tr></thead><tbody>';
	while ($row = mysql_fetch_array($rs_sql))
	{
		$html.='<tr>';
			$html.='<td><img src="'.$row['imagen'].'" class="icon img-polaroid" alt=""></td>';
			$html.='<td>'.$row['codigo'].'</td>';
			$html.='<td>'.$row['nombre_producto'].'</td>';
			//$html.='<td>'.$row['unidad'].'</td>';
			$html.='<td>'.$row['fecha'].'</td>';
			$html.='<td>'.$row['nombre_categoria'].'</td>';
			$html.='<td>'.$row['precio'].'</td>';
			$html.='<td>'.$row['precio_moneda_nacional'].'</td>';
			$html.= '<td><a href="editar-producto.php?id='.$row['id'].'"><i class="icon-pencil"></i></a> <a onclick=" eliminar('.$row['id'].');  return false; " href=""><i class="icon-remove"></i></a></td>';
		$html.='</tr>';
		
	}

	$html.= '</tbody></table>';

	echo $html;

}

function cargar_edicion($id)
{
	$sql = "SELECT id, categoria_id, codigo, descripcion, imagen, nombre, precio, unidad, fecha, moneda, tipo_cambio, pdf
					FROM productos WHERE id ='$id'";
	$rs_sql =mysql_query($sql);
	$row = mysql_fetch_array($rs_sql);

	$html = '
			<input type = "hidden" id = "input_id" name = "input_id" value = "'.$row['id'].'">
			<label>Nombre del producto:</label>
              <input type="text" id="input_nombre" name = "input_nombre" placeholder="Nombre del producto" value = "'.$row['nombre'].'">

              <label>Codigo del producto:</label>
              <input type="text" id="input_codigo" name = "input_codigo" placeholder="Codigo del producto" value = "'.$row['codigo'].'">

              <label>Unidad del producto:</label>
              <input type="text" id="input_unidad" name = "input_unidad" placeholder="Unidad del producto" value = "'.$row['unidad'].'">

              <label>Imagen:</label>
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_imagen" id = "input_imagen" accept="image/*" />
                <span onclick = "$(\'#input_imagen\').click();">Examinar</span>
                <div class="archivo">'.$row['imagen'].'</div>
              </div>

                <label>PDF:</label>
              <div class="custom-input-file " ><input  type="file" class="input-file hide" name="input_pdf" id = "input_pdf" accept="application/pdf" />
                <span onclick = "$(\'#input_pdf\').click();">Examinar</span>
                <div class="archivo">'.$row['pdf'].'</div>
              </div>
               <label>Fecha:</label>
              <input type="text" id="input_fecha" name = "input_fecha" placeholder="Fecha" class = "date_picker" value = "'.$row['fecha'].'" >

              <label>Descripcion:</label>
              <textarea id="input_descripcion" name = "input_descripcion" placeholder="Descripcion" rows="8" style="width:500px;">'.$row['descripcion'].'</textarea>	
	';

	$sql_categoria = "SELECT nombre, id FROM categorias WHERE estatus = 0";
	$rs_categoria = mysql_query($sql_categoria);

	$option = '';
	while ($row_cat = mysql_fetch_array($rs_categoria)) 
	{
		if($row['categoria_id'] == $row_cat['id'])
		{
			$option .= '<option value = "'.$row_cat['id'].'" selected>'.$row_cat['nombre'].'</option>';
		}
		else
		{
			$option .= '<option value = "'.$row_cat['id'].'">'.$row_cat['nombre'].'</option>';
		}
		
	}

	$html.='<label>Categoria:</label>
              <div class="input-prepend">      
               <select name = "input_categoria_id" id = "input_categoria_id">
                <option value ="">Seleccione un categoria</option>
                '.$option.'
               </select>
            </div>

             <label>Moneda:</label>
              <div class="input-prepend">      
               <select name = "input_moneda_id" id = "input_moneda_id">';
          
         $style_tipo_cambio = 'style = "display:none;"'; 
         if($row['moneda'] > 0)
         {
         	$html .='	<option value ="0" >Pesos</option>
                		<option value ="1" selected>Dolar</option>
               			</select>
            		</div>';

           $style_tipo_cambio = 'style = "display:block;"'; 

         }
         else
         {
         	$html .='	<option value ="0" selected>Pesos</option>
                		<option value ="1">Dolar</option>
               			</select>
            		</div>';

         }

           $html .= '<div id = "div_tipo_cambio" '.$style_tipo_cambio.' >
             <label>Tipo Cambio:</label>
             <input type="text" id="input_tipo_cambio" name = "input_tipo_cambio" placeholder="0.00" value ="'.$row['tipo_cambio'].'" class = "decimal">
            </div>

              <label>Precio:</label>
              <input type="text" id="input_precio" name = "input_precio" placeholder="0.00"  value = "'.$row['precio'].'">';

	return $html;
}


function editar($post, $file)
{


	$nombre =  $post['input_nombre'];
	$categoria_id = $post['input_categoria_id'];
	$descripcion =  $post['input_descripcion'];
	$precio = $post['input_precio'];
	$codigo = $post['input_codigo'];
	$unidad = $post['input_unidad'];
	$fecha = $post['input_fecha'];	
	$tipo_cambio =$post['input_tipo_cambio'];
	$moneda =$post['input_moneda_id'];
	$precio_moneda_nacional = $precio  * $tipo_cambio;

	//revisar si la imagen esta vacia solo de actualizan los demas campos
	if(empty($file['input_imagen']['tmp_name'])){

		$pdf_update = "";
		if(!empty($file['input_pdf']['tmp_name']))
		{
				$dir = "imagenes/productos";
				$file_type_pdf  =  $file['input_pdf']['type'];
				$file_temp_name_pdf  = $file['input_pdf']['tmp_name'];
				$file_name_pdf  = $file['input_pdf']['name'];

				$ruta_pdf = "$dir/$file_name_pdf";
				if(file_exists($file_temp_name_pdf)) 
				{ 
					if(is_uploaded_file($file_temp_name_pdf)) 
					{ 
							move_uploaded_file($file_temp_name_pdf, $ruta_pdf );
					}

				}

				$pdf_update = " , pdf = '$ruta_pdf'";

		}
		$sql_update ="UPDATE productos SET nombre ='$nombre', descripcion ='$descripcion', categoria_id = '$categoria_id',
					   precio = '$precio', codigo = '$codigo', unidad = '$unidad', fecha = '$fecha', moneda = '$moneda', tipo_cambio = '$tipo_cambio',
					   precio_moneda_nacional = '$precio_moneda_nacional' $pdf_update
					   WHERE id = '".$post['input_id']."'";
		$rs_update = mysql_query($sql_update);

	}
	elseif (empty($file['input_pdf']['tmp_name'])) 
	{
		$img_update = "";
		if(!empty($file['input_imagen']['tmp_name']))
		{
				$dir = "imagenes/productos";
				$file_type  =  $file['input_imagen']['type'];
				$file_temp_name  = $file['input_imagen']['tmp_name'];
				$file_name = $file['input_imagen']['name'];

				$ruta = "$dir/$file_name";
				if(file_exists($file_temp_name)) 
				{ 
					if(is_uploaded_file($file_temp_name)) 
					{ 
						move_uploaded_file($file_temp_name, $ruta );
					}

				}

				$img_update = " , imagen = '$ruta'";

		}

		$sql_update ="UPDATE productos SET nombre ='$nombre', descripcion ='$descripcion', categoria_id = '$categoria_id',
					precio = '$precio', codigo = '$codigo', unidad = '$unidad', fecha = '$fecha', moneda = '$moneda', tipo_cambio = '$tipo_cambio',
					precio_moneda_nacional = '$precio_moneda_nacional' $img_update 
					WHERE id = '".$post['input_id']."'";
		$rs_update = mysql_query($sql_update);
	}
	else
	{
		$dir = "imagenes/productos";
		$file_type  =  $file['input_imagen']['type'];
		$file_temp_name  = $file['input_imagen']['tmp_name'];
		$file_name = $file['input_imagen']['name'];

		$file_type_pdf  =  $file['input_pdf']['type'];
		$file_temp_name_pdf  = $file['input_pdf']['tmp_name'];
		$file_name_pdf  = $file['input_pdf']['name'];
	
		$ruta = "$dir/$file_name";
		if(file_exists($file_temp_name)) 
		{ 
			if(is_uploaded_file($file_temp_name)) 
			{ 
				move_uploaded_file($file_temp_name, $ruta );
			}

		}

		$ruta_pdf = "$dir/$file_name_pdf";
		if(file_exists($file_temp_name_pdf)) 
		{ 
			if(is_uploaded_file($file_temp_name_pdf)) 
			{ 
					move_uploaded_file($file_temp_name_pdf, $ruta_pdf );
			}

		}

	


		$sql_update ="UPDATE productos SET nombre ='$nombre', descripcion ='$descripcion', categoria_id = '$categoria_id',
					 precio = '$precio', codigo = '$codigo', unidad = '$unidad', fecha = '$fecha', moneda = '$moneda', tipo_cambio = '$tipo_cambio',
					 precio_moneda_nacional = '$precio_moneda_nacional', imagen = '$ruta', pdf = '$ruta_pdf' 
					 WHERE id = '".$post['input_id']."'";
		$rs_update = mysql_query($sql_update);
	}
	echo"<script>window.location='productos.php'</script>";
}

if($_POST['cmd'] == 3)
{

	$sql_img = "SELECT imagen, pdf FROM productos WHERE id = '".$_POST['id']."'";
	$rs_img = mysql_query($sql_img);
	$row = mysql_fetch_array($rs_img);

	if($row['imagen'] != '')
	{
		$imagen  = explode("/", $row['imagen']);

		if($imagen[2] !=  "default.png")
		   unlink($row['imagen']);  
	}

	if($row['pdf'] != '')
	{
		unlink($row['pdf']);  
	}


	$sql = "DELETE FROM productos WHERE id = '".$_POST['id']."'";
	$rs_sql = mysql_query($sql);
}


?>