<?phpsession_start();if (empty($_POST["nombre"]))	header("Location:sesiones1.php");if (!isset($_SESSION["nombre"]) OR ($_SESSION["nombre"]<>$_POST["nombre"])){	$_SESSION["nombre"]=$_POST["nombre"];	$_SESSION["contador"]=1;}else{	$_SESSION["contador"]++;}echo "usuario: ".$_SESSION["nombre"]."<br>";echo "accesos: ".$_SESSION["contador"]."<br>";?><p><form  method=post action='sesiones1.php'><input type=submit name='Borrar' value='Borrar  sesión'></p><p><a href='sesiones1.php'>Volver</a></p>