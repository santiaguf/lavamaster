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
$numero_ficha = $_POST['numero_ficha'];
$total = $_POST['cantidad_quimicos'];
$tandas1= $_POST['tandas'];

foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `fichas` ( `numero_ficha` ,  `fecha` ,  `cliente` ,  `referencia` ,  `nombre_proceso` ,  `tipo_prenda` ,  `cantidad_total` ,  `cantidad_por_tanda` ,  `peso_prenda` ,  `peso_total` ,  `cantidad_quimicos` ,  `tandas`  ) VALUES(  '{$_POST['numero_ficha']}' ,  '{$_POST['fecha']}' ,  '{$_POST['cliente']}' ,  '{$_POST['referencia']}' ,  '{$_POST['nombre_proceso']}' ,  '{$_POST['tipo_prenda']}' ,  '{$_POST['cantidad_total']}' ,  '{$_POST['cantidad_por_tanda']}' ,  '{$_POST['peso_prenda']}' ,  '{$_POST['peso_total']}' ,  '{$_POST['cantidad_quimicos']}' ,  '{$_POST['tandas']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "ficha agregada.<br />"; 

for ($i = 1; $i <= $total; $i++) {

//declaracion de variables para ciclo for
$cantidad_usada = "cantidad_usada$i";
$nombre_subproceso = "nombre_subproceso$i";
$quimico_usado = "quimico_usado$i";

	echo "<form action='resultadofichatotal.php' class='agregar' method='POST'>"; 
	echo " ---------------------------------";
	echo "<p><b>Nombre Subproceso:</b><br />";
	echo "<select name='$nombre_subproceso'>";
	echo "<option value='caustificado'>Caustificado</option>";
	echo "<option value='desengome'>Desengome</option>";
	echo "<option value='stone'>Stone</option>";
	echo "<option value='bleach'>Bleach</option>";
	echo "<option value='neutralizado'>Neutralizado</option>";
	echo "<option value='blanqueo'>Blanqueo</option>";
	echo "<option value='tenido'>tenido</option>";
	echo "<option value='fijado'>Fijado</option>";
	echo "<option value='suavizado'>Suavizado</option>";
	echo "</select>";

		// Consultar la base de datos
		$consulta_mysql='select * from quimicos ORDER BY `quimicos`.`nombre_quimico` ASC ';
		$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
		//menu desplegable con lista de quimicos
		echo "<p><b>quimico usado:</b><br /> <select name='$quimico_usado'>";
		while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		// se invirtieron las comillas dobles por simples para que funcione en windows server
		echo '<option value="'.$fila['id_quimico'].'">'.$fila['nombre_quimico'].'</option>';
		}
		echo "</select><p>";	

		echo "<p><b>Cantidad Usada:</b><br /><input type='text' name='$cantidad_usada'/>"; 
		echo "<p><b>Numero Ficha:</b> ". $numero_ficha ." <br /><input type='hidden' name='numero_ficha' value='$numero_ficha'/>"; 
	}	
		echo "<input type='hidden' name='total' value='$total'/>"; 
		echo "<input type='hidden' name='tandas1' value='$tandas1'/>";
		echo "<p><input type='submit' value='Agregar' /><input type='hidden' value='1' name='submitted' />"; 
		echo "</form>"; 
	?>
<center><a href='versub.php'>Volver al listado</a> - 
<a href='inventario.php'>Volver a inventario</a></center>

</body>
</html>