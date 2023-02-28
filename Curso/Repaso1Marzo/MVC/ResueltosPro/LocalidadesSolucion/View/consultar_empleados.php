<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ejercicio 2</title>        
       
    </head>
    <body>
	<h3 >Consultar Empleados</h3>
	
    <form action="../Controller/ver_empleados.php" method="post">
       
       Localidad:
         <select   name="localidad">
	<option value="0" selected>Todas</option>
             <?php   for ($i = 0; $i < count($arrayLocalidades);$i++) { ?>
                <option value="<?= $arrayLocalidades[$i] ?>"><?= $arrayLocalidades[$i] ?></option>
             <?php } ?>

         </select><br>
       
         
         <label for="horario">Horario:</label>
         <select  name="horario">
         <option value="Mañana">Mañana</option>
         <option value="Tarde">Tarde</option>
         <option value="ambas">Ambos</option>
         </select><br>
         
         <input type="submit" value="Aceptar">
    </form>
 



