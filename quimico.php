<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>ver informaci&oacute;n del quimico - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
if (isset($_GET['id_quimico']) ) { 
$id_quimico = (int) $_GET['id_quimico']; 
//if (isset($_POST['submitted'])) { 
//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
//$sql = "UPDATE `quimicos` SET  `nombre_quimico` =  '{$_POST['nombre_quimico']}' ,  `proveedor_quimico` =  '{$_POST['proveedor_quimico']}' ,  `cantidad_quimico` =  '{$_POST['cantidad_quimico']}' ,  `stock_minimo` =  '{$_POST['stock_minimo']}' ,  `nombre_tecnico` =  '{$_POST['nombre_tecnico']}' ,  `rotacion_compras` =  '{$_POST['rotacion_compras']}' ,  `rotacion_produccion` =  '{$_POST['rotacion_produccion']}' ,  `empaque` =  '{$_POST['empaque']}' ,  `descripcion_quimico` =  '{$_POST['descripcion_quimico']}' ,  `tipo_quimico` =  '{$_POST['tipo_quimico']}' ,  `peligrosidad` =  '{$_POST['peligrosidad']}' ,  `consideracion_quimico` =  '{$_POST['consideracion_quimico']}' ,  `color` =  '{$_POST['color']}'   WHERE `id_quimico` = '$id_quimico' "; 
//mysql_query($sql) or die(mysql_error()); 
//echo (mysql_affected_rows()) ? "Editado satisfactoriamente.<br />" : "No se ha editado. <br />"; 
//echo "<a href='verqui.php'>listar</a>"; 
//} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `quimicos` WHERE `id_quimico` = '$id_quimico' ")); 
?>


	<p id="el-primer-parrafo"><b>Nombre Quimico: </b><?php echo stripslashes($row['nombre_quimico']) ?> 
	<br><b>Proveedor Quimico: </b><?php echo stripslashes($row['proveedor_quimico']) ?> 
	<br><b>Cantidad Quimico: </b><?php echo stripslashes($row['cantidad_quimico']) ?> 
	<br><b>Stock m&iacute;nimo: </b><?php echo stripslashes($row['stock_minimo']) ?>
	<br><b>nombre T&eacute;cnico: </b><?php echo stripslashes($row['nombre_tecnico']) ?>
	<br><b>Rotaci&oacute;n en compra: </b><?php echo stripslashes($row['rotacion_compras']) ?>
	<br><b>Rotaci&oacute;n en produccion: </b><?php echo stripslashes($row['rotacion_produccion']) ?>
	<br><b>Empaque: </b><?php echo stripslashes($row['empaque']) ?>
	<br><b>Descripci&oacute;n: </b><?php echo stripslashes($row['descripcion_quimico']) ?>
	<br><b>Tipo: </b><?php echo stripslashes($row['tipo_quimico']) ?>
	<br><b>Peligrosidad: </b><?php echo stripslashes($row['peligrosidad']) ?>
	<br><b>Consideraci&oacute;n: </b><?php echo stripslashes($row['consideracion_quimico']) ?>
	<br><b>Color: </b><?php echo stripslashes($row['color']) ?>
	</p>
<center><a href='verqui.php'>Volver al listado</a> - 
<a href='inventario.php'>Volver a inventario</a></center>
<p> 
<?php } 
?>
</body>
</html>