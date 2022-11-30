<?php
if (isset($_REQUEST['radio1']))
  setcookie("noticias",$_REQUEST['radio1'],time()+(60*60*24));
else
	header("location:ejercicio4_cookies.php");

?>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Problema</title>

</head>

<body>

<h2>Se configuró correctamente</h2>

<a href="ejercicio4_cookies.php">Ir a la otra página</a>

</body>

</html>