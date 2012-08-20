<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar pagos por decada - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
   // SELECT * FROM `pagos` WHERE MONTH(`fecha_final`) = 04 AND YEAR(`fecha_final`) = 2012 AND DAY(`fecha_final`) = 18;
	if (isset($_GET['mes']) ) { 
	$mes = $_GET['mes'];  
    $num_pagina2 = 0;
	if (isset($_GET['anio']) ) { 
	$anio = $_GET['anio'];
	}
	if (isset($_GET['decada']) ) { 
	$decada = $_GET['decada'];
	}
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
$result = mysql_query("SELECT * FROM `pagos` WHERE YEAR(`fecha_inicial`) = $anio AND MONTH(`fecha_inicial`) = $mes AND DAY(`fecha_inicial`) = $decada ") or trigger_error(mysql_error()); 
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
echo "<td valign='top'>" . number_format(nl2br( $row['netos']), 0, '.', '.') . "</td>";  
echo "<td valign='top'><a href=editarpagos.php?id_pago={$row['id_pago']}>Editar</a></td> "; 
echo "</tr>"; 
	} 
}
echo "</table>"; 
		//formulario para enviar los datos al archivo pdf
		echo '<form id="form2" name="form2" method="post" target="_blank" action="certificadopagos.php">';
		echo ' <label>';
		echo '<input type="submit" name="boton2" id="boton2" value="imprimir" />';
		echo '</label>';
		echo '<br />';
		echo '<input type="hidden" name="campo1" id="campo1" value="'.$anio.'" />';
		echo '<input type="hidden" name="campo2" id="campo2" value="'.$mes.'" />';
		echo '<input type="hidden" name="campo3" id="campo3" value="'.$decada.'" />';
		echo '</form>';
?>
<a href='nomina.php'>Volver a pagos</a>
</body>
</html>