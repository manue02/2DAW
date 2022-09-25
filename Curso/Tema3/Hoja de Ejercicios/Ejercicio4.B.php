<?php


$numero =0;
  $filas=51; 
	$columnas=0; 
	print ("<table border=2 width=400 align=center>"); 
  
while ($filas>0){ 
		echo "<tr>"; 
		while ($columnas>0){
			echo "<td>"; 
			$numero++;
			print $numero; 
			print ("</td>"); 
			$columnas--; 

		} 
		$columnas=20; 
		echo "</TR>"; 
		$filas--; 
	}
	print "</table>"; 




?> 