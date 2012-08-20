<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>editar inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
if (isset($_GET['id_inventario']) ) { 
$id_inventario = (int) $_GET['id_inventario']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `inventario` SET  `id_quimico` =  '{$_POST['select1']}' ,  `cantidad` =  '{$_POST['cantidad']}' ,  `precio_total` =  '{$_POST['precio_total']}'   WHERE `id_inventario` = '$id_inventario' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Editado satisfactoriamente.<br />" : "No se edito. <br />"; 
echo "<a href='verinv.php'>listar</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `inventario` WHERE `id_inventario` = '$id_inventario' ")); 
?>

<form action='' method='POST'> 

	<?php
	// Consultar la base de datos
	$consulta_mysql='select * from quimicos';
	$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
 	//menu desplegable con lista de quimicos
	echo "<p><b>quimico:</b><br /> <select name='select1'>";
	while($fila=mysql_fetch_array($resultado_consulta_mysql)){
    echo "<option value='".$fila['id_quimico']."'>".$fila['nombre_quimico']."</option>";
	}
	echo "</select>";
	?>
<!-- Cabe añadir que se edito el valor value='' />, agregando un echo y quitando el = , esto aplica para editar  -->
<!-- esto solo afecta servidores que no sean unix, osea windows generalmente  -->
<p><b>cantidad:</b><br /><input type='text' name='cantidad' value='<?php echo stripslashes($row['cantidad']) ?>' /> 
<p><b>Precio:</b><br /><input type='text' name='precio_total' value='<?php echo stripslashes($row['precio_total']) ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 
	echo "<a href='verinv.php'>Cancelar</a>";

?>
</body>
</html>