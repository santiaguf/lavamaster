<?php
include("conexion.php");
user_login();
    echo '<h1>Secci&oacute;n quimicos, ' . $_SESSION['nick'] . '</h1>';
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

	<p id="el-primer-parrafo"><a href="agregarqui.php">A&ntilde;adir quimico</a>
	<p>
	<p id="el-primer-parrafo"><a href="verqui.php">Ver quimicos</a>
	<p>
	<p id="el-primer-parrafo"><a href="eliminarqui.php">Borrar quimico</a>
	<p>
	<p id="el-primer-parrafo"><a href="perfil.php">Volver a perfil</a>
	<p>
	<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>
	</p>

</body>
</html>