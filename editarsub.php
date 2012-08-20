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
if (isset($_GET['id_subproceso']) ) { 
$id_subproceso = (int) $_GET['id_subproceso']; 
if (isset($_POST['submitted'])) { 

	//consulta para convertir id_quimico (es decir, select1) en el nombre del quimico y enviarlo a la base de datos
	$result = mysql_query("SELECT * FROM `quimicos` WHERE `id_quimico` = '{$_POST['quimico_usado']}' ") or trigger_error(mysql_error()); 
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	// variable para mostrar 
	$nombre_quimico_usado = $row['nombre_quimico'];
	} 

foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `subprocesos` SET  `nombre_subproceso` =  '{$_POST['nombre_subproceso']}' ,  `quimico_usado` =  '{$_POST['quimico_usado']}' ,  `nombre_quimico_usado` =  '$nombre_quimico_usado' , `cantidad_usada` =  '{$_POST['cantidad_usada']}' ,  `numero_ficha` =  '{$_POST['numero_ficha']}'   WHERE `id_subproceso` = '$id_subproceso' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Proceso editado.<br />" : "no se pudo editar. <br />"; 
echo "<a href='versub.php'>Back To Listado</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `subprocesos` WHERE `id_subproceso` = '$id_subproceso' ")); 
?>

<form action='' method='POST'> 
	<p><b>Nombre Subproceso:</b><br />
	<select name="nombre_subproceso">
		<option value="caustificado">Caustificado</option>
		<option value="desengome">Desengome</option>
		<option value="stone">Stone</option>
		<option value="bleach">Bleach</option>
		<option value="neutralizado">Neutralizado</option>
		<option value="blanqueo">Blanqueo</option>
		<option value="tenido">tenido</option>
		<option value="fijado">Fijado</option>
		<option value="suavizado">Suavizado</option>
	</select>
	<?php
		// Consultar la base de datos
		$consulta_mysql='select * from quimicos ORDER BY `quimicos`.`nombre_quimico` ASC';
		$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
		//menu desplegable con lista de quimicos
		echo "<p><b>quimico usado:</b><br /> <select name='quimico_usado'>";
		while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		// se invirtieron las comillas dobles por simples para que funcione en windows server
		echo '<option value="'.$fila['id_quimico'].'">'.$fila['nombre_quimico'].'</option>';
		}
		echo "</select>";
	?> 
	<p><b>Cantidad Usada:</b><br /><input type='text' name='cantidad_usada' value='<?php echo stripslashes($row['cantidad_usada']) ?>' /> 
	<p><b>Numero Ficha:</b><br /><input type='text' name='numero_ficha' value='<?php echo stripslashes($row['numero_ficha']) ?>' /> 
<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } 
    echo "<a href='versub.php'>Cancelar</a> - ";
	echo "<a href='inventario.php'>Volver al inventario</a>";
?> 
</body>
</html>