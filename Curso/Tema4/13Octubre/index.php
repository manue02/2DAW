<?php
include("array.php");


echo "<form action='VerTabla.php' method='POST'>
	  <select name='Ciudades'>";



foreach ($a as $Ciudades => $Contenido) {

    echo "<option> " . $Ciudades . "</option>";


}
echo "</select> <br>
    <input type='submit' value='Consultar'>
    </form>";


/*echo "<pre>";
print_r($a);
echo "<pre>";*/
?>