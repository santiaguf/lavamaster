<?php 
include("conexion.php");
user_login();
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Borrar ficha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php 
//include('config.php')
$id_ficha = (int) $_GET['id_ficha']; 
mysql_query("DELETE FROM `fichas` WHERE `id_ficha` = '$id_ficha' ") ; 
echo (mysql_affected_rows()) ? "ficha eliminada.<br /> " : "No se ha eliminado.<br /> "; 

echo 'espera 4 segundos o haz clic <a href="verficha.php">aqui</a>';
echo '<meta http-equiv="Refresh" content="4;url=verficha.php"> ';

?> 
<a href='verficha.php'>Volver al listado</a>
</body>
</html>