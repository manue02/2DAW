<?php
session_start();
if (isset($_SESSION['usuario']) &&  isset($_SESSION['password']))
	{if(isset($_POST['clr']))
         {  $selected_color= $_POST['clr'];

         // To show Hexadecimal code of the selected color 
         echo "El Color code is:  " . $selected_color;
		 $_SESSION['color']=$selected_color;
}
	?><form action="" method="post">
     Select you favorite color:
     <input name="clr" type="color">

     <input type="submit" name="submit">
	</form>
<?php }	
else 
{echo "sitio no autorizado";
	 }
	  echo '<a href="ejercicio2.php">Volver </a></br>';
?>
	 