<?php
$base="ejemplos"; 
$tabla="demo4"; 

$v1="9876545"; 
$v2="Gonzalo"; 
$v3="Fern�ndez"; 
$v4="del Campo"; 
$v5="1957/11/21"; 
$v6="M"; 
$v7=date("h:i:s"); 
$v8="S"; 
$v9=7; 

$c=mysqli_connect("localhost","root","",$base); 



mysqli_query($c,"INSERT $tabla (DNI,Nombre,Apellido1,Apellido2, Nacimiento,Sexo,Hora,Fumador,Idiomas) VALUES ('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8',$v9)"); 

#comprobamos el resultado de la insercion 
# el error CERO significa NO ERROR 
# el error 1062 significa Clave duplicada 
# en otros errores forzamos a que nos ponga el n�mero de error 
# y el significado de ese error (aunque sea en ingles).... 


if (mysqli_errno($c)==0){echo "<h2>Registro A�ADIDO</b></H2>"; 
             }else{ 
        if (mysqli_errno($c)==1062){echo "<h2>No ha podido a�adirse el registro<br>Ya existe un campo con este DNI</h2>"; 
            }else{ 
            $numerror=mysqli_errno($c); 
            $descrerror=mysqli_error($c); 
            echo "Se ha producido un error n� $numerror que corresponde a: $descrerror  <br>"; 
        } 

} 

# cerramos la conexion 

mysqli_close($c); 

?> 
