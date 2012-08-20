<?php 
include("conexion.php");
user_login();
?>

	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Borrar ficha - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
<body>
<p class='alerta'>Instrucciones: Para borrar una ficha, debe ingresar el id de la ficha que se encuentra en el <a href='verficha.php'> Listado</a>.
Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
<form action='borrarficha.php' class="agregar" method='GET'> 
<b>Id ficha:</b><input type='text' size='4' name='id_ficha'/>
<p><input type='submit' value='eliminar' /> 
</form> 
<a href='verficha.php'>volver Listado</a>
</body>
	</html>