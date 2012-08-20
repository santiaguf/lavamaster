<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>listar empleados - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	 
echo "<table border=1 id='el-primer-parrafo'>"; 
echo "<tr class='titulotabla'>"; 
echo "<td><b>Id Empleado</b></td>"; 
echo "<td><b>Nombre Empleado</b></td>"; 
echo "<td><b>C&eacute;dula Empleado</b></td>"; 
echo "<td><b>Salario Empleado</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `empleados`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id_empleado']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre_empleado']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['cedula_empleado']) . "</td>";  
echo "<td valign='top'>" . number_format(nl2br( $row['salario_empleado']), 0, '.', '.') . "</td>";  
echo "<td valign='top'><a href=editaremp.php?id_empleado={$row['id_empleado']}>Editar</a></td> ";
// <td><a href=borraremp.php?id_empleado={$row['id_empleado']}>Borrar</a></td> 
echo "</tr>"; 
} 
echo "</table>"; 
echo  "<a href='agregaremp.php'>Agregar empleado</a> - ";
	echo "<a href='seccionemp.php'>Volver a empleaodos</a>";
 ?>

</body>
</html>