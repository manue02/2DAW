<?php
if (isset($_REQUEST['opcion']))
	{if ($_REQUEST['opcion']=="recordar")
		setcookie("mail",$_REQUEST['mailusuario'],time()+(60*60*24),"/");
	elseif ($_REQUEST['opcion']=="norecordar")
			setcookie("mail","",time()-1000,"/");
	}
 else 
	header("location:ejercicio3_cookies.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Problema</title>
</head>
<body>
<?php
if ($_REQUEST['opcion']=="recordar")
  echo "cookie creada";
elseif ($_REQUEST['opcion']=="norecordar")
  echo "cookie eliminada";
?>
<br>
<a href="ejercicio3_cookies.php">Ir a la otra página</a>
</body>
</html>