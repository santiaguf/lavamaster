<?php
include("conexion.php");
user_login();
    echo '<h1>Bienvenido, estos son tus datos</h1>';
    echo '<p id="el-primer-parrafo"><b>Nombre de Usuario:</b> ' . $_SESSION['nick'] . '<br />';
    echo '<b>Fecha de registro:</b> ' . date("d-m-Y - H:i", $_SESSION['fecha']) . '<br />';
    echo '<b>Email de registro:</b> ' . $_SESSION['mail'] . '<br />';
    //echo '<b>IP:</b> ' . $_SESSION['ip'] . '<br /></p>';
    
	echo '<h1>M&oacute;dulos</h1>';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Perfil - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<ul>
 <li class="titulos2">
  <a href="seccionqui.php">
      <img src="images/quimicos.png"  alt="quimicos">
      <span>Quimicos</span>
  </a>
</li>
<li class="titulos2">
  <a href="seccioninv.php">
      <img src="images/inventario.png"  alt="inventario">
      <span>Inventario</span>
  </a>
</li>
<li class="titulos2">
  <a href="seccionpro.php">
      <img src="images/proveedores.png" alt="proveedores">
      <span>Proveedores</span>
  </a>
</li>
<li class="titulos2">
  <a href="seccionficha.php">
      <img src="images/fichas.png"  alt="fichas">
      <span>Fichas</span>
  </a>
</li>
<li class="titulos2">
  <a href="nomina.php">
      <img src="images/nomina.png" alt="nomina">
      <span>N&oacute;mina</span>
  </a>
</li>
<li class="titulos2">
  <a href="seccionemp.php">
      <img src="images/empleados.png"  alt="empleados">
      <span>Empleados</span>
  </a>
</li>
<li class="titulos2">
  <a href="login.php?modo=desconectar">
      <img src="images/salir.png"  alt="salir">
      <span>Finalizar</span>
  </a>
</li>
</ul>
<!--imagenes tomadas de: http://www.iconfinder.com/free_icons/?ultimate -->
</body>
</html>
