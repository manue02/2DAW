
<?php
if (!isset($_COOKIE["color"]))
	$bgcolor="white";
else
	$bgcolor=$_COOKIE["color"];

echo "<body bgcolor='".$bgcolor."'>";
?>

<form action="ejer1b.php" method="post">

Seleccione de que color desea que sea la página de ahora en adelante:<br>

<input type="radio" value="red" name="radio">Rojo<br>

<input type="radio" value="green" name="radio">Verde<br>

<input type="radio" value="blue" name="radio">Azul<br>

<input type="submit" value="Crear cookie">

</form>
</body>
</html>