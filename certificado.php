<?php

require('fpdf.php');
class PDF extends FPDF
{
//Cabecera de página
function Header()
{
    global $title;    // estas variables no se pueden cambiar de nombre porque vienen en 
	global $author;   // en el archivo fpdf.php y son las variables globales
	global $keywords; //
	
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
	
	$nombre_empleado = $_POST["campo10"]; //nombre empleado
	$fecha_inicial = $_POST["campo9"]; //fecha inicial
	$fecha_final = $_POST["campo8"]; //fecha final
	$anio = $_POST["campo7"]; // año
	$sueldo_basico = $_POST["campo6"];
	$subsidio_transporte = $_POST["campo5"];	
	$suma_extras = $_POST["campo4"];
	$otros_pagos = $_POST["campo3"];			
	$subtotal = $_POST["campo2"];				
	$aportes = $_POST["campo1"];				
	$neto_a_pagar = $_POST["campo11"];
	
	//Logo
    $this->Image('certificado2.jpg',0,0,210);
    //Arial bold 15
    $this->SetFont('Arial','B',16);  
	
	//Salto de línea
    $this->Ln(54);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
    //Título. nombre
    //$this->Cell(40,10,' Del '.$fecha_inicial.' de '.$anio.' al '.$fecha_final.' de '.$anio.' ',0,0,'C'); este muestra la fecha mas completa
	$this->Cell(40,10,' Del '.$fecha_inicial.' al '.$fecha_final.' de '.$anio.' ',0,0,'C'); 
	
	//Salto de línea después del texto anterior
    $this->Ln(16);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,' '.$nombre_empleado.' ',0,0,'L');
	
	//Salto de línea después del texto anterior
    $this->Ln(28);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,' $ '.$sueldo_basico.' ',0,0,'R');
	
	//Salto de línea después del texto anterior
    $this->Ln(11);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,'  '.$subsidio_transporte.' ',0,0,'R');
	
	//Salto de línea después del texto anterior
    $this->Ln(11);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,'  '.$suma_extras.' ',0,0,'R');
	
	//Salto de línea después del texto anterior
    $this->Ln(11);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,'  '.$otros_pagos.' ',0,0,'R');
	
	//Salto de línea después del texto anterior
    $this->Ln(39);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,'  '.$aportes.' ',0,0,'R');
	
	//Salto de línea después del texto anterior
    $this->Ln(16);
	//Movernos a la derecha, para centrar el texto
    $this->Cell(75);
	//Título. nombre
    $this->Cell(43,10,' $ '.$neto_a_pagar.' ',0,0,'R');
   
}
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->Output();
?>