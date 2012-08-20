<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar qu&iacute;mico - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<p class='alerta'>Instrucciones: Para borrar un quimico, debe ingresar el id del quimico que se encuentra en el <a href='verqui.php'> Listado</a>.
Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
<form action='borrarqui.php' class="agregar" method='GET'> 
<b>Id Quimico:</b><input type='text' size='4' name='id_quimico'/>
<p><input type='submit' value='eliminar' /> 
</form> 
<a href='verqui.php'>volver Listado</a>
</body>
</html>