<?php
function cabecera($texto) 
{
    print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
       \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
  <title>Menú - $texto</title>
  <link href=\"../View/miestilo.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>

<body>
<h1>$texto</h1>

<div id=\"menu\">
<ul>
   <font size=1>
  <li><a href=\"index.php\">Página inicial</a></li>
  <li><a href=\"introducir.php\">INTRODUCIR CONTACTOS</a></li>
  <li><a href=\"visualizar.php\">VER CONTACTOS</a></li>
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
    print '</div>

<div id="pie">
<address>
2º D.A.W. 
</address>

</div>
</body>
</html>';
}
