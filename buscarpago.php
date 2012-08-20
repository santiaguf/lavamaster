<?php 
include("conexion.php");
user_login();
?>
	<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Buscar pagos - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
		<body>
		<center><h2>Busqueda por mes</h2></center>
		<form action='pagodecada.php' class="agregar" method='GET'> 
		<p><b>Instrucciones:</b> Seleccione a&ntilde;o mes y decada
		</p>
		
		<b>a&ntilde;o: </b>
		<?php	 
		echo"<select name='anio'>";
		for ($i=2010; $i < 2016; $i++) {
		echo  "<option value='$i'>$i</option>";
		}
		echo"</select>";
		?>
		
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
	     <br>
		<b>decada: </b>
		<select name='decada'>
		<option value='01'>1</option>
		<option value='11'>2</option>
		<option value='21'>3</option>
		</select>
		<input type='submit' value='Buscar' /> 
		</form>
		
		<center><h2>Busqueda por empleado</h2></center>
		<form action='pagoempleado.php' class="agregar" method='GET'> 
		<?php
		// Consultar la base de datos
		$consulta_mysql='select * from empleados';
		$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
		//menu desplegable con lista de quimicos
		echo "<p><b>Nombre Empleado:</b><br /> <select name='id_empleado'>";
		while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		// se invirtieron las comillas dobles por simples para que funcione en windows server
		echo '<option value="'.$fila['id_empleado'].'">'.$fila['nombre_empleado'].'</option>';
		}
		echo "</select>";
		?>
		<input type='submit' value='Buscar' /> 
		</form>
		
		<center><a href='nomina.php'>Volver a pagos</a></center>
		</body>
	</html>