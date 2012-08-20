<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>editar pagos - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
if (isset($_GET['id_pago']) ) { 
$id_pago = (int) $_GET['id_pago']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `pagos` SET  `fecha_inicial` =  '{$_POST['fecha_inicial']}' ,  `fecha_final` =  '{$_POST['fecha_final']}' ,  `nombre_empleado` =  '{$_POST['nombre_empleado']}' ,  `cedula_empleado` =  '{$_POST['cedula_empleado']}' ,  `salario_base` =  '{$_POST['salario_base']}' ,  `valor_hora` =  '{$_POST['valor_hora']}' ,  `dias_trabajados` =  '{$_POST['dias_trabajados']}' ,  `subsidio_transporte` =  '{$_POST['subsidio_transporte']}' ,  `hed` =  '{$_POST['hed']}' ,  `hen` =  '{$_POST['hen']}' ,  `hef` =  '{$_POST['hef']}' ,  `rn` =  '{$_POST['rn']}' ,  `otros_pagos` =  '{$_POST['otros_pagos']}' ,  `subtotal` =  '{$_POST['subtotal']}' ,  `aportes` =  '{$_POST['aportes']}' ,  `netos` =  '{$_POST['netos']}'   WHERE `id_pago` = '$id_pago' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Editado satisfactoriamente.<br />" : "No se ha editado. <br />"; 
echo "<a href='verpagos.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `pagos` WHERE `id_pago` = '$id_pago' ")); 
?>

<form action='' method='POST'> 
<p><b>Fecha Inicial:</b><br /><input type='text' name='fecha_inicial' value='<?php echo stripslashes($row['fecha_inicial']) ?>' /> 
<p><b>Fecha Final:</b><br /><input type='text' name='fecha_final' value='<?php echo stripslashes($row['fecha_final']) ?>' /> 
<p><b>Nombre Empleado:</b><br /><input type='text' name='nombre_empleado' value='<?php echo stripslashes($row['nombre_empleado']) ?>' /> 
<p><b>Cedula Empleado:</b><br /><input type='text' name='cedula_empleado' value='<?php echo stripslashes($row['cedula_empleado']) ?>' /> 
<p><b>Salario Base:</b><br /><input type='text' name='salario_base' value='<?php echo stripslashes($row['salario_base']) ?>' /> 
<p><b>Valor Hora:</b><br /><input type='text' name='valor_hora' value='<?php echo stripslashes($row['valor_hora']) ?>' /> 
<p><b>Dias Trabajados:</b><br /><input type='text' name='dias_trabajados' value='<?php echo stripslashes($row['dias_trabajados']) ?>' /> 
<p><b>Subsidio Transporte:</b><br /><input type='text' name='subsidio_transporte' value='<?php echo stripslashes($row['subsidio_transporte']) ?>' /> 
<p><b>Horas extras diurnas:</b><br /><input type='text' name='hed' value='<?php echo stripslashes($row['hed']) ?>' /> 
<p><b>Horas extras noche:</b><br /><input type='text' name='hen' value='<?php echo stripslashes($row['hen']) ?>' /> 
<p><b>Horas extras festivos:</b><br /><input type='text' name='hef' value='<?php echo stripslashes($row['hef']) ?>' /> 
<p><b>Recargos nocturnos:</b><br /><input type='text' name='rn' value='<?php echo stripslashes($row['rn']) ?>' /> 
<p><b>Otros Pagos:</b><br /><input type='text' name='otros_pagos' value='<?php echo stripslashes($row['otros_pagos']) ?>' /> 
<p><b>Subtotal:</b><br /><input type='text' name='subtotal' value='<?php echo stripslashes($row['subtotal']) ?>' /> 
<p><b>Aportes:</b><br /><input type='text' name='aportes' value='<?php echo stripslashes($row['aportes']) ?>' /> 
<p><b>Netos:</b><br /><input type='text' name='netos' value='<?php echo stripslashes($row['netos']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 
	echo "<a href='verpagos.php'>Cancelar</a>";
?> 
</body>
</html>