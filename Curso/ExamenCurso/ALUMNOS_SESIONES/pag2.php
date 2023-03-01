<?php
session_start();
$_SESSION['formato'] = $_POST['formato'];

echo "<form method='POST' action='pag1.php'>";
echo "el formato se ha cambiado a: <br>";
echo "<a href='pag1.php'>Ir a página 1</a>";
?>