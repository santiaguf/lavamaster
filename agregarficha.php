<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar ficha - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<?php 
//include('config.php'); 
//if (isset($_POST['submitted'])) { 
//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
//$sql = "INSERT INTO `fichas` ( `numero_ficha` ,  `fecha` ,  `cliente` ,  `referencia` ,  `nombre_proceso` ,  `tipo_prenda` ,  `cantidad_total` ,  `cantidad_por_tanda` ,  `peso_prenda` ,  `peso_total` ,  `cantidad_quimicos` ,  `tandas`  ) VALUES(  '{$_POST['numero_ficha']}' ,  '{$_POST['fecha']}' ,  '{$_POST['cliente']}' ,  '{$_POST['referencia']}' ,  '{$_POST['nombre_proceso']}' ,  '{$_POST['tipo_prenda']}' ,  '{$_POST['cantidad_total']}' ,  '{$_POST['cantidad_por_tanda']}' ,  '{$_POST['peso_prenda']}' ,  '{$_POST['peso_total']}' ,  '{$_POST['cantidad_quimicos']}' ,  '{$_POST['tandas']}'  ) "; 
//mysql_query($sql) or die(mysql_error()); 
//echo "ficha agregada.<br />"; 
//echo "<a href='verficha.php'>Volver al listado</a>"; 
//} 
?>

<form action='agregarsub2.php' class='agregar' method='POST'> 
<p><b>Numero Ficha:</b><br /><input type='text' name='numero_ficha'/> 
<p><b>Fecha:</b><br /><input type='text' name='fecha'/> <p>ej: 2012-03-22  
<p><b>Cliente:</b><br /><input type='text' name='cliente'/> 
<p><b>Referencia:</b><br /><input type='text' name='referencia'/> 
<p><b>Nombre Proceso:</b><br /><input type='text' name='nombre_proceso'/> 
<p><b>Tipo Prenda:</b><br /><input type='text' name='tipo_prenda'/> 
<p><b>Cantidad Total:</b><br /><input type='text' name='cantidad_total'/> 
<p><b>Cantidad Por Tanda:</b><br /><input type='text' name='cantidad_por_tanda'/> 
<p><b>Peso Prenda:</b><br /><input type='text' name='peso_prenda'/> 
<p><b>Peso Total:</b><br /><input type='text' name='peso_total'/> 
<p><b>Cantidad Quimicos:</b><br /><input type='text' name='cantidad_quimicos'/> 
<p><b>Tandas:</b><br /><input type='text' name='tandas'/> 
<p><input type='submit' value='agregar' /><input type='hidden' value='1' name='submitted' /> 
</form> 

<center><a href='verficha.php'>Volver al listado</a> - 
<a href='inventario.php'>Volver a inventario</a></center>

</body>
</html>
