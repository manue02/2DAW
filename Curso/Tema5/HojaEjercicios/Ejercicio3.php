<?php 
/*
Diseña una página que contenga un formulario y un script que permitan añadir datos a la
tabla1. Se
controlará antes de realizar la inserción si el DNI introducido existe en la tabla
*/

//Nos conectamso a la base de datos




$conexion=mysqli_connect("localhost","root","","Practicas")
or die ("No conecta");




echo '<form action=" " method="POST">
            <label>Apellido1</label>
			<input type="text" name="txtApellido1" id="txtApellido1" />
			<br />
            <label>Apellido2</label>
			<input type="text" name="txtApellido2" id="txtApellido2" />
			<br />
	
		<br />
		 <input type="submit" value="Consultar">
    </form>';

     
        $vapellidos = $_POST['txtApellido1'];
        $vapellidos2 = $_POST['txtApellido2'];
        
$sql = "SELECT Apellido1, Apellido2\n"

    . "\n"

    . "    FROM tablas1 \n"

    . "    WHERE Apellido1 LIKE '$vapellidos'\n"

    . "    OR   Apellido2 LIKE '$vapellidos2'";

 mysqli_query($conexion,$sql); 


 echo $sql;


 if (mysqli_errno($conexion)==0){echo "<h2>Consulta echa</b></H2>"; 

 }else{ 

if (mysqli_errno($conexion)==1062){echo "<h2>No se a podido hacer la cosulta</h2>"; 

}

} 






mysqli_close($conexion); 


?>







