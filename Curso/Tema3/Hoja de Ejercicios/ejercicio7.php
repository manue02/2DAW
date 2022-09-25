<?php

 $numero1 = $_POST['num1'];
 $numero2 = $_POST['num2'];

 print ("<table border=2 width=400 align=center>"); 

for ($i=0; $i < $numero2 && $numero1 <= $numero2 ; $i++) { 
    echo "<td>"; 
    echo $numero1 . "<br>";
    $numero1++;

    print ("</td>"); 
    
}
print "</table>"; 

?> 