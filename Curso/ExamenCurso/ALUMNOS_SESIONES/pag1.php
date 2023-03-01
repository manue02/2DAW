<?php
$arrayFormatos = array(1 => "normal", "b" => "Negrilla", "i" => "Cursiva", "u" => "Subrayado");
echo "Este texto sale ahora sale en formato: ";

echo "<form method='POST' ACTION='pag2.php'>
<br><p>Nuevo formato:
<select name='formato'>";
foreach ($arrayFormatos as $clave => $valor) {
    echo "<option value='$clave'>$valor</option>";
}

echo "</select><input type='submit' VALUE='Cambiar'></form>";



echo "<p><p><form method='POST' ACTION='pag3.php'>
<input type='submit' VALUE='Inicializar'></form>";


?>