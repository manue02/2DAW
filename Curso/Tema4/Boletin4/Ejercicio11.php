<?php 
$actualizacion = array (
array(
'id' => '45123',
'precio' => '18.75'
),
array(
'id' => '02548',
'precio' => '12.50'
),
array(
'id' => '78500',
'precio' => '25.99'
),
array(
'id' => '97455',
'precio' => '18.15' ));
$discos = array(
array('20364','The Dark Side of the Moon','Pink Floyd','14.75'),
array('45123','A Night at the Opera','Queen','14.75'),
array('78500','A Hard Day\'s Night','The Beatles','13.99'),
array('01841','Led Zeppelin II','Led Zeppelin','18.54'),
array('02548','Load','Metallica','14.50'),
array('97455','Resistance','Muse','19.99'),
array('12544','Synchronicity','The Police','14.85') );
############################
echo "Antes de actualizar<br>";
echo "<pre>";
print_r($discos);
echo "</pre>";	
foreach ($actualizacion as $fila){
	//encontrar en $discos $fila["id"]
	foreach ($discos as  $indice=>$datosDisco){
		if ($datosDisco[0]==$fila["id"])
			$discos[$indice][3]=$fila["precio"];
	}

}
echo "Después de actualizar<br>";
echo "<pre>";
print_r($discos);
echo "</pre>";	
?>