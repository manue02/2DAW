<?php
$base="ejemplos"; 
$tabla="demo4"; 
$conexion=mysqli_connect("localhost","root","",$base); 


mysqli_query
($conexion,"INSERT $tabla (DNI,Nombre,Apellido1,Apellido2, Nacimiento,Sexo,Hora,Fumador,Idiomas) VALUES ('1234','Lupicinio','Servidor','Servido','1954-11-23','P','16:24:52','N','2')"); 

#comprobamos el resultado de la insercion 
# el error CERO significa NO ERROR 
# el error 1062 significa Clave duplicada 
# en otros errores forzamos a que nos ponga el n�mero de error 
# y el significado de ese error (aunque sea en ingles).... 

if (mysqli_errno($conexion)==0){echo "<h2>Registro A�ADIDO</b></H2>"; 
             }else{ 
        if (mysqli_errno($conexion)==1062){echo "<h2>No ha podido a�adirse el registro<br>Ya existe un campo con este DNI</h2>"; 
            }else{ 
            $numerror=mysqli_errno($conexion); 
            $descrerror=mysqli_error($conexion); 
            echo "Se ha producido un error n� $numerror que corresponde a: $descrerror  <br>"; 
        } 

} 

# cerramos la conexion 

mysqli_close($conexion); 

?> 