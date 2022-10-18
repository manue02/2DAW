<?php
include("datos1.php");
sort($datos);
echo "<form action='VerTabla.php' method='POST'>
	  <select name='Modulos'>";  

foreach ($datos as $Nombre) {

    $contador = 0;

foreach($Nombre as $Datos){
    $resultado = array_unique($Nombre);


    if($contador == 0 && !isset($Nombre[0]) ){
        
        echo "<option value='".$resultado[$contador]."'>".$resultado[$contador]."</option>";
    }
   
        $contador++;
 
}
    
}
    echo "</select> <br>";

    echo"
    <input type='submit' value='Consultar'>
    </form>";

    echo "<pre>";
    print_r($modulos);
    echo "</pre>";
    
    echo "<pre>";
    print_r($datos);
    echo "</pre>";

?>







