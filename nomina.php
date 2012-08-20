<?php
include("conexion.php");
user_login();
    echo '<h1>Secci&oacute;n pagos, ' . $_SESSION['nick'] . '</h1>';
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

	<p id="el-primer-parrafo"><a href="pago.php">A&ntilde;adir pago</a>
	<p>
	<p id="el-primer-parrafo"><a href="verpagos.php">Ver pagos</a>
	<p>	
	<p id="el-primer-parrafo"><a href="buscarpago.php">Buscar pagos</a>
	<p>
	<p id="el-primer-parrafo"><a href="eliminarpagos.php">Borrar pago</a>
	<p>
	<p id="el-primer-parrafo"><a href="perfil.php">Volver a perfil</a>
	<p>
	<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>
	</p>

</body>
</html>