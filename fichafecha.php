<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar Fichas - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	
	if (isset($_GET['fecha']) ) { 
	$fecha2 = $_GET['fecha'];  
    $numero = 0;

echo "<table border=1 id='el-primer-parrafo'>"; 
echo "<tr class='titulotabla'>"; 
echo "<td><b>Id Ficha</b></td>"; 
echo "<td><b>Numero Ficha</b></td>"; 
echo "<td><b>Fecha</b></td>"; 
echo "<td><b>Cliente</b></td>"; 
echo "<td><b>Referencia</b></td>"; 
echo "<td><b>Nombre Proceso</b></td>"; 
echo "<td><b>Tipo Prenda</b></td>"; 
echo "<td><b>Cantidad Total</b></td>"; 
echo "<td><b>Cantidad Por Tanda</b></td>"; 
echo "<td><b>Peso Prenda</b></td>"; 
echo "<td><b>Peso Total</b></td>"; 
echo "<td><b>Cantidad Quimicos</b></td>"; 
echo "<td><b>Tandas</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `fichas` WHERE `fecha` = '$fecha2' ") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id_ficha']) . "</td>";  
echo "<td valign='top'><a href=ficha.php?numero_ficha={$row['numero_ficha']}>" . nl2br( $row['numero_ficha']) . "</a></td>";  
echo "<td valign='top'>" . nl2br( $row['fecha']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cliente']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['referencia']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_proceso']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['tipo_prenda']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cantidad_total']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cantidad_por_tanda']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['peso_prenda']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['peso_total']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cantidad_quimicos']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['tandas']) . "</td>";  
echo "<td valign='top'><a href=editarficha.php?id_ficha={$row['id_ficha']}>Editar</a></td> ";
// <td><a href=borrarficha.php?id_ficha={$row['id_ficha']}>Borrar</a></td> 
echo "</tr>"; 
	} 
}
echo "</table>"; 

	echo  "<a href='agregarficha.php'>Agregar ficha</a> - ";
	echo "<a href='seccionficha.php'>Volver a fichas</a>";
?>
</body>
</html>