<?php
include("ArrayTipoB.php");
sort($trabajos);
echo "<form action='VerTrabajo.php' method='POST'>
	  <select name='Trabajos'>";  

foreach ($trabajos as $Desempeño) {

    echo "<option value='".$Desempeño."'>".$Desempeño."</option>";
 
    
    }
    echo "</select> <br>";

echo "<input type='radio' name='seleccion' value='Todos'>"."Todos los trabajadores"."<br>";
echo "<input type='radio' name='seleccion' value='Superiores'>"."Con estudios superiores"."<br>";
echo "<input type='radio' name='seleccion' value='Bajos'>"."Sin estudios superiores"."<br>";


    echo"
    <input type='submit' value='Consultar'>
    </form>";

    
echo "<pre>";
print_r($capacidades);
echo "<pre>";


?>







