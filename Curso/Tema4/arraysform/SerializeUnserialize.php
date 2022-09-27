<?php
 
if(!isset($_POST['frutas'])  ) {
// Creamos el array frutas
$frutas[] = "Cereza";
$frutas[] = "Pera";
$frutas[] = "Fresa";
$frutas[] = "Manzana";
} else {
// si existe lo deserializamos para poder tratarlo
$frutas = unserialize($_POST['frutas']);
echo "<pre>";
print_r($frutas);
echo "<pre>";
}
?>
<html>
<form method="POST">
<input type="hidden" name="frutas" value='<?php echo serialize($frutas) ?>'></input>
<input type="submit" value="Pasar">
</form>
</html></pre>