<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar pago - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
$id_pago = (int) $_GET['id_pago']; 
mysql_query("DELETE FROM `pagos` WHERE `id_pago` = '$id_pago' ") ; 
echo (mysql_affected_rows()) ? "pago eliminado.<br /> " : "Nothing deleted.<br /> "; 

echo 'espera 4 segundos o haz clic <a href="verpagos.php">aqui</a>';
echo '<meta http-equiv="Refresh" content="4;url=verpagos.php"> ';

?> 

<a href='verpagos.php'>volver al listado</a>
</body>
</html>