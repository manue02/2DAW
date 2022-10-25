<?php 
/*
Crear un script que añada a la tabla1 100 registros de los cuales 40 serán repetidores y 60 no
repetidores:
 El DNI será un nº aleatorio entre 1 y 500.
 El nombre contendrá ‘nom..’ concadenado con el DNI generado rellenando con ceros por la
izquierda hasta una longitud de 3.
 El apellido contendrá ‘apel..’ concadenado con el DNI rellenado igual que el nombre.
 La fecha de nacimiento se generará aleatoriamente, dia entre 2 y 20, mes entre 1 y 12 y año entre
1986 y 1999.
 Se asignará aleatoriamente los 40 repetidores.
*/

$conexion=mysqli_connect("localhost","root","","Practicas")
or die ("No conecta");

$DNI = rand(1 , 500);

for ($i=0; $i <= 100; $i++) { 

    mysqli_query($conexion,"INSERT tablas1 (DNI) VALUES ('$DNI')"); 

}


if (mysqli_errno($conexion)==0){echo "<h2>Registro AÑADIDO</b></H2>"; 

}

else{ 

if (mysqli_errno($conexion)==1062){echo "<h2>No ha podido añadirse el registro<br>Ya existe un campo con este DNI</h2>"; 

}

else{ 

$numerror=mysqli_errno($conexion); 

$descrerror=mysqli_error($conexion); 

echo "Se ha producido un error no $numerror que corresponde a: $descrerror  <br>"; 

} 

} 

# cerramos la conexion 



mysqli_close($conexion); 


?>

