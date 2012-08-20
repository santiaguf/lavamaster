<?php
include("conexion.php");
user_login();
    echo '<h1>Secci&oacute;n inventario, ' . $_SESSION['nick'] . '</h1>';
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

	<p id="el-primer-parrafo"><a href="agregarinv.php">A&ntilde;adir al inventario</a>
	<p>
	<p id="el-primer-parrafo"><a href="verinv.php">Ver quimicos ingresados</a>
	<p>
	<p id="el-primer-parrafo"><a href="buscarinv.php">Buscar quimicos ingresados</a>
	<p>	
	<p id="el-primer-parrafo"><a href="eliminarinv.php">Borrar del inventario</a>
	<p>
	<p id="el-primer-parrafo"><a href="perfil.php">Volver a perfil</a>
	<p>
	<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>
	</p>

</body>
</html>