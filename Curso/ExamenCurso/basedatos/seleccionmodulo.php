<html>

<head>
    <title> Gestión de aulas </title>
</head>

<body>
    <h1>Gestión de aulas</h1>
    <?php

    include("funcionesBD.php");

    $arraydeOpciones = obtenerArrayOpciones('modulos', 'curso', 'departamento');

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $departamentoNumero = $_POST['departamento'];

    //dame el nombre del departamento
    
    $sql = "SELECT departamento FROM modulos WHERE curso = " . $_POST['departamento'];

    $resultado = ejecutarConsulta($sql);
    $fila = $resultado->fetch_assoc();
    $departamento = $fila['departamento'];

    $condicionArray = " departamento =  '$departamento' ";


    $ArrayFiltrado = obtenerArrayOpcionesFiltrado('modulos', 'departamento', 'curso', $condicionArray);

    echo "<form method='POST' action='mostrar.php'>";
    echo "Modulos del departamento:" . $departamento;

    pintarCombo($ArrayFiltrado, 'CodigosDepartamento');


    echo "<input type='hidden' name='departamento' value='$departamentoNumero' />";
    echo '<table border="0"><tr><td><input type="submit" name="submit2" value="Enviar" ';
    echo '</td></tr></table></form> ';
    ?>
</body>

</html>