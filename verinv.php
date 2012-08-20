<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
	echo "<table border=1 id='el-primer-parrafo'>"; 
	echo "<tr class='titulotabla'>"; 
	echo "<td><b>Id inventario</b></td>"; 
	echo "<td><b>N&uacute;mero</b></td>";
	echo "<td><b>Nombre del Quimico</b></td>";
	echo "<td><b>Cantidad</b></td>"; 
	echo "<td><b>Precio total</b></td>"; 
	echo "<td><b>Fecha </b></td>"; 
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
	$result = mysql_query("SELECT * FROM `inventario` LIMIT $num_pagina2 , 30") or trigger_error(mysql_error()); 
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	// variable para mostrar 
	$num_pagina2 = $num_pagina2 + 1;
	echo "<tr>";  
	echo "<td valign='top'>" . nl2br( $row['id_inventario']) . "</td>";  
	echo "<td valign='top'>" .  $num_pagina2 . "</td>";
	echo "<td valign='top'>" . nl2br( $row['nombre_del_quimico']) . "</td>";  
	//echo "<td valign='top'>" . nl2br( $row['cantidad']) . "</td>";  
	echo "<td valign='top'>" . number_format(nl2br( $row['cantidad']), 0, '.', '.') . "</td>"; 
	echo "<td valign='top'>" . number_format(nl2br( $row['precio_total']), 0, '.', '.') . "</td>";
	echo "<td valign='top'>" . nl2br( $row['fecha']) . "</td>";  
	echo "<td valign='top'><a href=editarinv.php?id_inventario={$row['id_inventario']}>Editar</a></td> "; 
	// <td><a href=borrarinv.php?id_inventario={$row['id_inventario']}>Borrar</a></td>
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
	 echo  "<a href='verinv.php?pagina=0'>P&aacute;gina 1</a> - ";
	echo "<a href='verinv.php?pagina=$pag_anterior'>Anterior</a> - ";
	 }
	}
	echo "<a href='verinv.php?pagina=$pag_siguiente'>Siguiente</a> </center><p>";
	//fin codigo para paginacion
 ?>
 <a href='agregarinv.php'>Agregar inventario</a> - <a href='seccioninv.php'>Volver a inventario</a>
</body>
</html>