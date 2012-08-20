<?php
include("conexion.php");
user_login();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>agregar proveedor - Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body> 
<?php 
// include('config.php'); 
if (isset($_POST['submitted'])) { 
//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `proveedores` ( `nombre_empresa` ,  `vendedor_encargado` ,  `pais` ,  `ciudad` ,  `departamento` ,  `direccion` ,  `telefono_fijo` ,  `telefono_celular` ,  `correo_proveedor` ,  `sitio_web` ,  `leadtime`  ) VALUES(  '{$_POST['nombre_empresa']}' ,  '{$_POST['vendedor_encargado']}' ,  '{$_POST['pais']}' ,  '{$_POST['ciudad']}' ,  '{$_POST['departamento']}' ,  '{$_POST['direccion']}' ,  '{$_POST['telefono_fijo']}' ,  '{$_POST['telefono_celular']}' ,  '{$_POST['correo_proveedor']}' ,  '{$_POST['sitio_web']}' ,  '{$_POST['leadtime']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Proveedor agregado.<br />"; 
echo "<a href='verpro.php'>Volver al listado</a>"; 
} 
?>

<form action='' class="agregar" method='POST'> 
<p><b>Nombre Empresa:</b><br /><input type='text' name='nombre_empresa'/> 
<p><b>Vendedor Encargado:</b><br /><input type='text' name='vendedor_encargado'/> 
<p><b>Pa&iacute;s:</b><br /><input type='text' name='pais'/> 
<p><b>Ciudad:</b><br /><input type='text' name='ciudad'/> 
<p><b>Departamento:</b><br /><input type='text' name='departamento'/> 
<p><b>Direccion:</b><br /><textarea name='direccion'></textarea> 
<p><b>Telefono Fijo:</b><br /><input type='text' name='telefono_fijo'/> 
<p><b>Telefono Celular:</b><br /><input type='text' name='telefono_celular'/> 
<p><b>Correo Proveedor:</b><br /><input type='text' name='correo_proveedor'/> 
<p><b>Sitio Web:</b><br /><input type='text' name='sitio_web'/> 
<p><b>Leadtime:</b><br /><textarea name='leadtime'></textarea> 
<p><input type='submit' value='agregar' /><input type='hidden' value='1' name='submitted' /> 
</form> 

<center><a href='verpro.php'>Volver al listado</a> - 
<a href='inventario.php'>Volver a inventario</a></center>

</body>
</html>
