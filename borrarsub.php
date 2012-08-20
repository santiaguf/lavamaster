<?php 
include("conexion.php");
user_login();
?>

<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Borrar proceso de ficha - Lavamaster v1.0</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="estilos.css" />
	</head>
	<body>
	<?php 
	$id_subproceso = (int) $_GET['id_subproceso']; 
	mysql_query("DELETE FROM `subprocesos` WHERE `id_subproceso` = '$id_subproceso' ") ; 
	echo (mysql_affected_rows()) ? "proceso borrado.<br /> " : "No se pudo borrar.<br /> "; 
		echo 'espera 4 segundos o haz clic <a href="versub.php">aqui</a>';
		echo '<meta http-equiv="Refresh" content="4;url=versub.php"> ';
	?> 
	</body>
</html>