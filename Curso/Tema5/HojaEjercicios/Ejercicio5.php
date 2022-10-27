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
			<label>DNI</label>
			<input type="text" name="txtDNI" id="txtDNI" />
			<br />
            <label>nombre</label>
			<input type="text" name="txtNombre" id="txtNombre" />
			<br />
            <label>Apellido1</label>
			<input type="text" name="txtApellido1" id="txtApellido1" />
			<br />
            <label>Apellido2</label>
			<input type="text" name="txtApellido2" id="txtApellido2" />
			<br />
            <label>Nacimiento</label>
			<input type="date" name="txtNacimiento" id="txtNacimiento" />
			<br />
            <label>Repetidor</label>
            <br />
		
		<br />
		<br />
		 <input type="submit" value="Consultar">
    </form>';

        $vdni = $_POST['txtDNI'];
        $vnombre = $_POST['txtNombre'];
        $vapellidos = $_POST['txtApellido1'];
        $vapellidos2 = $_POST['txtApellido2'];
        $hoy = $_POST['txtNacimiento'];

        $sql = "UPDATE `tablas1` SET `nombre`='$vnombre',`Apellido1`='$vapellidos',`Apellido2`='$vapellidos2',`Nacimiento`='$hoy 'WHERE `DNI`= $vdni";

        mysqli_query($conexion,$sql); 
       
 

mysqli_close($conexion); 


?>