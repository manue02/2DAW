<!-- listapeliculas.php -->
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html>
<head>
<title> lista peliculas </title>
</head>
<body>
<h1>Gestión de peliculas</h1>
<p><a href="peliculas.php">Nueva búsqueda</a></p>
<?php
 include('funcionesBd.php') ;
$searchtext=$_POST['searchtext'];
extract($_POST);
/*
$lid ES EL IDIOMA
$eid ES LA COMPANY=$_POST['aid'];
$aid ES la persona
*/
$conexion = mysqli_connect("localhost", "root", "","filmoteca");
mysqli_set_charset($conexion, "utf8");
$select = "SELECT   peliculas.titulo,peliculas.fecha, personas.nombre as autor,company.nombre as company, idiomas.nombre as idioma ";
$from   = " FROM peliculas inner join personas  on peliculas.id_autor=personas.id";
$from .= " INNER JOIN idiomas ON peliculas.id_idioma=idiomas.id INNER JOIN company on peliculas.id_company=company.id";
$where  = " WHERE true  ";
//echo $select.$from.$where;
if ($aid != 0) { 
  $where .= " AND peliculas.id_autor=$aid";
}

if ($eid != 0) { 
//$select .=", company.CID, NOMBRE";
 //$from  .= ", company";
  $where .= " AND  peliculas.id_company=$eid";
}

if ($lid != 0) { // A
//$select .=", idioma.LID, IDIOMA";
// $from  .= ", idioma";
  $where .= "  AND peliculas.id_idioma=$lid";
}
if ($searchtext != "") { 
  $where .= " AND TITULO LIKE '%$searchtext%'";
}
$orderby=" ORDER BY peliculas.titulo, peliculas.fecha";
$cadenasql=$select.$from.$where.$orderby;
$resultSet = mysqli_query($conexion,$cadenasql);
$hay=mysqli_num_rows($resultSet);
echo mostrarSelect($resultSet);
//echo $select . $from . $where;
?>
</body>
</html>