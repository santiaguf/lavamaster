<?php
include("conexion.php");
user_login();
require('fpdf.php');
class PDF extends FPDF
{
//Cabecera de página
function Header()
{ 
    global $title;    // estas variables no se pueden cambiar de nombre porque vienen en 
	global $author;   // en el archivo fpdf.php y son las variables globales
	global $keywords; 
	global $nombre_empleado; 		//variable creada por santiago bernal
	global $sueldo_basico;   		//variable creada por santiago bernal
	global $subsidio_transporte;    //variable creada por santiago bernal
	global $fecha_inicial; 			//variable creada por santiago bernal
	global $fecha_final;			//variable creada por santiago bernal
	global $anio;					//variable creada por santiago bernal
	global $sueldo_basico;			//variable creada por santiago bernal
	global $subsidio_transporte;	//variable creada por santiago bernal
	global $suma_extras;			//variable creada por santiago bernal
	global $otros_pagos;			//variable creada por santiago bernal
	global $subtotal;				//variable creada por santiago bernal
	global $aportes;				//variable creada por santiago bernal
	global $neto_a_pagar;			//variable creada por santiago bernal
	global $mes;
	global $decada;
	global $result;
	global $row;
	global $key;
	global $value;
	
	//Logo
    $this->Image('certificado2.jpg',0,0,210);
    //Arial bold 15
    $this->SetFont('Arial','B',16);  
}
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();

//inicio nuevo code
$anio = $_POST["campo1"];
$mes =  $_POST["campo2"];
$decada = $_POST["campo3"];

$result = mysql_query("SELECT * FROM `pagos` WHERE YEAR(`fecha_inicial`) = $anio AND MONTH(`fecha_inicial`) = $mes AND DAY(`fecha_inicial`) = $decada ") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	  
//echo  nl2br( $row['id_pago']) ;  
$fecha_inicial =  nl2br( $row['fecha_inicial']) ;  
$fecha_final =  nl2br( $row['fecha_final']) ;  
$nombre_empleado = nl2br( $row['nombre_empleado']) ;  
//echo  nl2br( $row['cedula_empleado']) ;  
$sueldo_basico = number_format(nl2br( $row['salario_base']), 0, '.', '.') ;  
//echo  number_format(nl2br( $row['valor_hora']), 0, '.', '.') ;  
//echo  nl2br( $row['dias_trabajados']) ;  
$subsidio_transporte = number_format(nl2br( $row['subsidio_transporte']), 0, '.', '.') ;  
//echo  number_format(nl2br( $row['hed']), 0, '.', '.') ;  
//echo  number_format(nl2br( $row['hen']), 0, '.', '.') ;  
//echo  number_format(nl2br( $row['hef']), 0, '.', '.') ;  
//echo  number_format(nl2br( $row['rn']), 0, '.', '.') ;  
$suma_extras = number_format(nl2br( $row['sumatoria_extras']), 0, '.', '.');
$otros_pagos = number_format(nl2br( $row['otros_pagos']), 0, '.', '.') ;  
$subtotal =  number_format(nl2br( $row['subtotal']), 0, '.', '.') ;  
$aportes = number_format(nl2br( $row['aportes']), 0, '.', '.') ;   
$neto_a_pagar = number_format(nl2br( $row['netos']), 0, '.', '.') ;   
		
		// conversion de fechas para mostrar en formulario
		if ($mes==01){
		$elmes = "Enero";
		} else if ($mes==02){
		$elmes = "Febrero";
		} else if ($mes==03){
		$elmes = "Marzo";
		} else if ($mes==04){
		$elmes = "Abril";
		} else if ($mes==05){
		$elmes = "Mayo";
		} else if ($mes==06){
		$elmes = "Junio";
		} else if ($mes==07){
		$elmes = "Julio";
		} else if ($mes==08){
		$elmes = "Agosto";
		} else if ($mes==09){
		$elmes = "Septiembre";
		} else if ($mes==10){
		$elmes = "Octubre";
		} else if ($mes==11){
		$elmes = "Noviembre";
		} else if ($mes==12){
		$elmes = "Diciembre";
		}	
		
		$fecha_inicial2 = substr("$fecha_inicial", -2);
		$fecha_final2 = substr("$fecha_final", -2);
	//Salto de línea
    $pdf->Ln(54);
    $pdf->Cell(75);
	$pdf->Cell(40,10,' Del '.$fecha_inicial2.' al '.$fecha_final2.' de '.$elmes.' de '.$anio.' ',0,0,'C'); 
    $pdf->Ln(16);
    $pdf->Cell(75);
    $pdf->Cell(43,10,' '.$nombre_empleado.' ',0,0,'L');
    $pdf->Ln(28);
    $pdf->Cell(75);
    $pdf->Cell(43,10,' $ '.$sueldo_basico.' ',0,0,'R');
    $pdf->Ln(11);
    $pdf->Cell(75);
    $pdf->Cell(43,10,'  '.$subsidio_transporte.' ',0,0,'R');
    $pdf->Ln(11);
    $pdf->Cell(75);
    $pdf->Cell(43,10,'  '.$suma_extras.' ',0,0,'R');
    $pdf->Ln(11);
    $pdf->Cell(75);
    $pdf->Cell(43,10,'  '.$otros_pagos.' ',0,0,'R');
    $pdf->Ln(39);
    $pdf->Cell(75);
    $pdf->Cell(43,10,'  '.$aportes.' ',0,0,'R');
    $pdf->Ln(16);
    $pdf->Cell(75);
    $pdf->Cell(43,10,' $ '.$neto_a_pagar.' ',0,0,'R');
	//Saltos de línea falsos para engañar a la libreria de modo que los textos queden ordenados
	// dichos saltos hacen que la hoja sea completa
	$pdf->Ln(16);
	$pdf->Cell(40,10,'  ',0,0,'C');
	$pdf->Ln(20);
	$pdf->Cell(40,10,'  ',0,0,'C');
	$pdf->Ln(20);
	$pdf->Cell(40,10,'  ',0,0,'C');
	$pdf->Ln(15);
	$pdf->Cell(40,10,'  ',0,0,'C');
}
$pdf->Output();
?>