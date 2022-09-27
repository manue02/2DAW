<?php 


print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">\n"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Datos personales 7 (Resultado). Controles en formularios. Ejercicios. 
</title>
  <link href="mclibre_php_soluciones.css" rel="stylesheet" type="text/css" 
  title="Color" />
</head>

<body>
<h1>Datos personales 7 (Resultado)</h1>
<?php
function recoge($var)
{ 
    if  (isset($_REQUEST[$var]))
		$tmp=strip_tags ($_REQUEST[$var]);
	else
		$tmp="";
    return $tmp;
}
$nombre      = recoge('nombre');
$apellidos   = recoge('apellidos');
$edad        = recoge('edad');
$peso        = recoge('peso');
$sexo        = recoge('sexo');
$estadoCivil = recoge('estadoCivil');
if ($nombre=="") {
    print "<p style=\"color:red\">No ha escrito su nombre.</p>\n";
} else {
    print "<p>Su nombre es <strong>$nombre</strong>.</p>\n";
}

if ($apellidos=="") {
    print "<p style=\"color:red\">No ha escrito sus apellidos.</p>\n";
} else {
    print "<p>Sus apellidos son <strong>$apellidos</strong>.</p>\n";
}

if ($edad=="1") {
    print "<p>Tiene <strong>menos de 20 años</strong>.</p>\n";
} elseif ($edad=="2") {
    print "<p>Tiene <strong>entre 20 y 39 años</strong>.</p>\n";
} elseif ($edad=="3") {
    print "<p>Tiene <strong>entre 40 y 59 años</strong>.</p>\n";
} elseif ($edad=="4") {
    print "<p>Tiene <strong>60 o más años</strong>.</p>\n";
} else {
    print "<p style=\"color:red\">No ha indicado su edad.</p>\n";
}

if ($peso=="") {
    print "<p style=\"color:red\">No ha escrito su peso.</p>\n";
} elseif (!is_numeric($peso)) { 
    print "<p style=\"color:red\">No ha escrito su peso como número.</p>\n";
} elseif ($peso<0) { 
    print "<p style=\"color:red\">Ha ecrito un peso negativo.</p>\n";
} else {
    print "<p>Su peso es de <strong>$peso</strong> Kg.</p>\n";
}

if ($sexo=="hombre") {
    print "<p>Es un <strong>hombre</strong>.</p>\n";
} elseif ($sexo=="mujer") {
    print "<p>Es una <strong>mujer</strong>.</p>\n";
} else {
    print "<p style=\"color:red\">No ha marcado su sexo.</p>\n";
}

if ($estadoCivil=="soltero") {
    print "<p>Su estado civil es <strong>soltero</strong>.</p>\n";
} elseif ($estadoCivil=="casado") {
    print "<p>Su estado civil es <strong>casado</strong>.</p>\n";
} elseif ($estadoCivil=="otro") {
    print "<p>Su estado civil no es <strong>ni soltero ni casado</strong>.</p>\n";
} else {
    print "<p style=\"color:red\">No ha marcado su estado civil.</p>\n";
}
$sw=0;
if (isset($_REQUEST['aficiones']))
{
foreach ($_REQUEST['aficiones']as $valor2)
	{if ($sw==0)
		{$cadena=$valor2;
		$sw=1;
		}
	else
		$cadena=$cadena.", ".$valor2;	
	}

    print "<p>Le gusta: \n";
    print "  <strong>$cadena</strong>.\n";
 }  
    else {
    print "<p style=\"color:red\">No ha marcado ninguna afición.</p>\n";
}

print "<p><a href=\"formulario.php\">Volver al formulario.</a></p>\n";
?>


</body>
</html>
