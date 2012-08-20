<?php
include("conexion.php");
user_login();
    echo '<h1>Bienvenido al m&oacute;dulo de inventario, ' . $_SESSION['nick'] . '</h1>';
	//echo '<p id="el-primer-parrafo"><a href="agregarinv.php">A&ntilde;adir al inventario</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="verinv.php">Ver el inventario</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="agregarqui.php">A&ntilde;adir quimico</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="verqui.php">Ver quimicos</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="agregarpro.php">A&ntilde;adir Proveedor</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="verpro.php">Ver Proveedores</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="agregarficha.php">A&ntilde;adir ficha</a>';
	//echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="verficha.php">Ver ficha</a>';
	//echo '<p>';
	echo '<p id="el-primer-parrafo"><a href="perfil.php">Volver a mi perfil</a>';
	echo '<p>';
	//echo '<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=perfil.php">
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

</body>
</html>