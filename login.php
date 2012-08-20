<?php
include("conexion.php");

if(isset($_POST['login']))
{
    $nick= $_POST['nick'];
    $pass= md5(md5($_POST['pass']));
    $b_user=mysql_query("SELECT * FROM usuarios WHERE nick='$nick'");    
    $ses = @mysql_fetch_assoc($b_user) ;
    if(@mysql_num_rows($b_user))
    {
        if($ses['pass'] == $pass)
        {
            $_SESSION['id']=        $ses["id"];
            $_SESSION['fecha']=    $ses["fecha"];
            $_SESSION['nick']=    $ses["nick"];
            $_SESSION['mail']=    $ses["mail"];
            $_SESSION['ip']=        $ses["ip"];
			
        }
        else
        {
            echo 'Nombre de usuario o Contrase&ntilde;a incorrecta.';
        }
    }
    else
    {
        echo 'Nombre de Usuario o contrase&ntilde;a incorrecta.';
    }
}
    
if(isset($_GET['modo']) == 'desconectar')
{
    session_destroy();
    echo '<meta http-equiv="Refresh" content="2;url=login.php"> ';
    exit ('Te has desconectado del sistema.');
}
    
if(isset($_SESSION['id']))
{
	echo '<h2>Inicio de sesi&oacuten correctamente! </h2>';
    echo '<meta http-equiv="Refresh" content="1;url=perfil.php"> ';
    echo 'Bienvenido <b>' . $_SESSION['nick'] . '</b><br /><br />';
    echo '<b>Fecha registro:</b> ' . date("d-m-Y - H:i", $_SESSION['fecha']) . '<br />';
    echo '<b>Email:</b> ' . $_SESSION['mail'] . '<br />';
    echo '<b>IP:</b> ' . $_SESSION['ip'] . '<br /><br />';
	echo '<a href="perfil.php">Ver perfil</a>';
	echo '<p>';
    echo '<a href="login.php?modo=desconectar">Salir</a>';
}
else
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Lavamaster v1.0</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
</head>
<body>
<h1 align="center">Lavamaster v1.0</h1>
<div align="center">
    <form name="login_user" action="login.php" method="post" id="el-primer-parrafo" />
        <dt><label>Nick:</label></dt>
        <input type='text' name='nick' /><br /><br />
        <dt>
          <label>Contraseña:</label>
        </dt>
        <input type="password" name='pass' /><br /><br />
        
        <input type="submit" name="login" style="width:100px;" tabindex="6" value="Entrar" />
        <input type="reset" name="Limpiar" style="width:100px;" tabindex="6" value="Limpiar" />
    </form>
	lavamaster 1.0  desarrollado por santiago bernal - http://netpress.co
</div>
<?php
}
?>
</body>
</html>