<?php
 if ($_POST['accion']=='S')
 {
 $conexion = mysqli_connect("localhost", "root", "","filmoteca");
  mysqli_set_charset($conexion,"utf8");
   $sql = "UPDATE  peliculas SET fecha=".$_POST['fecha']." WHERE id=".$_POST['id'];
 //echo $sql;
  if (@mysqli_query($conexion,$sql)) {
    echo("<p>Se actualizó la fecha</p>");
	

  } else {
    echo("<p>Error : " .
         mysqli_error($conexion) . "</p>");
  }
 }
 else
	{ echo("<p>Se canceló la operación</p>");}
 echo '<p><a href="admin.html">vuelta a la home</a></p>';
?>