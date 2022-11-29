<!-- peliculas.php -->
<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<html>
<head>
<title> Gestión de peliculas </title>
</head>
<body>
<h1>Gestión de peliculas</h1>
<p><a href="nuevapelicula.php">Introducir una nueva pelicula</a></p>
<form action="listapeliculas.php" method="post">
<p>Mostrar los peliculas según el siguiente criterio:<br />
Por autor:
<?php
 include('funcionesBd.php') ;
$conexion = mysqli_connect("localhost", "root", "","filmoteca");
mysqli_set_charset($conexion, "utf8");

$arrayAutores = obtenerArrayOpciones("personas","ID","NOMBRE");
pintarComboMensaje($arrayAutores,"aid","Todos los autores",0);
 
echo "<br>Por compañia:";
$arrayCats = obtenerArrayOpciones("company","ID","NOMBRE");
pintarComboMensaje($arrayCats,"eid","Todos las compañias:",0);
	
echo "<br>Por idioma:";
$arrayIdiomas = obtenerArrayOpciones("idiomas","ID","NOMBRE");
pintarComboMensaje($arrayIdiomas,"lid","Todos los idiomas:",0);
  
?><br />
Conteniendo el Texto: <input type="text" name="searchtext" /><br />
<input type="submit" name="submit" value="Search" />
</form>

<p align="center"><a href="admin.html">Vuelta a la home</a></p>
</body>
</html>