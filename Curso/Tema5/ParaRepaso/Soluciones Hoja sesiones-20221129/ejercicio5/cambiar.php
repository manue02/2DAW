<?php
session_start();
if (!isset($_POST['enviar'])){
	$idiomaElegido=$_POST["idiomaElegido"];
	echo "Idioma".$idiomaElegido;
	echo "<form method='POST'>";
	echo "<br>Nivel<input type='text' name='nivel' value=".$_SESSION["niveles"][$idiomaElegido].">";
	echo "<input type='hidden' name='idioma' value=$idiomaElegido>";
	echo "<input type='submit' name='enviar' value=enviar></form>";
}
else
{
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
extract($_POST);

$_SESSION["niveles"][$idioma]=$nivel;
	header("Location:pag1.php");

	

}
?>