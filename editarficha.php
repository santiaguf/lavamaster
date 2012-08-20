<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>editar ficha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
if (isset($_GET['id_ficha']) ) { 
$id_ficha = (int) $_GET['id_ficha']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `fichas` SET  `numero_ficha` =  '{$_POST['numero_ficha']}' ,  `fecha` =  '{$_POST['fecha']}' ,  `cliente` =  '{$_POST['cliente']}' ,  `referencia` =  '{$_POST['referencia']}' ,  `nombre_proceso` =  '{$_POST['nombre_proceso']}' ,  `tipo_prenda` =  '{$_POST['tipo_prenda']}' ,  `cantidad_total` =  '{$_POST['cantidad_total']}' ,  `cantidad_por_tanda` =  '{$_POST['cantidad_por_tanda']}' ,  `peso_prenda` =  '{$_POST['peso_prenda']}' ,  `peso_total` =  '{$_POST['peso_total']}' ,  `cantidad_quimicos` =  '{$_POST['cantidad_quimicos']}' ,  `tandas` =  '{$_POST['tandas']}'   WHERE `id_ficha` = '$id_ficha' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "ficha editada.<br />" : "No se edito. <br />"; 
echo "<a href='verficha.php'>volver al listado</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `fichas` WHERE `id_ficha` = '$id_ficha' ")); 
?>

<form action='' method='POST'> 
<p><b>Numero Ficha:</b><br /><input type='text' name='numero_ficha' value="<?php echo stripslashes($row['numero_ficha']) ?>" /> 
<p><b>Fecha:</b><br /><input type='text' name='fecha' value='<?php echo stripslashes($row['fecha']) ?>' /> 
<p><b>Cliente:</b><br /><input type='text' name='cliente' value='<?php echo stripslashes($row['cliente']) ?>' /> 
<p><b>Referencia:</b><br /><input type='text' name='referencia' value='<?php echo stripslashes($row['referencia']) ?>' /> 
<p><b>Nombre Proceso:</b><br /><input type='text' name='nombre_proceso' value='<?php echo stripslashes($row['nombre_proceso']) ?>' /> 
<p><b>Tipo Prenda:</b><br /><input type='text' name='tipo_prenda' value='<?php echo stripslashes($row['tipo_prenda']) ?>' /> 
<p><b>Cantidad Total:</b><br /><input type='text' name='cantidad_total' value='<?php echo stripslashes($row['cantidad_total']) ?>' /> 
<p><b>Cantidad Por Tanda:</b><br /><input type='text' name='cantidad_por_tanda' value='<?php echo stripslashes($row['cantidad_por_tanda']) ?>' /> 
<p><b>Peso Prenda:</b><br /><input type='text' name='peso_prenda' value='<?php echo stripslashes($row['peso_prenda']) ?>' /> 
<p><b>Peso Total:</b><br /><input type='text' name='peso_total' value='<?php echo stripslashes($row['peso_total']) ?>' /> 
<p><b>Cantidad Quimicos:</b><br /><input type='text' name='cantidad_quimicos' value='<?php echo stripslashes($row['cantidad_quimicos']) ?>' /> 
<p><b>Tandas:</b><br /><input type='text' name='tandas' value='<?php echo stripslashes($row['tandas']) ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form>
<?php } 
	echo "<a href='verficha.php'>Cancelar</a>";

?>
</body>
</html>
