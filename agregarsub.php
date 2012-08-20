<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar proceso a ficha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<?php 
// include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `subprocesos` ( `nombre_subproceso` ,  `quimico_usado` ,  `cantidad_usada` ,  `numero_ficha`  ) VALUES(  '{$_POST['nombre_subproceso']}' ,  '{$_POST['quimico_usado']}' ,  '{$_POST['cantidad_usada']}' ,  '{$_POST['numero_ficha']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "proceso agregado correctamente.<br />"; 
echo "<a href='versub.php'>Volver al listado</a>"; 
} 
?>
<form action='' class='agregar' method='POST'> 

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
		$consulta_mysql='select * from quimicos';
		$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
		//menu desplegable con lista de quimicos
		echo "<p><b>quimico usado:</b><br /> <select name='quimico_usado'>";
		while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		// se invirtieron las comillas dobles por simples para que funcione en windows server
		echo '<option value="'.$fila['id_quimico'].'">'.$fila['nombre_quimico'].'</option>';
		}
		echo "</select>";
	?> 
	<p><b>Cantidad Usada:</b><br /><input type='text' name='cantidad_usada'/> 
	<p><b>Numero Ficha:</b><br /><input type='text' name='numero_ficha'/> 
<p><input type='submit' value='Agregar' /><input type='hidden' value='1' name='submitted' /> 
</form> 

<a href='versub.php'>Volver al listado</a> - 
<a href='inventario.php'>Volver a inventario</a>

</body>
</html>