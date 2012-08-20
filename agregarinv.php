<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar inventario - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	

// variable para enviar la fecha al servidor
// $fechahoy = date('Y-m-d H:i:s');
$fechahoy = date('Y-m-d');
// ingreso de datos en la base de datos 
 if (isset($_POST['submitted'])) {
 
	//consulta para convertir id_quimico (es decir, select1) en el nombre del quimico y enviarlo a la base de datos
	$result = mysql_query("SELECT * FROM `quimicos` WHERE `id_quimico` = '{$_POST['select1']}' ") or trigger_error(mysql_error()); 
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	// variable para mostrar 
	$nombre_quimico1 = $row['nombre_quimico'];
	} 
	//consulta para ingresar los datos en la base de datos
   $q = "INSERT INTO inventario (id_quimico, nombre_del_quimico, cantidad, precio_total, fecha) VALUES ('{$_POST['select1']}','$nombre_quimico1','{$_POST['cantidad']}','{$_POST['precio_total']}','{$fechahoy}')"; $rs = mysql_query($q);

   // aqui sumo la cantidad ingresada, al stock del quimico
   $sumasql = "UPDATE `quimicos` SET  `cantidad_quimico` =  cantidad_quimico + '{$_POST['cantidad']}' WHERE `id_quimico` = '{$_POST['select1']}' "; 
	mysql_query($sumasql) or die(mysql_error()); 
	echo (mysql_affected_rows()) ? "agregado al stock.<br />" : "No se ha agregado al stock. <br />";  



if($rs == false){
	echo ' error ';
}else{
	echo 'datos agregados correctamente, espera 2 segundos o haz clic <a href="verinv.php">aqui</a>';
	echo '<meta http-equiv="Refresh" content="2;url=verinv.php"> ';
} 
//Desconectar($conectar);
} 
 ?>

<!-- formulario para agregar datos -->
<form action='' class="agregar" method='POST'> 
<?php
	// Consultar la base de datos
	$consulta_mysql='select * from quimicos ORDER BY `quimicos`.`nombre_quimico` ASC ';
	$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
 	//menu desplegable con lista de quimicos
	echo "<p><b>quimico:</b><br /> <select name='select1'>";
	while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	// se invirtieron las comillas dobles por simples para que funcione en windows server
    echo '<option value="'.$fila['id_quimico'].'">'.$fila['nombre_quimico'].'</option>';
	}
	echo "</select>";
?>

<p><b>Cantidad (Gr):</b><br /><input type='text' value='0' name='cantidad'/> 
<p><b>precio ($):</b><br /><input type='text' value='0' name='precio_total'/>

<p><input type='submit' value='agregar' /><input type='hidden' value='1' name='submitted' /> 
</form> 

<center><a href='verinv.php'>Volver al listado</a> - 
<a href='seccioninv.php'>Volver a inventario</a></center>

</body>
</html>