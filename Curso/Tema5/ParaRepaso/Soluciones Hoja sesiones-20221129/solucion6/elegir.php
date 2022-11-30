<?php
    // Iniciamos sesion para capturar las variables
    session_start();
    // Preparamos las distintas opciones para los combos. Poniéndolos en un array
    // será fácil modificar el número de elementos
    $idioma=Array("Cine","Series","Deporte","Reality","Concursos","Informativos");
    $color=Array("Betis","Sevilla","Real Madrid","Barcelona");
	$swborrado=false;
	if(isset($_POST['borrar']))
		{
		unset($_SESSION['idioma']);
		unset($_SESSION['color']);
		$texto="Preferencias borradas";
		$swborrado=true;
		
		}
	if (!isset($_SESSION['idioma']))
	{
        
         $idio = $idioma[0];
         $clr = $color[0];
		 if (!$swborrado)
		 $texto="Seleccione preferencias";
    }
   else
   {
    $idio=$_SESSION['idioma'];
	$clr= $_SESSION['color'];
	if (!$swborrado)
		$texto="Preferencias Actuales";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ejercicio Sesiones</title>
    </head>
	<body>
        <form id='datos' action='ver.php' method='post'>
        <?php
		
		 
         echo $texto;	
                
        echo"<br>";
    
        echo"Programa TV:<br>";
        foreach($idioma as $i=>$value){
            echo" <input type='radio' name='idio' value='".$idioma[$i]."'";
            if($idioma[$i]==$idio) echo " checked ";
            echo">".$idioma[$i]."<br>";
        }
        echo"<br>";
		 echo"Equipo:<br>";
        echo"           <select name='clr'>";
        foreach($color as $i=>$value){
            echo"<option value='".$color[$i]."' ";
            if($color[$i]==$clr) echo " selected ";
            echo">".$color[$i]."</option>";
        }
        echo" </select> <br><br>     <input type='submit' value='Establecer opciones' name='enviar' />";


        echo"</form>";
        ?>
    </body>
</html>
