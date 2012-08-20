<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<p class='alerta'>Instrucciones: Para borrar un quimico ingresado al inventario, debe ingresar el id del inventario que se encuentra en el <a href='verinv.php'> Listado</a>.
Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
<form action='borrarinv.php' class="agregar" method='GET'> 
<b>Id Inventario:</b><input type='text' size='4' name='id_inventario'/>
<p><input type='submit' value='eliminar' /> 
</form> 
<a href='verinv.php'>volver Listado</a>
</body>
</html>