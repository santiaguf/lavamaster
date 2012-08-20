<?php 
include("conexion.php");
user_login();
?>

	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Borrar proceso - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
		<body>
		<p class='alerta'>Instrucciones: Para borrar un proceso, debe ingresar el id del proceso que se encuentra en el <a href='versub.php'> Listado</a>.
		Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
		<form action='borrarsub.php' class="agregar" method='GET'> 
		<b>Id proceso:</b><input type='text' size='4' name='id_subproceso'/>
		<p><input type='submit' value='eliminar' /> 
		</form> 
		<a href='versub.php'>volver Listado</a>
		</body>
	</html>