<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar qu&iacute;micos - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
	echo "<table border=1 id='el-primer-parrafo' >"; 
	echo "<tr class='titulotabla'>"; 
	echo "<td><b>Id Quimico</b></td>"; 
	echo "<td><b>N&uacute;mero</b></td>";
	echo "<td><b>Nombre Quimico</b></td>"; 
	echo "<td><b>Proveedor Quimico</b></td>"; 
	echo "<td><b>Cantidad Actual</b></td>";
	echo "<td><b>Stock M&iacute;nimo</b></td>"; 
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
	$result = mysql_query("SELECT * FROM `quimicos` ORDER BY `quimicos`.`nombre_quimico` ASC LIMIT $num_pagina2 , 30") or trigger_error(mysql_error()); 
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	// variable para mostrar 
	$num_pagina2 = $num_pagina2 + 1;
	echo "<tr>";  
	echo "<td valign='top'>" . nl2br( $row['id_quimico']) . "</td>";  
	echo "<td valign='top'>" .  $num_pagina2 . "</td>";
	echo "<td valign='top'><a href=quimico.php?id_quimico={$row['id_quimico']}>". nl2br( $row['nombre_quimico']) ."</a></td>";  
	echo "<td valign='top'>" . nl2br( $row['proveedor_quimico']) . "</td>";  
	//echo "<td valign='top'>" . nl2br( $row['cantidad_quimico']) . "</td>";
	echo "<td valign='top'>" . number_format(nl2br( $row['cantidad_quimico']), 0, '.', '.') . "</td>";
	
	//echo "<td valign='top'>" . nl2br( $row['stock_minimo']) . "</td>";  
	echo "<td valign='top'>" . number_format(nl2br( $row['stock_minimo']), 0, '.', '.') . "</td>"; 
	echo "<td valign='top'><a href=editarqui.php?id_quimico={$row['id_quimico']}>Editar</a></td> "; 
	// <td><a href=borrarqui.php?id_quimico={$row['id_quimico']}>Borrar</a></td>
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
	 echo  "<a href='verqui.php?pagina=0'>P&aacute;gina 1</a> - ";
	echo "<a href='verqui.php?pagina=$pag_anterior'>Anterior</a> - ";
	 }
	}
	echo "<a href='verqui.php?pagina=$pag_siguiente'>Siguiente</a> </center><p>";
	//fin codigo para paginacion
 ?>
<a href='agregarqui.php'>Agregar quimico</a> - 
<a href='seccionqui.php'>Volver a quimicos</a>
 
</body>
</html>