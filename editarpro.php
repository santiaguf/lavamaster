<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>editar proveedor - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
if (isset($_GET['id_proveedor']) ) { 
$id_proveedor = (int) $_GET['id_proveedor']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `proveedores` SET  `nombre_empresa` =  '{$_POST['nombre_empresa']}' ,  `vendedor_encargado` =  '{$_POST['vendedor_encargado']}' ,  `pais` =  '{$_POST['pais']}' ,  `ciudad` =  '{$_POST['ciudad']}' ,  `departamento` =  '{$_POST['departamento']}' ,  `direccion` =  '{$_POST['direccion']}' ,  `telefono_fijo` =  '{$_POST['telefono_fijo']}' ,  `telefono_celular` =  '{$_POST['telefono_celular']}' ,  `correo_proveedor` =  '{$_POST['correo_proveedor']}' ,  `sitio_web` =  '{$_POST['sitio_web']}' ,  `leadtime` =  '{$_POST['leadtime']}'   WHERE `id_proveedor` = '$id_proveedor' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='verpro.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `proveedores` WHERE `id_proveedor` = '$id_proveedor' ")); 
?>

<form action='' method='POST'> 
<p><b>Nombre Empresa:</b><br /><input type='text' name='nombre_empresa' value='<?php echo stripslashes($row['nombre_empresa']) ?>' /> 
<p><b>Vendedor Encargado:</b><br /><input type='text' name='vendedor_encargado' value='<?php echo stripslashes($row['vendedor_encargado']) ?>' /> 
<p><b>Pais:</b><br /><input type='text' name='pais' value='<?php echo stripslashes($row['pais']) ?>' /> 
<p><b>Ciudad:</b><br /><input type='text' name='ciudad' value='<?php echo stripslashes($row['ciudad']) ?>' /> 
<p><b>Departamento:</b><br /><input type='text' name='departamento' value='<?php echo stripslashes($row['departamento']) ?>' /> 
<p><b>Direccion:</b><br /><textarea name='direccion'><?php echo stripslashes($row['direccion']) ?></textarea> 
<p><b>Telefono Fijo:</b><br /><input type='text' name='telefono_fijo' value='<?php echo stripslashes($row['telefono_fijo']) ?>' /> 
<p><b>Telefono Celular:</b><br /><input type='text' name='telefono_celular' value='<?php echo stripslashes($row['telefono_celular']) ?>' /> 
<p><b>Correo Proveedor:</b><br /><input type='text' name='correo_proveedor' value='<?php echo stripslashes($row['correo_proveedor']) ?>' /> 
<p><b>Sitio Web:</b><br /><input type='text' name='sitio_web' value='<?php echo stripslashes($row['sitio_web']) ?>' /> 
<p><b>Leadtime:</b><br /><textarea name='leadtime'><?php echo stripslashes($row['leadtime']) ?></textarea> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 
	echo "<a href='verpro.php'>Cancelar</a>";

?>
</body>
</html>
