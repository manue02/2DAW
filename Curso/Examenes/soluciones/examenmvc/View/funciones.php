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
  <link href=\"../view/css/miestilo.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>

<body>
<h1>$texto</h1>

<div id=\"menu\">
<ul>


   <font size=1>
  <li><a href='index1.php'>Página inicial</a></li>
  <li><a href='nuevo.php'>Introducción de Datos</a></li>
  <li><a href='consultar.php'>Consultar</a></li>  </font>
</ul>  
</div>";
}

function pie() 
{
    print '

<div id="pie">
<address>
2º D.A.W. 
</address>

</div>
</body>
</html>';
}
?>