<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar pagos de forma individual - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `pagos` ( `fecha_inicial` ,  `fecha_final` ,  `nombre_empleado` ,  `cedula_empleado` ,  `salario_base` ,  `valor_hora` ,  `dias_trabajados` ,  `subsidio_transporte` ,  `hed` ,  `hen` ,  `hef` ,  `rn` ,  `otros_pagos` ,  `subtotal` ,  `aportes` ,  `netos`  ) VALUES(  '{$_POST['fecha_inicial']}' ,  '{$_POST['fecha_final']}' ,  '{$_POST['nombre_empleado']}' ,  '{$_POST['cedula_empleado']}' ,  '{$_POST['salario_base']}' ,  '{$_POST['valor_hora']}' ,  '{$_POST['dias_trabajados']}' ,  '{$_POST['subsidio_transporte']}' ,  '{$_POST['hed']}' ,  '{$_POST['hen']}' ,  '{$_POST['hef']}' ,  '{$_POST['rn']}' ,  '{$_POST['otros_pagos']}' ,  '{$_POST['subtotal']}' ,  '{$_POST['aportes']}' ,  '{$_POST['netos']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Agregadas correctamente.<br />"; 
echo "<a href='verpagos.php'>volver al listado</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Fecha Inicial:</b><br /><input type='text' name='fecha_inicial'/> 
<p><b>Fecha Final:</b><br /><input type='text' name='fecha_final'/> 
<p><b>Nombre Empleado:</b><br /><input type='text' name='nombre_empleado'/> 
<p><b>Cedula Empleado:</b><br /><input type='text' name='cedula_empleado'/> 
<p><b>Salario Base:</b><br /><input type='text' name='salario_base'/> 
<p><b>Valor Hora:</b><br /><input type='text' name='valor_hora'/> 
<p><b>Dias Trabajados:</b><br /><input type='text' name='dias_trabajados'/> 
<p><b>Subsidio Transporte:</b><br /><input type='text' name='subsidio_transporte'/> 
<p><b>Hed:</b><br /><input type='text' name='hed'/> 
<p><b>Hen:</b><br /><input type='text' name='hen'/> 
<p><b>Hef:</b><br /><input type='text' name='hef'/> 
<p><b>Rn:</b><br /><input type='text' name='rn'/> 
<p><b>Otros Pagos:</b><br /><input type='text' name='otros_pagos'/> 
<p><b>Subtotal:</b><br /><input type='text' name='subtotal'/> 
<p><b>Aportes:</b><br /><input type='text' name='aportes'/> 
<p><b>Netos:</b><br /><input type='text' name='netos'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<center><a href='verpagos.php'>Volver al listado</a> - 
<a href='perfil.php'>Volver a perfil</a></center>

</body>
</html>
