<?php
include("conexion.php");
user_login();
    echo '<h1>Secci&oacute;n empleados, ' . $_SESSION['nick'] . '</h1>';
	
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>empleados - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

	<p id="el-primer-parrafo"><a href="agregaremp.php">A&ntilde;adir empleado</a>
	<p>
	<p id="el-primer-parrafo"><a href="veremp.php">Ver empleados</a>
	<p>
	<p id="el-primer-parrafo"><a href="eliminaremp.php">Borrar empleado</a>
	<p>
	<p id="el-primer-parrafo"><a href="perfil.php">Volver a perfil</a>
	<p>
	<p id="el-primer-parrafo"><a href="login.php?modo=desconectar">Salir</a>
	</p>

</body>
</html>