
<?php
$base="ejemplos";
while($v=mysqli_fetch_assoc ($resultado)){
	foreach($v as $clave=>$valor) {
	      echo  $clave." , ".$valor,"<br>";
     }
}
?> 