<?php
include("array.php");
$arrayDePosicion = array();
if (!isset($_POST['envio'])) {
    echo "<form name='formulario' method='POST'>";
    foreach ($futbolista as $indice => $valor) {
        if (isset($valor["posicion"])) {
            if (!in_array($valor["posicion"], $arrayDePosicion)) {
                $arrayDePosicion[] = $valor["posicion"];

                $indice = $valor["posicion"];

                echo "<input type='checkbox' name='seleccion[]' value=$indice>" . $valor["posicion"] . "<br>";

            }
        }

    }
    echo "<input type='submit' name='envio' value='consultar'></form>";

} else {
    if (isset($_POST['seleccion'])) {

        echo "<pre>";
        print_r($_POST['seleccion']);
        echo "</pre>";

        foreach ($futbolista as $indice => $valor) {
            if (isset($valor["posicion"])) {
                if (in_array($valor["posicion"], $_POST['seleccion'])) {

                    foreach ($valor as $indice2 => $valor2) {

                        //solo el nombre del furbolista  y la posicion
                        if ($indice2 == "posicion") {
                            echo $indice . " : " . $valor2 . "<br>";
                        }

                    }
                }
            }
        }


    }
}


?>

</html>
</body>