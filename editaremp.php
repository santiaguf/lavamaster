<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>editar empleado - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
if (isset($_GET['id_empleado']) ) { 
$id_empleado = (int) $_GET['id_empleado']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `empleados` SET  `nombre_empleado` =  '{$_POST['nombre_empleado']}' ,  `cedula_empleado` =  '{$_POST['cedula_empleado']}' ,  `salario_empleado` =  '{$_POST['salario_empleado']}'   WHERE `id_empleado` = '$id_empleado' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Empleado editado.<br />" : "No se ha editado. <br />"; 
echo "<a href='veremp.php'>Volver al listado</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `empleados` WHERE `id_empleado` = '$id_empleado' ")); 
?>

<form action='' method='POST'> 
<p><b>Nombre Empleado:</b><br /><input type='text' name='nombre_empleado' value='<?php echo stripslashes($row['nombre_empleado']) ?>' /> 
<p><b>Cedula Empleado:</b><br /><input type='text' name='cedula_empleado' value='<?php echo stripslashes($row['cedula_empleado']) ?>' /> 
<p><b>Salario Empleado:</b><br /><input type='text' name='salario_empleado' value='<?php echo stripslashes($row['salario_empleado']) ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 
	echo "<a href='veremp.php'>Cancelar</a>";
?>
</body>
</html>
