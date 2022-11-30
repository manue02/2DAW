<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Problema</title>
</head>
<body>
<?php
if (isset($_COOKIE['usuario']))
  echo "Cookie de sesión creada. Su valor es $_COOKIE[usuario]";
else
  echo "No existe cookie de sesión";
?>
<br>
<a href="ejercicio5_2cookies.php">Crear cookie de sesión</a>
</body>
</html>