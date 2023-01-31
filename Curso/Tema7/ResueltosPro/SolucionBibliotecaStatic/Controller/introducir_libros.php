
<?php
require_once("../Model/base.php");
extract($_POST);
if (empty($titulo))
		$errores[]="El título no puede estar vacio";
if ($aid==0)
		$errores[]="Debe especificar el autor";
if ($eid==0)
		$errores[]="Debe especificar la editorial";
if (!is_numeric($precio))
	$errores[]="El precio debe ser numérico";
if (isset($errores)){
	    $mensaje="";
		foreach ($errores as $unerror){
				$mensaje.=$unerror."<br>";}
}else {
		$instruccion="INSERT INTO libros(id_autor,id_idioma,id_editorial,titulo,precio)";
		$instruccion.="VALUES ($aid,$eid,$lid,'".$titulo."',$precio)";
		if (Base::insertDatos($instruccion))
			$mensaje="Libro dado de alta";
		else
			$mensaje="fallo en Insert";
		
	}	

require_once("../View/mensaje_insercion.php");
?>




