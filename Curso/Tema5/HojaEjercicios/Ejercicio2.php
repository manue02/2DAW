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
//Nos conectamso a la base de datos
$conexion=mysqli_connect("localhost","root","","Practicas")
or die ("No conecta");

//Declaramos una array vacia 
//Declaramos un contador repetidores y un contador i
$arrayDnis=array();
$repetidores=0;
$i=0;

// Mientras que i no sea mayor que 100 le asignamos a la variable numero un numero aleatorio del 1 al 500 y 
// si no existe ese numero en la array de dni lo guardamos ese numero en la array y asi hasta que la i en incremoneto llega a 100
while ($i<100)
{
	$numero=rand(1,500);
	if (!in_array($numero,$arrayDnis))
		{
			$arrayDnis[]=$numero;
			$i++;
		}
}

//creamos un for que minetras la i no sea mayor a 100 va mentiendo en una variable cada numero que hay en el indice i de la variable arrayDnis
for ($i=0;$i<100;$i++)
{
$vdni=$arrayDnis[$i];

//mientras que la longitud de la cadena vdni sea mas chica que tres le mete un 0 al prinicipio
while (strlen($vdni)<3){

	$vdni="0".$vdni;
}


// ponemos todo lo que nos dice el enunciado 
 $vnombre="nom..".$vdni;
 $vapellidos="apel..".$vdni;
 $vapellidos2="apel2..".$vdni;
 $vdia=rand(2,20);
 $vmes=rand(1,12);
 $vanno=rand(1986,1999);
 $vrepite=rand(0,1);

 // si repite es igual a 0 que puede ser tanto 0 como 1 ya que lo hace aleatoriamente y si 
 // toca 0 en la variable repite que lo identificamos como que es repetidor y los repetidores no son mayor a 40 entonces entonces sustitulle ese 0 por una S si no le pones una N
 if ($vrepite==0 && $repetidores<40)
	{

		$repetidores++;
	$vrepite='S';
}
 else
	{
		$vrepite='N';
	}
	//esto es para la fecha para ponerlo con el formato que tu quieras
 $hoy = $vanno."-".$vmes."-".$vdia;

 mysqli_query($conexion,"INSERT INTO `tablas1`(DNI, nombre, Apellido1, Apellido2, Nacimiento, Repetidor) VALUES ('$vdni','$vnombre','$vapellidos','$vapellidos2',
 	'$hoy','$vrepite')"); 


if (mysqli_errno($conexion)==0){echo "<h2>Registro AÑADIDO</b></H2>"; 

             }else{ 

        if (mysqli_errno($conexion)==1062){echo "<h2>No ha podido añadirse el registro<br>Ya existe un campo con este DNI</h2>"; 

            }else{ 

            $numerror=mysqli_errno($conexion); 

            $descrerror=mysqli_error($conexion); 

            echo "Se ha producido un error  $numerror que corresponde a: $descrerror  <br>"; 

        } 



} 

}
mysqli_close($conexion); 


?>