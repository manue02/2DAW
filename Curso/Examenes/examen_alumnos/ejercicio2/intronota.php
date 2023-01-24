<?php 
	
	
			include('funciones1.php');
			cabecera('Instituto');
			
		
		echo "<h3>Selecciona un módulo</h3>";
		echo "<form method='post' action=''>";
																
		echo "<label>Módulos:</label><br>";
		echo "<select name='modulos'>";
			
		
		echo "</select><br>";
		
		echo "<input type='submit' name='enviar' value='Aceptar'/>";
		echo "</form>";
		
		
		
				
				echo "<h3>Selecciona un alumno y su nota</h3>";
				
				echo "<form method='post' action=''>";
				echo "<label>Alumnos:</label><br>";
				echo "<select name='alumnos'>";
					
				
					
				echo "</select><br>";
				
				echo "<label>Evaluación:</label><br>";
				echo "<select name='evaluacion'>";
					echo "<option value='1'>1</option>";
					echo "<option value='2'>2</option>";
					echo "<option value='3'>3</option>";
				echo "</select><br>";
				
				echo "<label>Nota:</label><br>";
				echo "<select name='nota'>";
					echo "<option value='0'>0</option>";
					echo "<option value='1'>1</option>";
					echo "<option value='2'>2</option>";
					echo "<option value='3'>3</option>";
					echo "<option value='4'>4</option>";
					echo "<option value='5'>5</option>";
					echo "<option value='6'>6</option>";
					echo "<option value='7'>7</option>";
					echo "<option value='8'>8</option>";
					echo "<option value='9'>9</option>";
					echo "<option value='10'>10</option>";
				echo "</select><br>";	
				
				echo "<input type='submit' name='envio' value='Enviar'/>";
				echo "</form>";
			
		
		
?>
