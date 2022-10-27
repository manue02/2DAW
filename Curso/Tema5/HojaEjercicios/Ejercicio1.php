

<?php 
/*
Conectar con el servidor de bases de datos y
Seleccionar una base de datos
*/
$conexion=mysqli_connect("localhost","root","","Practicas")
or die ("No conecta");

/*
Guardar en una variable la instrucción que queremos ejecutar
*/
$consulta= "CREATE OR REPLACE TABLE `Practicas`.`Tablas1` 
( 'DNI' VARCHAR(9) NOT NULL , 
'nombre' VARCHAR(25) NOT NULL , 
'apellidos' VARCHAR(50) NOT NULL , 
'apellidos2' VARCHAR(50) NOT NULL ,
'fechaNacimiento' DATE NOT NULL , 
'Repetidor' ENUM('Si','No') , 
PRIMARY KEY ('DNI'));";


if(mysqli_query($conexion,$consulta)){

	print "Se ha creado la tabla<br>";

}else{

    print "Se ha producido un error al crear la tabla";

	 }


?>