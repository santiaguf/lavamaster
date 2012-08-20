<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar procesos de ficha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<?php 
echo "<table border=1 id='el-primer-parrafo'>"; 
echo "<tr class='titulotabla'>"; 
echo "<td><b>Id Subproceso</b></td>"; 
echo "<td><b>Nombre Subproceso</b></td>"; 
echo "<td><b>Quimico Usado</b></td>"; 
echo "<td><b>Cantidad Usada</b></td>"; 
echo "<td><b>Numero Ficha</b></td>"; 
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
$result = mysql_query("SELECT * FROM `subprocesos` LIMIT $num_pagina2 , 30") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id_subproceso']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_subproceso']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['quimico_usado']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cantidad_usada']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['numero_ficha']) . "</td>";  
// echo "<td valign='top'><a href=editarsub.php?id_subproceso={$row['id_subproceso']}>Editar</a></td><td><a href=borrarsub.php?id_subproceso={$row['id_subproceso']}>Borrar</a></td> "; 
echo "<td valign='top'><a href=editarsub.php?id_subproceso={$row['id_subproceso']}>Editar</a></td> "; 
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
	 echo  "<a href='versub.php?pagina=0'>P&aacute;gina 1</a> - ";
	echo "<a href='versub.php?pagina=$pag_anterior'>Anterior</a> - ";
	 }
	}
	echo "<a href='versub.php?pagina=$pag_siguiente'>Siguiente</a> </center><p>";
	//fin codigo para paginacion
	
	echo "<a href='agregarsub.php'>Agregar proceso</a> - ";
	echo "<a href='inventario.php'>Volver a inventario</a>";
 ?>
</body>
</html>