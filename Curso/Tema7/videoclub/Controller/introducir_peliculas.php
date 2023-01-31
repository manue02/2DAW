
<?php
require_once("../Model/base.php");


$titulo = $_POST["titulo"];
$contador = 0;
$arrayTareas = ["Actor Principal","Actor Secundario","Actriz Principal","Actriz Secundaria","Director","Productor"];

if(!empty($_POST))
{
    $nombrePeli = $_POST["titulo"];
    echo $nombrePeli . "<br>";
    foreach ($_POST as $key => $valor){
        if($key != "titulo")
        {
            if($key != "Insertar")
            {
                $arrayNombres[] = $valor;
            }

        }

    }
    $contador++;
    $algo = miClase::insertDatos($titulo,$arrayTareas,$arrayNombres);
    }
echo "<pre>";
print_r($algo);
echo "</pre>";
$arrayTareas = miclase::obtenerTareas();

require_once("../View/introducir_peliculas.php");

?>




