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
$total2 = $_POST['total'];
$tandas2 = $_POST['tandas1'];
for ($i = 1; $i <= $total2; $i++) {

$cantidad_usada = "cantidad_usada$i";
$nombre_subproceso = "nombre_subproceso$i";
$quimico_usado = "quimico_usado$i";

	//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
	$sql = "INSERT INTO `subprocesos` ( `nombre_subproceso` ,  `quimico_usado` ,  `cantidad_usada` ,  `numero_ficha`  ) VALUES(  '{$_POST[$nombre_subproceso]}' ,  '{$_POST[$quimico_usado]}' ,  '{$_POST[$cantidad_usada]}' ,  '{$_POST['numero_ficha']}'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	echo "OK.<br />"; 
	}
	echo 'Quimicos agregados correctamente, espera 3 segundos o haz clic <a href="verficha.php">aqui</a>';
	echo '<meta http-equiv="Refresh" content="3;url=verficha.php"> ';
?>
</body>
</html>