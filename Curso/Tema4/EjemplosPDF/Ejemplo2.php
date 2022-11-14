<?php
$a=array("a","b","c","d","e");
$b=array(
 "uno" =>"Primer valor",
 "dos" =>"Segundo valor", 
 "tres" =>"Tercer valor"
);
foreach($a as $indice=>$valor) {
 echo "Indice: ",$indice," Valor: ",$valor,"<br>";
};
foreach($b as $indice=>$valor) {
echo "Indice: ",$indice," Valor: ",$valor,"<br>";
};
?> 