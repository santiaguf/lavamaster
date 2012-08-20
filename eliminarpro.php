<?php 
include("conexion.php");
user_login();
?>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Borrar proveedor - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
<body>
	<p class='alerta'>Instrucciones: Para borrar un proveedor, debe ingresar el id del proveedor que se encuentra en el <a href='verpro.php'> Listado</a>.
	Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
	<form action='borrarpro.php' class="agregar" method='GET'> 
	<b>Id Proveedor:</b><input type='text' size='4' name='id_proveedor'/>
	<p><input type='submit' value='eliminar' /> 
	</form> 
	<a href='verpro.php'>volver Listado</a>
</body>
</html>