<?php 
include("conexion.php");
user_login();
?>
	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Buscar quimicos en inventario - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
		<body>
			<center><h2>Busqueda por fecha exacta</h2></center>
		<form action='invfecha.php' class="agregar" method='GET'> 
		<p><b>Instrucciones:</b> Escriba la fecha en el formato AAAA-MM-DD, por ejemplo: para buscar qu&iacute;micos agregados el
			23 de marzo de 2012, debe escribir: 2012-03-22</a>.
		</p>
		<b>fecha:</b><input type='text' size='6' name='fecha'/>
		<input type='submit' value='Buscar' /> 
		</form>
		
		<center><h2>Busqueda por mes</h2></center>
		<form action='invmes.php' class="agregar" method='GET'> 
		<p><b>Instrucciones:</b> Seleccione mes y a&ntilde;o.
		</p>
		<b>mes: </b>
	<select name="mes">	
		<option value="01">Enero</option>
		<option value="02">Febrero</option>
		<option value="03">Marzo</option>
		<option value="04">Abril</option>
		<option value="05">Mayo</option>
		<option value="06">Junio</option>
		<option value="07">Julio</option>
		<option value="08">Agosto</option>
		<option value="09">Septiembre</option>
		<option value="10">Octubre</option>
		<option value="11">Noviembre</option>
		<option value="12">Diciembre</option>
	</select> 
	
	<b>a&ntilde;o: </b>
	<?php	 
	echo"<select name='anio'>";
	for ($i=2010; $i < 2016; $i++) {
		echo  "<option value='$i'>$i</option>";
	}
	echo"</select>";
	?>
		<input type='submit' value='Buscar' /> 
		</form>

		<center><a href='seccioninv.php'>Volver a inventario</a></center>
		</body>
	</html>