<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar quimico - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
 <?php 	

// ingreso de datos en la base de datos 
 if (isset($_POST['submitted'])) {
   $q = "INSERT INTO quimicos (nombre_quimico, proveedor_quimico, cantidad_quimico, stock_minimo) VALUES ('{$_POST['nombre_quimico']}','{$_POST['proveedor_quimico']}','{$_POST['cantidad_quimico']}','{$_POST['stock_minimo']}')"; $rs = mysql_query($q);
if($rs == false){
	echo ' error ';
}else{
	echo 'datos agregados correctamente, espera 2 segundos o haz clic <a href="verqui.php">aqui</a>';
	echo '<meta http-equiv="Refresh" content="2;url=verqui.php"> ';
} 
//Desconectar($conectar);
} 
 ?>

<!-- formulario para agregar datos -->
<form action='' class="agregar" method='POST'> 
<p><b>Nombre Quimico:</b><br /><input type='text' name='nombre_quimico'/> 
<!-- <p><b>Proveedor Quimico:</b><br /><input type='text' name='proveedor_quimico'/>  -->

<?php
	// Consultar la base de datos
	$consulta_mysql='select * from proveedores ORDER BY `proveedores`.`nombre_empresa` ASC ';
	$resultado_consulta_mysql=mysql_query($consulta_mysql,$conectar);
 	//menu desplegable con lista de quimicos
	echo "<p><b>Proveedor Quimico:</b><br /> <select name='proveedor_quimico'>";
	while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	// se invirtieron las comillas dobles por simples para que funcione en windows server
    echo '<option value="'.$fila['nombre_empresa'].'">'.$fila['nombre_empresa'].'</option>';
	}
	echo "</select>";
?>


<p><b>Cantidad Quimico:</b><br /><input type='text' value='0' name='cantidad_quimico'/>
<p><b>Stock m&iacute;nimo:</b><br /><input type='text' value='0' name='stock_minimo'/>

<p><input type='submit' value='agregar' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<p>
<center><a href='verqui.php'>Volver al listado</a> - 
<a href='seccionqui.php'>Volver a quimicos</a></center>

</body>
</html>