<?php
function cabecera($texto) 
{
    print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
       \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
  <title>Men� - $texto</title>
  <link href=\"miestilo.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>

<body>
<h1>$texto</h1>

<div id=\"menu\">
<ul>
   <font size=1>
  <li><a href=\"index.php\">P�gina inicial</a></li>
  <li><a href=\"intPrecios.php\">Introducir precios</a></li>
  <li><a href=\"verArti.php\">Lista de precios de un art�culo</a></li>
  <li><a href=\"verArti2.php\">Lista de precios de art�culos</a></li>
  </font>
</ul>  
</div>";
/*
<div id=\"contenido\">\n
</div>";
*/
}

function pie() 
{
    print '

<div id="pie">
<address>
2� D.A.W. 
</address>

</div>
</body>
</html>';
}
