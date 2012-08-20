<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar Proveedores - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
echo "<table border=1 id='el-primer-parrafo' >"; 
echo "<tr class='titulotabla'>"; 
echo "<td><b>Id Proveedor</b></td>"; 
echo "<td><b>Nombre Empresa</b></td>"; 
echo "<td><b>Vendedor Encargado</b></td>"; 
echo "<td><b>Pa&iacute;s</b></td>"; 
echo "<td><b>Ciudad</b></td>"; 
echo "<td><b>Departamento</b></td>"; 
echo "<td><b>Direcci&oacute;n</b></td>"; 
echo "<td><b>Tel&eacute;fono Fijo</b></td>"; 
echo "<td><b>Tel&eacute;fono Celular</b></td>"; 
echo "<td><b>Correo Proveedor</b></td>"; 
echo "<td><b>Sitio Web</b></td>"; 
echo "<td><b>Leadtime</b></td>"; 
echo "</tr>"; 
//codigo para paginacion (no tildes) 
    if (isset($_GET['pagina']) ) { 
	$num_pagina = (int) $_GET['pagina']; 
	$num_pagina2 = $num_pagina * 30;
	} 
	else {
	$num_pagina = 0;
	$num_pagina2 = 0;
	}
	// fin de codigo de paginacion (no tildes)
$result = mysql_query("SELECT * FROM `proveedores` LIMIT $num_pagina2 , 30") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id_proveedor']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_empresa']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['vendedor_encargado']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['pais']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['ciudad']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['departamento']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['direccion']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['telefono_fijo']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['telefono_celular']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['correo_proveedor']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['sitio_web']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['leadtime']) . "</td>";  
echo "<td valign='top'><a href=editarpro.php?id_proveedor={$row['id_proveedor']}>Editar</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
//codigo para paginacion
	$pag_anterior = $num_pagina - 1;
	$pag_siguiente = $num_pagina + 1;

	echo "<center>";
	if (isset($_GET['pagina']) ) {
	if ($_GET['pagina'] == 0 ) { 
    $pag_anterior = 0;
	}
	else {
	 echo  "<a href='verpro.php?pagina=0'>P&aacute;gina 1</a> - ";
	echo "<a href='verpro.php?pagina=$pag_anterior'>Anterior</a> - ";
	 }
	}
	echo "<a href='verpro.php?pagina=$pag_siguiente'>Siguiente</a> </center><p>";
	//fin codigo para paginacion

	echo  "<a href='agregarpro.php'>Agregar proveedor</a> - ";
	echo "<a href='inventario.php'>Volver a inventario</a>";
?>
</body>
</html>