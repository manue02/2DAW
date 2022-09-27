<?php
$z=array(
 0 => array (
 0 => 34,
 1 => 35,
 2 => 36,
 ),
1 => array (
0 => 134,
 1 => 135,
 2 => 136,
 )
);
foreach($z as $indice=>$valor) {
echo "Indice: ",$indice," Valor: ",implode(', ',$valor),"<br>";
};
foreach($z as $ind1=>$valor1) {
foreach($valor1 as $ind2=>$valorReal) {
 echo "Ind. 1: ",$ind1,"Ind. 2: ",$ind2," Valor: ",$valorReal,"<br>";
};
};
?> 