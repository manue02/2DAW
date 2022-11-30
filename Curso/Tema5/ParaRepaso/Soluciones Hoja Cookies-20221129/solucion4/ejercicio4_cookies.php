<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Problema</title>
</head>
<body>
<?php
  if (isset($_COOKIE['noticias']))
    echo $_COOKIE['noticias']."<br>";
  else
  {  
?>
<form method="post" action="ejercicio4_2cookies.php">
Configuracion del titular del sitio:<br>
<input type="radio" name="radio1" value="Noticias Politicas">Noticias Políticas.<br>
<input type="radio" name="radio1" value="Noticias Economicas">Noticias Económicas.<br>
<input type="radio" name="radio1" value="Noticias Deportivas">Noticias Deportivas.<br>
<input type="submit" value="Confirmar">
</form>
<?php
  }
?> 
<a href="ejercicio4_3cookies.php">Borrar cookies</a> 
</body>
</html>

