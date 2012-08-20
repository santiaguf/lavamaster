<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar pagos - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<p class='alerta'>Instrucciones: Para borrar un pago, debe ingresar el id del pago que se encuentra en el <a href='verpagos.php'> Listado</a>.
Recuerde que esta acci&oacute;n no se puede Deshacer.</p>
<form action='borrarpagos.php' class="agregar" method='GET'> 
<b>Id Pago:</b><input type='text' size='4' name='id_pago'/>
<p><input type='submit' value='eliminar' /> 
</form> 
<a href='verpagos.php'>volver Listado</a>
</body>
</html>