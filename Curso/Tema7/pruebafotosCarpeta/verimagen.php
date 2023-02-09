<?php
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'pruebafotos') or die(mysqli_error($db));
$dir="images/";
$sql = "SELECT personas.dni,personas.nombre,images.image_id,images.image_filename\n"

    . "FROM personas LEFT JOIN images ON personas.dni=images.image_id ";
$resultado=$db->query($sql);
while ($fila=$resultado->fetch_assoc()){

	extract($fila);
	$cadena="<p>".$dni.",".$nombre;
	if ($image_id==NUll)
		$foto=$dir."sinfoto.gif";
	else
		$foto=$dir.$image_filename;
	$cadena.="<img src='".$foto."'>";
	echo $cadena;

}

?>