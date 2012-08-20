<?php 
include("conexion.php");
user_login();
?>

	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Borrar empleado - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
		<body>
		<p class='alerta'>Instrucciones: Para borrar un empleado, debe ingresar el id del empleado que se encuentra en el <a href='veremp.php'> Listado</a>.
		Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
		<form action='borraremp.php' class="agregar" method='GET'> 
		<b>Id Empleado:</b><input type='text' size='4' name='id_empleado'/>
		<p><input type='submit' value='eliminar' /> 
		</form> 
		<a href='veremp.php'>volver Listado</a>
		</body>
	</html>