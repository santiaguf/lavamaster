<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar empleado - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
$id_empleado = (int) $_GET['id_empleado']; 
mysql_query("DELETE FROM `empleados` WHERE `id_empleado` = '$id_empleado' ") ; 
echo (mysql_affected_rows()) ? "empleado eliminado.<br /> " : "no se elimin&oacute;.<br /> "; 
echo 'espera 4 segundos o haz clic <a href="veremp.php">aqui</a>';
echo '<meta http-equiv="Refresh" content="4;url=veremp.php"> ';
?> 
<a href='veremp.php'>volver Listado</a>
</body>
</html>
