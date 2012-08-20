<?php 
include("conexion.php");
user_login();
?>
	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Buscar ficha - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
		<body>
			<center><h2>Busqueda por n&uacute;mero de ficha</h2></center>
		<form action='ficha.php' class="agregar" method='GET'>
		<b>Instrucciones:</b> Escriba el n&uacute;mero de la ficha que se encuentra en el <a href='verficha.php'> Listado</a>.
		<p><b>N&uacute;mero de ficha:</b><input type='text' size='4' name='numero_ficha'/>
		<input type='submit' value='Buscar' /> 
		</form> 
		
			<center><h2>Busqueda por fecha</h2></center>
		<form action='fichafecha.php' class="agregar" method='GET'> 
		<p><b>Instrucciones:</b> Escriba la fecha en el formato AAAA-MM-DD, por ejemplo: para buscar las fichas agregadas el
			23 de marzo de 2012, debe escribir: 2012-03-22</a>.
		</p>
		<b>fecha:</b><input type='text' size='6' name='fecha'/>
		<input type='submit' value='Buscar' /> 
		</form>
		
		<center><h2>Busqueda por referencia</h2></center>
		<form action='fichareferencia.php' class="agregar" method='GET'> 
		<p><b>Instrucciones:</b> Escriba la referencia, que se encuentra en el <a href='verficha.php'> Listado</a>.
		</p>
		<b>fecha:</b><input type='text' size='6' name='referencia'/>
		<input type='submit' value='Buscar' /> 
		</form>

		<center><a href='seccionficha.php'>Volver a fichas</a></center>
		</body>
	</html>