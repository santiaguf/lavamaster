<?php
include("conexion.php");
//Sistema de registro --HiperAcme.net--

if(isset($_POST['registro']))//Vallidamos que el formulario fue enviado
{    /*Validamos que todos los campos esten llenos correctamente*/
    if(($_POST['nick'] != '') && ($_POST['mail'] != '') && ($_POST['pass'] != '') && ($_POST['conf_pass'] != ''))
    {
        if($_POST['pass'] != $_POST['conf_pass'])
        {
            echo '<br />Las contrase&ntilde;as no coinciden';
        }
        else
        {
            $date= time(); 
            $nick= limpiar($_POST['nick']);
            $mail= limpiar($_POST['mail']);
            $pass= md5(md5(limpiar($_POST['pass'])));
            $ipuser= $_SERVER['REMOTE_ADDR'];            

            $b_user= mysql_query("SELECT nick FROM usuarios WHERE nick='$nick'");
            if($user=@mysql_fetch_array($b_user))
            {
                echo '<br />El nombre de usuario o el email ya esta registrado.';
                mysql_free_result($b_user); //liberamos la memoria del query a la db
            }
            else
            {
                if(validar_email($_POST['mail']))
                {
                    mysql_query("INSERT INTO usuarios (fecha,nick,mail,pass,ip) values ('$date','$nick','$mail','$pass','$ipuser')");
                    echo '<br />Te has registrado Correctamente, ahora podras iniciar sesi&oacute;n como usuario registrado.';
                }
                else 
                {
                    echo '<br />El email no es valido.';
                }
            }
        }
    }
    else
    {
        echo '<br />Deberas llenar todos los campos.';
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Registro de Usuarios</title>
</head>
<body>
<h2>Sistema de Registro</h2>
<div align="center">
    <form name="registrar" action="registro.php" method="post" onsubmit="return validar()" />
        <dt><label>Nick:</label></dt>
        <input type='text' name='nick' /><br /><br />

        <dt><label>E-mail:</label></dt>
        <input type='text' name='mail' /><br /><br />

        <dt>
          <label>Contraseña:</label>
        </dt>
        <input type="password" name='pass' /><br /><br />

        <dt>
          <label>Confirmar Contraseña:</label>
        </dt>
        <input type="password" name='conf_pass' /><br /><br /><br /><br />
        
        <input type="submit" name="registro" style="width:100px;" tabindex="6" value="Registrar" />
        <input type="reset" name="Limpiar" style="width:100px;" tabindex="6" value="Limpiar" />
    </form>
    <a href="login.php">Identificarse</a>
</div>    
</body>
</html>