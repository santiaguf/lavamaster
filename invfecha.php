<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar quimicos por fecha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
	if (isset($_GET['fecha']) ) { 
	$fecha2 = $_GET['fecha'];  
    $num_pagina2 = 0;

echo "<table border=1 id='el-primer-parrafo'>"; 
	echo "<tr class='titulotabla'>"; 
	echo "<td><b>Id inventario</b></td>"; 
	echo "<td><b>N&uacute;mero</b></td>";
	echo "<td><b>Nombre del Quimico</b></td>";
	echo "<td><b>Cantidad</b></td>"; 
	echo "<td><b>Precio total</b></td>"; 
	echo "<td><b>Fecha </b></td>"; 
	echo "</tr>"; 
$result = mysql_query("SELECT * FROM `inventario` WHERE `fecha` = '$fecha2' ") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	$num_pagina2 = $num_pagina2 + 1;
	echo "<tr>";  
	echo "<td valign='top'>" . nl2br( $row['id_inventario']) . "</td>";  
	echo "<td valign='top'>" .  $num_pagina2 . "</td>";
	echo "<td valign='top'>" . nl2br( $row['nombre_del_quimico']) . "</td>";    
	echo "<td valign='top'>" . number_format(nl2br( $row['cantidad']), 0, '.', '.') . "</td>"; 
	echo "<td valign='top'>" . number_format(nl2br( $row['precio_total']), 0, '.', '.') . "</td>";
	echo "<td valign='top'>" . nl2br( $row['fecha']) . "</td>";  
	echo "<td valign='top'><a href=editarinv.php?id_inventario={$row['id_inventario']}>Editar</a></td> "; 
	echo "</tr>"; 
	} 
}
echo "</table>"; 

	echo  "<a href='agregarinv.php'>Agregar al inventario</a> - ";
	echo "<a href='seccioninv.php'>Volver a inventario</a>";
?>
</body>
</html>