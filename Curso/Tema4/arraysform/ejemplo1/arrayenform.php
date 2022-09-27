<html>
<head>
    <title>Array en Form :: PHP</title>
<head>
<body>
<?php
if (isset($_POST['postre']))
{
    echo "<pre>";
	print_r($_POST);
	echo "</pre>";
   $postre = $_POST['postre'];
   $n        = count($postre);
   $i        = 0;

   echo "Tus postres favoritos son: " .
        "<ol>";
   while ($i < $n)
   {
      echo "<li>".$postre[$i]."</li> ";
      $i++;
   }
   echo "</ol>";
}
else
{?>
<b>Selecciona tus postres favoritos:</b><br /><br />
<form method="post" >
<?php
echo "<select multiple name=postre[]>";
?>
<option value="Helado de Vainilla">Helado de vanilla<br />
<option value="Pastel de Chocolate">Pastel de Chocolate<br />
<option value="Tiramisu">Tiramisu<br />
<option value="Melon">Melon<br />
<option value="Melocoton en almibar">Melocoton en almibar<br />
<option value="Fresas con nata">Fresas con nata<br />
<input name="send" name="envio" type="submit"  value="Enviar!">
</form>
<?php } 
?>
</body>
</html>