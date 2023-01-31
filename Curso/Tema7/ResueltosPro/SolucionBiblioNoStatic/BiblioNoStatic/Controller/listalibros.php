<?php
require_once("../Model/base.php");
$aid=$_POST["autor"];
$eid=$_POST["editorial"];
$lid=$_POST["idioma"];
$searchtext=$_POST["texto"];
$select = "SELECT  libros.id,  libros.id_autor, libros.id_idioma, libros.id_editorial, libros.titulo,libros.precio, autores.nombre as autor,editorial.nombre as editorial, idiomas.nombre as idioma ";
$from   = " FROM libros inner join autores  on libros.id_autor=autores.id";
$from .= " INNER JOIN idiomas ON libros.id_idioma=idiomas.id INNER JOIN editorial on libros.id_editorial=editorial.id";
$where  = " WHERE true  ";
//echo $select.$from.$where;
if ($aid != -1) { 
  $where .= " AND libros.id_autor=$aid";
}

if ($eid != -1) { 
//$select .=", editorial.CID, NOMBRE";
 //$from  .= ", editorial";
  $where .= " AND  LIBROS.id_editorial=$eid";
}

if ($lid != -1) { // A
//$select .=", idioma.LID, IDIOMA";
// $from  .= ", idioma";
  $where .= "  AND libros.id_idioma=$lid";
}
if ($searchtext != "") { 
  $where .= " AND TITULO LIKE '%$searchtext%'";
}
$orderby=" ORDER BY libros.titulo, libros.precio";
$cadenasql=$select.$from.$where.$orderby;
$miconexion=new Base();
$arrayLibros=$miconexion->obtenerlibros($cadenasql);
/*
echo "<pre>";
print_r($arrayLibros);
echo "</pre>";
*/
require_once("../view/listalibros.php");
?>
?>