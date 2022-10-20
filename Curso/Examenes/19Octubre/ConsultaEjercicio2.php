<?php
include("ejer2.php");

echo "<form  method='POST'>";

	 $ArrayGeneros = array();


foreach ($generos as $Valor) {

	echo "<tr><td><input type='radio' name='Seleccion_generos'  option>$Valor</td><br></tr>";

    }

   echo"
    <input type='submit' name = 'enviar' value='Consultar'>
    </form>";


    if(!isset ($_POST['Seleccion_generos'])){

        echo "No has seleccionado ningun valor";
    }

else{

   


        $seleccionado = $_POST['Seleccion_generos'];

        echo "<table border='1'>
        <option>Peliculas de $seleccionado</option>
";

    }

 

    echo "</tr>
    </table>";
?>







