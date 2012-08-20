<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar qu&iacute;mico - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
// include('config.php'); 
$id_quimico = (int) $_GET['id_quimico']; 
mysql_query("DELETE FROM `quimicos` WHERE `id_quimico` = '$id_quimico' ") ; 
echo (mysql_affected_rows()) ? "quimico eliminado.<br /> " : "no se elimin&oacute;.<br /> "; 

echo 'espera 4 segundos o haz clic <a href="verqui.php">aqui</a>';
echo '<meta http-equiv="Refresh" content="4;url=verqui.php"> ';

?> 

<a href='verqui.php'>volver Listado</a>
</body>
</html>