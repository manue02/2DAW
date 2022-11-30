<?php
    // Comenzamos la sesión para tratar las variables de sesión usadas
    session_start();
	if (isset($_POST['enviar'])) {
        // Inicializamos las variables con los valores de sesión
        $_SESSION['idioma'] = $_POST['idio'];
		$_SESSION['color']=$_POST['clr'];
      ;
    }
	if (!isset($_SESSION['idioma'])|| !isset($_SESSION['color']))
		header("Location:elegir.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ejercicio Sesiones</title>
</head>
<body>
<form action="elegir.php" method="POST">
<?php
        echo" <b>  Opciones Actuales </b><br><ul>";
        echo" <li> Programa TV:". $_SESSION['idioma'];
        echo  "<li>Equipo fútbol:".$_SESSION['color'],"</ul><br>";
       
        
?>
 <input type='submit' value='Borrar opciones' name='borrar' />
 </form>
<P><a href='elegir.php'>Volver a establecer opciones</a></P>

</body>
</html>
