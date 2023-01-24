<?php
include("array1.php");

echo "<form action='VerDatos.php' method='POST'>
	  <select name='Datos'>";


//mostrar un combo para que muestre los nombres de los alumnos y al seleccionar uno muestre los datos de ese alumno en la siguiente página (VerDatos.php) 

foreach ($datos as $nombre => $valor) {
    echo "<option value='$nombre'>$nombre</option>";
}

echo "</select>
      <input type='submit' value='Enviar'>
      </form>";



?>