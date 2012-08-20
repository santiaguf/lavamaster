<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar empleado - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	

// ingreso de datos en la base de datos 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `empleados` ( `nombre_empleado` ,  `cedula_empleado` ,  `salario_empleado`  ) VALUES(  '{$_POST['nombre_empleado']}' ,  '{$_POST['cedula_empleado']}' ,  '{$_POST['salario_empleado']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "empleado agregado.<br />"; 
echo "<a href='veremp.php'>Volver al listado</a>"; 
echo '<meta http-equiv="Refresh" content="2;url=veremp.php"> ';
} 
?>

<form action='' class='agregar' method='POST'> 
<p><b>Nombre Empleado:</b><br /><input type='text' name='nombre_empleado'/> 
<p><b>C&eacute;dula Empleado:</b><br /><input type='text' name='cedula_empleado'/> 
<p><b>Salario Empleado:</b><br /><input type='text' name='salario_empleado'/> 
<p><input type='submit' value='Agregar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<center><a href='veremp.php'>Volver al listado</a> - 
<a href='seccionemp.php'>Volver a empleados</a></center>

</body>
</html>
