<?php
require_once('conexion.php');

function autenticar($post){

	//declaracion de variables
	$usuario = $post['input_usuario'];
	$contrasena = $post['input_contrasena'];	

	//proteccion contra la inyeccion sql
	$usuario = stripslashes($usuario);
	$contrasena = stripslashes($contrasena);

	/*$usuario = mysql_real_escape_string($usuario);
	$contrasena = mysql_real_escape_string($contrasena);*/

	//consulta a la base de datos
	try
	{
		/*$sql_query = "SELECT id, usuario, contrasena FROM usuarios 
						WHERE usuario = '$usuario' AND contrasena = '$contrasena'";*/

		if($usuario === "admin")
		{
			$conteo++;
		}

		if($contrasena === "admin123")
		{

		}

		/*$sql_resultado = mysql_query($sql_query);
		$row = mysql_fetch_array($sql_resultado);*/
				
		//$conteo = mysql_num_rows($sql_resultado);
		if($conteo == 2){
			session_start();
			$_SESSION['usuario'] = $usuario;
			//redireccionar
			header("location: productos.php");		
		}
		else
		{

			//mensaje de error
			echo"<script>alert('Usuario y/o Contraseña invalidos.');</script>";		
		}
	}
	catch(Exception $error)
	{
		//mensaje de error
		echo"<script>alert('Usuario y/o Contraseña invalidos.');</script>";		
	}

	ob_end_flush();
}

?>