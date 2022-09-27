<html>
<head>
    <title>Array en Form :: PHP</title>
<head>
<body>
<?php
if (isset($_POST['send']))
{
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	if (isset($_POST['plato']))
	{
		$n=count($_POST['plato']);
		$i=0;
		echo "Tus platos favoritos son: " .
        "<ul>";
		while ($i < $n)
		{
			echo "<li>".$_POST['plato'][$i]."</li> ";
			$i++;
		}
		/*
		echo "Tus platos favoritos son: " . "<ul>";
		foreach ($_POST['plato'] as $valor)
			{echo "<li>".$valor."</li> ";}
		*/
   echo "</ul>";
	}
if (isset($_POST['postre']))
  { $postre = $_POST['postre'];
	$n= count($postre);
	$i= 0;

   echo "Tus postres favoritos son: " .
        "<ol>";
   while ($i < $n)
   {
      echo "<li>".$postre[$i]."</li> ";
      $i++;
   }
   echo "</ol>";}
   
}
else
{?>

<b>Selecciona tus platos favoritos:</b><br /><br />
<form method="post" >
Teclee su nombre:<input type="text" name="nombre"><br>
<input type='checkbox' name=plato[] value="guisos">Guisos<br>
<input type='checkbox' name=plato[] value="potajes">Potajes<br>
<input type='checkbox' name=plato[] value="fritos">Fritos<br>
<input type='checkbox' name=plato[] value="asados">Asados<br>
<input type='checkbox' name=plato[] value="ensaladas">Ensalada<br>
<b>Selecciona tus postres favoritos:</b><br /><br />
<select multiple name=postre[]>
<option value="Helado de Vainilla">Helado de vanilla<br />
<option value="Pastel de Chocolate">Pastel de Chocolate<br />
<option value="Tiramisu">Tiramisu<br />
<option value="Melon">Melon<br />
<option value="Melocoton en almibar">Melocoton en almibar<br />
<option value="Fresas con nata">Fresas con nata<br />
<input name="send" type="submit"  value="Enviar!">
</form>
<?php } 
?>
fin
</body>
</html>