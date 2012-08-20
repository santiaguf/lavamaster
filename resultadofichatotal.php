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
<b>resultado:</b>
<?php
$total2 = $_POST['total']; //es el numero de quimicos a agregar
$tandas2 = $_POST['tandas1'];  // numero de tandas por quimico

for ($i = 1; $i <= $total2; $i++) {

$cantidad_usada = "cantidad_usada$i";
$nombre_subproceso = "nombre_subproceso$i";
$quimico_usado = "quimico_usado$i";

	//variables nuevas
	$totaltanda = $_POST[$cantidad_usada] * $tandas2;
	
	//querie para obtener valor nuevo
	$result2 = mysql_query("SELECT * FROM `quimicos` WHERE id_quimico=$_POST[$quimico_usado]; ") or trigger_error(mysql_error()); 
	$row = mysql_fetch_array($result2); 
	$valor_actual_quimico = $row['cantidad_quimico'];
	$resta = $valor_actual_quimico - $totaltanda;
	$nombre_del_quimico = $row['nombre_quimico'];
	$el_stock_minimo = $row['stock_minimo'];
	
	//querie para restar cantidad de quimico de la bd
    $restasql = "UPDATE `quimicos` SET  `cantidad_quimico` =  cantidad_quimico - $totaltanda WHERE `id_quimico` = $_POST[$quimico_usado] "; 
	mysql_query($restasql) or die(mysql_error()); 
	echo (mysql_affected_rows()) ? "restado del stock correctamente<br />" : "No se ha resto del stock. <br />";  

	//inicio de mostrar info en una tabla
	echo "<table border=1 id='el-primer-parrafo' >"; 
	echo "<tr class='titulotabla'>"; 
	echo "<td><b>Nombre del proceso</b></td>"; 
	echo "<td><b>Quimico usado</b></td>";
	echo "<td><b>Cantidad Usada</b></td>"; 
	echo "<td><b>nro de tandas</b></td>"; 
	echo "<td><b>Total tanda</b></td>";
	echo "<td><b>Cantidad Anterior</b></td>";
	echo "<td><b>Cantidad Actual</b></td>";	
	echo "</tr>";  
	echo "<tr>";  
	echo "<td valign='top'>" . $_POST[$nombre_subproceso] . "</td>";  
	echo "<td valign='top'>" . $nombre_del_quimico . "</td>";
	echo "<td valign='top'>" . $_POST[$cantidad_usada] . "</td>";  
	echo "<td valign='top'>" . $tandas2 . "</td>";  
	echo "<td valign='top'>" . $totaltanda . "</td>";
	echo "<td valign='top'>" . $valor_actual_quimico . "</td>"; 
	echo "<td valign='top'>" . $resta . "</td>"; 	 
	echo "</tr>"; 
	echo "</table>"; 

	if ($resta < $el_stock_minimo) {
		echo "<p class='alerta'>Cuidado, este quimico esta por debajo del stock m&iacute;nimo";
	}
	//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
	$sql = "INSERT INTO `subprocesos` ( `nombre_subproceso` ,  `quimico_usado` ,  `nombre_quimico_usado` ,  `cantidad_usada` ,  `numero_ficha`  ) VALUES(  '{$_POST[$nombre_subproceso]}' ,  '{$_POST[$quimico_usado]}' ,  '$nombre_del_quimico' ,  '{$_POST[$cantidad_usada]}' ,  '{$_POST['numero_ficha']}'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	//echo "OK.<br />"; 
	//echo $el_stock_minimo;
	echo "<p>";
	
	}
	echo 'Quimicos agregados correctamente, haz clic <a href="verficha.php">aqui</a> para continuar';
	//echo '<meta http-equiv="Refresh" content="4;url=verficha.php"> ';
?>
</body>
</html>