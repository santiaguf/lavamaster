<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar proveedor - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
//include('config.php'); 
$id_proveedor = (int) $_GET['id_proveedor']; 
mysql_query("DELETE FROM `proveedores` WHERE `id_proveedor` = '$id_proveedor' ") ; 
echo (mysql_affected_rows()) ? "proveedor eliminado.<br /> " : "no se elimin&oacute;.<br /> "; 

echo 'espera 4 segundos o haz clic <a href="verpro.php">aqui</a>';
echo '<meta http-equiv="Refresh" content="4;url=verpro.php"> ';

?> 
<a href='verpro.php'>Volver al listado</a>
</body>
</html>