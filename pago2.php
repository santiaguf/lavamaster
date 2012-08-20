<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>pagar a un trabajador - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<h1>Pago de n&oacute;mina </h1>

<?php
	
	$id_empleado2 = $_POST['id_empleado'];
	//querie para obtener datos del trabajador de acuerdo a su nombre
	$result2 = mysql_query("SELECT * FROM `empleados` WHERE id_empleado = $id_empleado2; ") or trigger_error(mysql_error()); 
	$row = mysql_fetch_array($result2); 
	$cedula2 = $row['cedula_empleado'];
	$sueldo2 = $row['salario_empleado'];
	$nombre_empleado = $row['nombre_empleado'];

	//datos ingresados previamente por don señor
	//$nombre_empleado = $_POST['nombre_empleado'];
	$cedula_empleado = $cedula2;
	$sueldo_mes = $sueldo2;
	$dias_periodo = $_POST['dias_periodo'];
	$dias_festivos = $_POST['dias_festivos'];
	$horas_normales = $_POST['horas_normales'];
	$horas_extras_diurnas = $_POST['horas_extras_diurnas'];
	$horas_extras_nocturnas = $_POST['horas_extras_nocturnas'];
	$horas_extras_festivos = $_POST['horas_extras_festivos'];
	$recargo_nocturno = $_POST['recargo_nocturno'];
	$otros_pagos = $_POST['otros_pagos'];
	$dias_trabajados = $_POST['dias_trabajados'];

	//magia 
	$valor_decada = ($sueldo_mes / 30) * $dias_periodo;
	$valor_hora = $sueldo_mes / 240;
	$dias_totales_completos = $dias_periodo - $dias_festivos;
	$horas_totales_completas = $dias_totales_completos * 8;
	$salario_base = ($valor_decada * $horas_normales) / $horas_totales_completas;
	//calcular días que no vino el trabajar para la formula
	$dias_no_vino = ($dias_periodo - $dias_festivos) - $dias_trabajados;
	//calculo para evitar que el subsidio de transporte sea mayor a 10 días
	$sumatoria_subsidio= 10 - $dias_no_vino;
	if ($sumatoria_subsidio >10) {
	$sumatoria_subsidio= 10;
	}
	$subsidio_transporte = 2260 * $sumatoria_subsidio;
	$horas_extras_diurnas_total = ($valor_hora * 1.25) * $horas_extras_diurnas;
	$horas_extras_nocturnas_total = ($valor_hora * 1.75) * $horas_extras_nocturnas;
	$horas_extras_festivos_total = ($valor_hora * 1.75) * $horas_extras_festivos;
	$recargo_nocturno_total = ($valor_hora * 0.35) * $recargo_nocturno;

	$sumatoria_extras = $horas_extras_diurnas_total + $horas_extras_nocturnas_total + $horas_extras_festivos_total + $recargo_nocturno_total;
	$subtotal = $salario_base + $subsidio_transporte + $sumatoria_extras + $otros_pagos;
	$valoraporte = $subtotal - $subsidio_transporte;

	if ($valoraporte < $valor_decada) {
		$aporte = $valor_decada * 0.08;
	} else
	{
		$aporte = $valoraporte * 0.08;
	}
	$neto = $subtotal - $aporte;
	
	
	// convertir valores para enviarlos por formulario
	$sueldo_basico1 = number_format($salario_base, 0, '.', '.');  
	$valor_hora1 = number_format($valor_hora, 0, '.', '.'); 
	$dias_trabajados1 = number_format($dias_trabajados);
	$subsidio_transporte1 = number_format($subsidio_transporte, 0, '.', '.');  
	$hedt = number_format($horas_extras_diurnas_total, 0, '.', '.');   
	$hent = number_format($horas_extras_nocturnas_total, 0, '.', '.');   
	$heft = number_format($horas_extras_festivos_total, 0, '.', '.');   
	$rnt = number_format($recargo_nocturno_total, 0, '.', '.'); 
	$suma_extras1 =  number_format($sumatoria_extras, 0, '.', '.');
	$otros_pagos1 = number_format($otros_pagos, 0, '.', '.');  
	$subtotal1 = number_format($subtotal, 0, '.', '.');  
	$aportes1 = number_format($aporte, 0, '.', '.');  
	$neto_a_pagar1 = number_format($neto, 0, '.', '.'); 
	
	//ingresar fechas en la base de datos
	$dia_inicial2 = $_POST['dia_inicial'];
	$mes_inicial2 = $_POST['mes_inicial'];
	$anio = $_POST['anio']; 
	$dia_final2 = $_POST['dia_final'];
	$mes_final2 = $_POST['mes_final'];

	if ($_POST['dia_inicial'] < 10) {
		$dia_inicial2 = "0".$_POST['dia_inicial']."";
	}

	if ($_POST['dia_final'] < 10) {
		$dia_final2 = "0".$_POST['dia_final']."";
	}
	//fechas
	$fecha_inicial = "".$anio."-".$mes_inicial2."-".$dia_inicial2."";
	$fecha_final = "".$anio."-".$mes_final2."-".$dia_final2."";

	//ingreso de datos a la bd 
	$sql = "INSERT INTO `pagos` ( `fecha_inicial` ,  `fecha_final` ,  `nombre_empleado` ,  `id_empleado` ,  `cedula_empleado` ,  `salario_base` ,  `valor_hora` ,  `dias_trabajados` ,  `subsidio_transporte` ,  `hed` ,  `hen` ,  `hef` ,  `rn` ,  `sumatoria_extras` , `otros_pagos` ,  `subtotal` ,  `aportes` ,  `netos`  ) VALUES(  '$fecha_inicial' ,  '$fecha_final' ,  '$nombre_empleado' ,  '$id_empleado2' ,  '$cedula_empleado' ,  '$salario_base' ,  '$valor_hora' ,  '$dias_trabajados' ,  '$subsidio_transporte' ,  '$horas_extras_diurnas_total' ,  '$horas_extras_nocturnas_total' ,  '$horas_extras_festivos_total' ,  '$recargo_nocturno_total' , '$sumatoria_extras',  '$otros_pagos' ,  '$subtotal' ,  '$aporte' ,  '$neto'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	
	//mostrar la info de la tabla
	$numero = 0;
	echo "<table border=1 id='el-primer-parrafo' >"; 
	echo "<tr class='titulotabla'>"; 
	echo "<td><b>Nombre del empleado</b></td>"; 
	echo "<td><b>C&eacute;dula</b></td>";
	echo "<td><b>Salario Base</b></td>"; 
	echo "<td><b>Valor Hora</b></td>"; 
	echo "<td><b>D&iacute;as trabajandos</b></td>";
	echo "<td><b>Subsidio de Transporte</b></td>";
	echo "<td><b>Horas extra Diurnas</b></td>";
	echo "<td><b>Horas extra Nocturnas</b></td>";
	echo "<td><b>Horas extra Festivos</b></td>";
	echo "<td><b>Recargo Nocturno</b></td>"; 
	echo "<td><b>Otros Pagos</b></td>"; 
	echo "<td><b>Subtotal</b></td>";
	echo "<td><b>Aportes</b></td>";
	echo "<td><b>Neto</b></td>";
	echo "</tr>";  
	echo "<tr>";  
	echo "<td valign='top'>" . $nombre_empleado . "</td>";  
	echo "<td valign='top'>" . $cedula_empleado . "</td>";
	echo "<td valign='top'>" . number_format($salario_base, 0, '.', '.') . "</td>";  
	echo "<td valign='top'>" . $valor_hora1 . "</td>";  
	echo "<td valign='top'>" . $dias_trabajados1 . "</td>";
	echo "<td valign='top'>" . $subsidio_transporte1 . "</td>";  
	echo "<td valign='top'>" . $hedt . "</td>";  
	echo "<td valign='top'>" . $hent . "</td>";  
	echo "<td valign='top'>" . $heft . "</td>";  
	echo "<td valign='top'>" . $rnt . "</td>";  
	echo "<td valign='top'>" . $otros_pagos1 . "</td>"; 
	echo "<td valign='top'>" . $subtotal1 . "</td>"; 
	echo "<td valign='top'>" . $aportes1 . "</td>"; 
	echo "<td valign='top'>" . $neto_a_pagar1 . "</td>"; 
	 
	echo "</tr>"; 
	echo "</table>"; 
	// fin de la tabla
	
	//convertir mes inicial a de número a nombre para mostrar en el formulario
	$mes_inicial_pdf= $_POST['mes_inicial'];
	$mes_final_pdf= $_POST['mes_final'];
	
	switch ($mes_inicial_pdf) {
    case 00:
        $mes_inicial_pdf= "Enero";
        break;
    case 01:
        $mes_inicial_pdf= "Enero";
        break;
    case 02:
        $mes_inicial_pdf= "Febrero";
        break;
	case 03:
        $mes_inicial_pdf= "Marzo";
        break;
    case 04:
        $mes_inicial_pdf= "Abril";
        break;
    case 05:
        $mes_inicial_pdf= "Mayo";
        break;
    case 06:
        $mes_inicial_pdf= "Junio";
        break;
    case 07:
        $mes_inicial_pdf= "Julio";
        break;
    case 08:
        $mes_inicial_pdf= "Agosto";
        break;
    case 09:
        $mes_inicial_pdf= "Septiembre";
        break;
    case 10:
        $mes_inicial_pdf= "Octubre";
        break;
    case 11:
        $mes_inicial_pdf= "Noviembre";
        break;	
	case 12:
        $mes_inicial_pdf= "Diciembre";
        break;		
}

  //convertir mes final a de número a nombre para mostrar en el formulario
  switch ($mes_final_pdf) {
    case 00:
        $mes_final_pdf= "Enero";
        break;
    case 01:
        $mes_final_pdf= "Enero";
        break;
    case 02:
        $mes_final_pdf= "Febrero";
        break;
	case 03:
        $mes_final_pdf= "Marzo";
        break;
    case 04:
        $mes_final_pdf= "Abril";
        break;
    case 05:
        $mes_final_pdf= "Mayo";
        break;
    case 06:
        $mes_final_pdf= "Junio";
        break;
    case 07:
        $mes_final_pdf= "Julio";
        break;
    case 08:
        $mes_final_pdf= "Agosto";
        break;
    case 09:
        $mes_final_pdf= "Septiembre";
        break;
    case 10:
        $mes_final_pdf= "Octubre";
        break;
    case 11:
        $mes_final_pdf= "Noviembre";
        break;	
	case 12:
        $mes_final_pdf= "Diciembre";
        break;		
}
	//fechas para enviar en el pdf
	$fecha_inicial_pdf = "".$_POST['dia_inicial']." de ".$mes_inicial_pdf."";
	$fecha_inicial_pdf2 = $_POST['dia_inicial'];
	$fecha_final_pdf = "".$_POST['dia_final']." de ".$mes_final_pdf."";
	$anio = $_POST['anio'];

		//formulario para enviar los datos al archivo pdf
		echo '<form id="form2" name="form2" method="post" target="_blank" action="certificado.php">';
		echo ' <label>';
		echo '<input type="submit" name="boton2" id="boton2" value="imprimir" />';
		echo '</label>';
		echo '<br />';
		echo '<input type="hidden" name="campo10" id="campo10" value="'.$nombre_empleado.'" />';
		echo '<input type="hidden" name="campo9" id="campo9" value="'.$fecha_inicial_pdf2.'" />';
		echo '<input type="hidden" name="campo8" id="campo8" value="'.$fecha_final_pdf.'" />';
		echo '<input type="hidden" name="campo7" id="campo7" value="'.$anio.'" />';
		echo '<input type="hidden" name="campo6" id="campo6" value="'.$sueldo_basico1.'" />';
		echo '<input type="hidden" name="campo5" id="campo5" value="'.$subsidio_transporte1.'" />';
		echo '<input type="hidden" name="campo4" id="campo4" value="'.$suma_extras1.'" />';
		echo '<input type="hidden" name="campo3" id="campo3" value="'.$otros_pagos1.'" />';
		echo '<input type="hidden" name="campo2" id="campo2" value="'.$subtotal1.'" />';
		echo '<input type="hidden" name="campo1" id="campo1" value="'.$aportes1.'" />';
		echo '<input type="hidden" name="campo11" id="campo11" value="'.$neto_a_pagar1.'" />';
		echo '</form>';

?>
<a href='nomina.php'>Cancelar o Volver</a>
</body>
</html>