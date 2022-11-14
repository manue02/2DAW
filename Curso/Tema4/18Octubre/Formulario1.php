<?php
include("datos1.php");
sort($datos);
echo "<form action='VerTabla.php' method='POST'>
	  <select name='Modulos'>";

foreach ($datos as $Nombre => $valor) {

  $resultado[] = $valor[0];

}
$resultados = array_unique($resultado);

foreach ($resultados as $indice => $nombre) {
  # code...

  echo "<option>" . $nombre . "</option>";
}

echo "</select> <br>";

echo "
    <input type='submit' value='Consultar'>
    </form>";

//echo "<pre>";
//print_r($modulos);
//echo "</pre>";

//echo "<pre>";
//print_r($datos);
//echo "</pre>";

?>