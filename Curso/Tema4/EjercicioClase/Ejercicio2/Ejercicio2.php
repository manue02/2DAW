<?php

include("arrays.php");

$Cursos = array();

echo "<form action='Consultar.php' method='POST'>
	  <select name='Notas'>

      <option value ='0'> Todos </option>";  

foreach ($arrayNotas as $Nombres => $Asignatura) {
	

	foreach ($Asignatura as $NombreAsig => $Notas) {

        if (in_array($NombreAsig, $Cursos) == NULL){

            $Cursos[] = $NombreAsig;
        }       
    }
}

foreach ($Cursos as $Curso) {
            
    echo "<option> ". $Curso ."</option>";

}

echo "</select> <br>
<input type='submit' value='Consultar'>


</form>";


?>