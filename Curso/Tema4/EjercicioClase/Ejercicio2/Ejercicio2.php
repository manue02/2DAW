<?php

include("arrays.php");

$Cursos = array();

echo "<form action='Consultar.php' method='POST'>";

    echo '<table bgcolor="#E9FFFF" align=center border=2>';
    echo'<tr>';
    echo '<td align="left">Ense&ntilde;anza: </td>';
    echo "<td><select name='Notas'>";
    echo "<option value='todos'>Todos</option>";

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

echo '<tr><td align="left" colspan=2><input type="submit" value="Consultar">';
    echo '</td></tr></table></form>';

?>