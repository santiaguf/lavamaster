<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>pagar a un trabajador - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<h1>Pago de n&oacute;mina </h1>

<!-- formulario para agregar datos -->
<form action='pago2.php' id="el-primer-parrafo" method='POST'> 

<b>Periodo de pago:</b>
<p><b>del d&iacute;a: </b>
	<?php	 
	echo"<select name='dia_inicial'>";
	for ($i=1; $i < 32; $i++) {
		echo  "<option value='$i'>$i</option>";
	}
	echo"</select>";
	?>
	<b>mes: </b>
	<select name="mes_inicial">	
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

<p><b> al d&iacute;a: </b>
	<?php	 
	echo"<select name='dia_final'>";
	for ($i=1; $i < 32; $i++) {
		echo  "<option value='$i'>$i</option>";
	}
	echo"</select>";
	?> 
	<b>mes: </b>
	<select name="mes_final">	
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

<!--<b>C&eacute;dula del Empleado:</b><input type='text' size='8' name='cedula_empleado'/>	
<b>Sueldo Mensual:</b><input type='text' size='8' name='sueldo_mes'/> -->
<p><b>D&iacute;as periodo:</b><input type='text' size='2' value='10' name='dias_periodo'/>
<b>D&iacute;as festivos:</b><input type='text' size='2' value='0' name='dias_festivos'/>
<b>Horas trabajadas:</b><input type='text' size='2' value='0' name='horas_normales'/>
<b>D&iacute;as trabajados:</b><input type='text' size='2' value='0' name='dias_trabajados'/>
<p><b>Horas extras diurnas:</b><input type='text' size='2' value='0' name='horas_extras_diurnas'/>
<b>Horas extras nocturnas:</b><input type='text' size='2' value='0' name='horas_extras_nocturnas'/>
<b>Horas extras festivos:</b><input type='text' size='2' value='0' name='horas_extras_festivos'/>	
<b>Recargo Nocturno (en horas):</b><input type='text' size='2' value='0' name='recargo_nocturno'/>
<b>Otros pagos:</b><input type='text' value='0' name='otros_pagos'/>	

<p><input type='submit' value='enviar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<a href='nomina.php'>Cancelar</a>
</body>
</html>