<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar pagos - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	 
echo "<table border=1 id='el-primer-parrafo' >"; 
echo "<tr class='titulotabla'>"; 
echo "<td><b>Id Pago</b></td>"; 
echo "<td><b>Fecha Inicial</b></td>"; 
echo "<td><b>Fecha Final</b></td>"; 
echo "<td><b>Nombre Empleado</b></td>"; 
echo "<td><b>Cedula Empleado</b></td>"; 
echo "<td><b>Salario Base</b></td>"; 
echo "<td><b>Valor Hora</b></td>"; 
echo "<td><b>Dias Trabajados</b></td>"; 
echo "<td><b>Subsidio Transporte</b></td>"; 
echo "<td><b>Horas extras diurnas</b></td>"; 
echo "<td><b>Horas extras nocturnas</b></td>"; 
echo "<td><b>Horas extras festivos</b></td>"; 
echo "<td><b>Recargo nocturno</b></td>"; 
echo "<td><b>Otros Pagos</b></td>"; 
echo "<td><b>Subtotal</b></td>"; 
echo "<td><b>Aportes</b></td>"; 
echo "<td><b>Netos</b></td>"; 
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
$result = mysql_query("SELECT * FROM `pagos` LIMIT $num_pagina2 , 30") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
//$num_pagina2 = $num_pagina2 + 1;
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id_pago']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['fecha_inicial']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['fecha_final']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_empleado']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cedula_empleado']) . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['salario_base']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['valor_hora']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . nl2br( $row['dias_trabajados']) . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['subsidio_transporte']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['hed']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['hen']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['hef']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['rn']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['otros_pagos']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['subtotal']), 0, '.', '.') . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['aportes']), 0, '.', '.') . "</td>";  
//echo "<td valign='top'>" . nl2br( $row['netos']) . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['netos']), 0, '.', '.') . "</td>";  
echo "<td valign='top'><a href=editarpagos.php?id_pago={$row['id_pago']}>Editar</a></td> "; 
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
	 echo  "<a href='verpagos.php?pagina=0'>P&aacute;gina 1</a> - ";
	echo "<a href='verpagos.php?pagina=$pag_anterior'>Anterior</a> - ";
	 }
	}
	echo "<a href='verpagos.php?pagina=$pag_siguiente'>Siguiente</a> </center><p>";
	//fin codigo para paginacion

echo  "<a href='pago.php'>Agregar pago</a> - ";
echo "<a href='nomina.php'>Volver a pagos</a>";
?>
</body>
</html>