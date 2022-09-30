<?php
include("arrays.php");



echo "<form action='VerCiudades.php' method='POST'>
	  <select name='Ciudades'>;

      <option value ='0'> Todos </option>";  

foreach ($arraynombres as $Ciudades => $NombreCiudades) {

    echo "<option> ". $NombreCiudades ."</option>";
 
    
    }
    echo "</select> <br>
    <input type='submit' value='Consultar'>
    </form>";

    



?>







