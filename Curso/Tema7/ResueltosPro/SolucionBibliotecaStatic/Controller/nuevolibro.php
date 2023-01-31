
<?php
require_once("../Model/base.php");
$autores=Base::obtenerCombo("autores","id","nombre");
$idiomas=Base::obtenerCombo("idiomas","id","nombre");
$editoriales=Base::obtenerCombo("editorial","id","nombre");
/*echo "<pre>";
print_r($autores);
echo "</pre>";
echo "<pre>";
print_r($idiomas);
echo "</pre>";
echo "<pre>";
print_r($editoriales);
echo "</pre>";*/
require_once("../View/nuevolibro.php");
?>




