<?php 
	
	
			include('funciones2.php');
			cabecera('Instituto');
			
			
				echo "<h3>Selecciona un módulo</h3>";
				echo "<form method='post' action=''>";
																		
				echo "<label>Módulos:</label><br>";
				echo "<select name='modulos'>";
					
					
				echo "</select><br>";
				
				echo "<label>Evaluación:</label><br>";
				echo "<select name='evaluacion'>";
					echo "<option value='todas'>Todas</option>";
					echo "<option value='1'>1ª</option>";
					echo "<option value='2'>2ª</option>";
					echo "<option value='3'>3ª</option>";
				echo "</select><br>";
				echo "<input type='submit' name='enviar' value='Aceptar'/>";
				echo "</form>";
				
	?>		