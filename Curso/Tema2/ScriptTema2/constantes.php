<html> 
<head> 
</head> 
<body> 
<?php
	define("EurPta",166.386); 
	const PtaEur=1/166.386; 
	define("Cadena","12Esta constante es una cadena");
// comprobemos los valores 
	echo "Valor de la constante EurPta: ", EurPta, "<BR>"; 
	echo "Valor de la constante PtaEur: ". PtaEur . "<BR>"; 
	 echo "Valor de la constante Cadena: " . Cadena . "<BR>"; 
    echo "Valor de la constante Cadena x EurPta: " . Cadena*EurPta ."<br>"; 
?> 
</body>
</html>