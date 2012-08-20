<?php
include("conexion.php");
user_login();
    echo '<h1>Secci&oacute;n fichas, ' . $_SESSION['nick'] . '</h1>';
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

	<p id="el-primer-parrafo"><a href="agregarficha.php">A&ntilde;adir ficha</a>
	<p>
	<p id="el-primer-parrafo"><a href="verficha.php">Ver fichas</a>
	<p>
	<p id="el-primer-parrafo"><a href="buscarficha.php">Buscar ficha</a>
	<p>	
	<p id="el-primer-parrafo"><a href="eliminarficha.php">Borrar ficha</a>
	<p>
	<p id="el-primer-parrafo"><a href="perfil.php">Volver a perfil</a>
	<p>
	<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>
	</p>

</body>
</html>