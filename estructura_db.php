<?php
//Variables de conexion
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "vertrigo";
$dbname = "registro";
 
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error()); mysql_select_db($dbname) or die("Error al conectar a la base de datos.");
//MOSTRAMOS TODAS LAS TABLAS
$Sql ="SHOW TABLES";
$result = mysql_query( $Sql ) or die("No se puede ejecutar la consulta: ".mysql_error());
while($Rs = mysql_fetch_array($result)) {
// PARA CADA TABLA DESCRIBIMOS LOS CAMPOS
$Sql2 ="DESCRIBE ".$Rs[0];
$result2 = mysql_query( $Sql2 ) or die("No se puede ejecutar la consulta: ".mysql_error());
echo '<table width="100%" class="listado_tablas">';
echo '<tr><th colspan="4">'.$Rs[0].'</th></tr>';
//MOSTRAMOS LA INFORMACION DE LOS CAMPOS
while($Rs2 = mysql_fetch_array($result2)) {
echo '<tr>';
echo '<td width="55%">'.$Rs2['Field'].'</td>';
echo '<td width="25%">'.$Rs2['Type'].'</td>';
echo '<td width="10%">'.$Rs2['Null'].'</td>';
echo '<td width="10%">'.$Rs2['Key'].'</td>';
echo '</tr>';
}
echo '</table>';
}	
?>