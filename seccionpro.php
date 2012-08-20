<?php
include("conexion.php");
user_login();
    echo '<h1>Secci&oacute;n Proveedores, ' . $_SESSION['nick'] . '</h1>';
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

	<p id="el-primer-parrafo"><a href="agregarpro.php">A&ntilde;adir proveedor</a>
	<p>
	<p id="el-primer-parrafo"><a href="verpro.php">Ver proveedores</a>
	<p>
	<p id="el-primer-parrafo"><a href="eliminarpro.php">Borrar proveedor</a>
	<p>
	<p id="el-primer-parrafo"><a href="perfil.php">Volver a perfil</a>
	<p>
	<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>
	</p>

</body>
</html>