<?php
include("ejer2.php");

echo "<form  method='POST'>";
	 

foreach ($generos as $Valor) {

	echo "<tr><td><input type='checkbox' name='Seleccion_generos' option>$Valor</td><br></tr>";

    }
   echo"
    <input type='submit' value='Consultar'>
    </form>";

    if(!isset ($_POST['Seleccion_generos'])){

        echo "No has seleccionado ningun valor";
    }



?>







