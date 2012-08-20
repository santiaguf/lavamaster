<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>editar qu&iacute;mico - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
if (isset($_GET['id_quimico']) ) { 
$id_quimico = (int) $_GET['id_quimico']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `quimicos` SET  `nombre_quimico` =  '{$_POST['nombre_quimico']}' ,  `proveedor_quimico` =  '{$_POST['proveedor_quimico']}' ,  `cantidad_quimico` =  '{$_POST['cantidad_quimico']}' ,  `stock_minimo` =  '{$_POST['stock_minimo']}' ,  `nombre_tecnico` =  '{$_POST['nombre_tecnico']}' ,  `rotacion_compras` =  '{$_POST['rotacion_compras']}' ,  `rotacion_produccion` =  '{$_POST['rotacion_produccion']}' ,  `empaque` =  '{$_POST['empaque']}' ,  `descripcion_quimico` =  '{$_POST['descripcion_quimico']}' ,  `tipo_quimico` =  '{$_POST['tipo_quimico']}' ,  `peligrosidad` =  '{$_POST['peligrosidad']}' ,  `consideracion_quimico` =  '{$_POST['consideracion_quimico']}' ,  `color` =  '{$_POST['color']}'   WHERE `id_quimico` = '$id_quimico' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Editado satisfactoriamente.<br />" : "No se ha editado. <br />"; 
echo "<a href='verqui.php'>listar</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `quimicos` WHERE `id_quimico` = '$id_quimico' ")); 
?>

<form action='' method='POST'> 
<p><b>Nombre Quimico:</b><br /><input type='text' name='nombre_quimico' value='<?php echo stripslashes($row['nombre_quimico']) ?>' /> 
<p><b>Proveedor Quimico:</b><br /><input type='text' name='proveedor_quimico' value='<?php echo stripslashes($row['proveedor_quimico']) ?>' /> 
<p><b>Cantidad Quimico:</b><br /><input type='text' name='cantidad_quimico' value='<?php echo stripslashes($row['cantidad_quimico']) ?>' /> 

<!-- aqui empieza la magia (prueba) -->
<p><b>Stock m&iacute;nimo:</b><br /><input type='text' name='stock_minimo' value='<?php echo stripslashes($row['stock_minimo']) ?>'/>
<p><b>nombre T&eacute;cnico:</b><br /><input type='text' name='nombre_tecnico' value='<?php echo stripslashes($row['nombre_tecnico']) ?>'/>

	<p><b>Rotaci&oacute;n en compra</b><br />
	<select name="rotacion_compras">
		<option value="bajo">Bajo</option>
		<option value="medio">Medio</option>
		<option value="alto">Alto</option>
	</select> 

	<p><b>Rotaci&oacute;n en produccion:</b><br />
	<select name="rotacion_produccion">
		<option value="bajo">Bajo</option>
		<option value="medio">Medio</option>
		<option value="alto">Alto</option>
	</select>

	<p><b>Empaque:</b><br />
	<select name="empaque">
		<option value="carton">cart&oacute;n</option>
		<option value="envase">envase</option>
		<option value="otro">Otro</option>
	</select>

<p><b>Descripci&oacute;n:</b><br /><input type='text' size='50' name='descripcion_quimico' value='<?php echo stripslashes($row['descripcion_quimico']) ?>'/>

	<p><b>Tipo:</b><br />
	<select name="tipo_quimico">
		<option value="solido">solido</option>
		<option value="liquido">liquido</option>
	</select>	

	<p><b>Peligrosidad:</b><br />
	<select name="peligrosidad">
		<option value="baja">Baja</option>
		<option value="media">media</option>
		<option value="alta">Alta</option>
	</select>

	<p><b>Consideraci&oacute;n:</b><br />
	<select name="consideracion_quimico">
		<option value="noesnocivo">No es Nocivo</option>
		<option value="poconocivo">Poco Nocivo</option>
		<option value="nocivo">Nocivo</option>
		<option value="peligroso">Peligroso</option>
	</select>

	<p><b>Color:</b><br /><input type='text' name='color' value='<?php echo stripslashes($row['color']) ?>' /> 

<!-- aqui termina la magia -->

<p><input type='submit' value='Editar quimico' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 
	echo "<a href='verqui.php'>Cancelar</a>";

?>
</body>
</html>