<?php 
/*
Conectar con el servidor de bases de datos y
Seleccionar una base de datos
*/
$conexion=mysqli_connect("localhost","root","","ejemplos")
or die ("No conecta");
/*
Guardar en una variable la instrucción que queremos ejecutar
*/
$consulta="SELECT id as clave,titulo,texto  FROM noticias ";
/*Enviar la instrucción SQL a la base de datos*/
$resultado=mysqli_query($conexion,$consulta);
/* $resultado es un objeto de la clase mysqli_result
(basicamente un cursor) la cual tiene incorporados métodos
para su manejo*/
//Obtener y procesar los resultados (bucle de recorrido del cursor)
$fila=mysqli_fetch_array($resultado);
while ($fila){
	/*echo "<p>".$fila["clave"].",".$fila["titulo"].
	",".$fila["texto"]."</p>";*/

	echo "<pre>";
	print_r($fila);
	echo "</pre>";

	$fila=mysqli_fetch_array($resultado);
}





?>