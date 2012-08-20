<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar inventario quimico - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
// include('config.php'); 
$id_inventario = (int) $_GET['id_inventario']; 
mysql_query("DELETE FROM `inventario` WHERE `id_inventario` = '$id_inventario' ") ; 
echo (mysql_affected_rows()) ? "quimico eliminado.<br /> " : "no se elimin&oacute;.<br /> "; 
echo 'espera 4 segundos o haz clic <a href="verinv.php">aqui</a>';
echo '<meta http-equiv="Refresh" content="4;url=verinv.php"> ';
?> 
</body>
</html>