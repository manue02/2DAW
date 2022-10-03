<?php
include("arrays.php");



echo "<form action='VerVisitantes.php' method='POST'>
	  <select name='Ciudad'>;

      <option value ='0'> Todos </option>";  

foreach ($arrayciudades as $Ciudades => $NombreCiudades) {

    echo "<option> ". $NombreCiudades ."</option>";
 
    
    }
    echo "</select> <br>
    <input type='submit' value='Consultar'>
    </form>";

    



?>







