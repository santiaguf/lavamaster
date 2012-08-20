<?php 
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>ver informaci&oacute;n de la ficha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>

<?php
if (isset($_GET['numero_ficha']) ) { 
$numero_ficha = (int) $_GET['numero_ficha']; 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `fichas` WHERE `numero_ficha` = '$numero_ficha' ")); 
?>
	<center><h2>Informaci&oacute;n ficha</h2></center>
	<p id="el-primer-parrafo"><b>Id Ficha: </b><?php echo stripslashes($row['id_ficha']) ?> 
	<b>&nbsp; &nbsp; Fecha: </b><?php echo stripslashes($row['fecha']) ?> 
	<b>&nbsp; &nbsp; Cliente: </b><?php echo stripslashes($row['cliente']) ?> 
	<br><b>Referencia: </b><?php echo stripslashes($row['referencia']) ?>
	<b>&nbsp; &nbsp; Nombre Proceso: </b><?php echo stripslashes($row['nombre_proceso']) ?>
	<b>&nbsp; &nbsp; Tipo de Prenda: </b><?php echo stripslashes($row['tipo_prenda']) ?>
	<br><b>Cantidad Total: </b><?php echo stripslashes($row['cantidad_total']) ?>
	<b>&nbsp; &nbsp; Cantidad por tanda: </b><?php echo stripslashes($row['cantidad_por_tanda']) ?>
	<b>&nbsp; &nbsp; Peso prenda: </b><?php echo stripslashes($row['peso_prenda']) ?>
	<br><b>Peso total: </b><?php echo stripslashes($row['peso_total']) ?>
	<b>&nbsp; &nbsp; Cantidad de quimicos: </b><?php echo stripslashes($row['cantidad_quimicos']) ?>
	<b>&nbsp; &nbsp; Tandas: </b><?php echo stripslashes($row['tandas']) ?>	
	</p>
	<center><h2>Qu&iacute;micos de esta ficha</h2></center>

<?php 
//$numero_ficha = (int) $_GET['numero_ficha']; 
$numero = 0;
echo "<table border=1 id='el-primer-parrafo'>"; 
echo "<tr class='titulotabla'>"; 
echo "<td><b>Id Subproceso</b></td>"; 
echo "<td><b>Nombre Subproceso</b></td>"; 
echo "<td><b>Quimico Usado</b></td>"; 
echo "<td><b>Cantidad Usada</b></td>"; 
echo "<td><b>Numero Ficha</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `subprocesos` WHERE `numero_ficha` = '$numero_ficha' ") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id_subproceso']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_subproceso']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_quimico_usado']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cantidad_usada']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['numero_ficha']) . "</td>";  
// echo "<td valign='top'><a href=editarsub.php?id_subproceso={$row['id_subproceso']}>Editar</a></td><td><a href=borrarsub.php?id_subproceso={$row['id_subproceso']}>Borrar</a></td> "; 
echo "<td valign='top'><a href=editarsub.php?id_subproceso={$row['id_subproceso']}>Editar</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
//consulta para obtener valores de 2 tablas
// SELECT quimicos.nombre_quimico, subprocesos.* FROM subprocesos, quimicos WHERE numero_ficha =  '6060';
?>
<center><a href='verficha.php'>Volver al listado</a> - 
<a href='perfil.php'>Volver al perfil</a></center>
<p> 
<?php } 
?>
</body>
</html>