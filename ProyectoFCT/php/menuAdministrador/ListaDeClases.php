<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <title></title>
    <script src="../../js/scripts.js"></script>

</head>



<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");

    $Email = $_POST['Email'];

    echo "<center>
    <h1>Listado de Clases del Profesor: " . $Email . "</h1>
</center>
<br>
<br>";



    function obtenerArrayOpciones($tabla, $guarda, $muestra)
    {
        global $conexion;
        $arrayCombo = array();
        $sql = "SELECT DISTINCT $guarda,$muestra FROM $tabla order by $muestra";
        $resultado = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $indice = $row[$guarda];
            $arrayCombo[$indice] = $row[$muestra];
        }
        return $arrayCombo;
    }


    function pintarCombo($arrayOpciones, $nombreCombo)
    {
        echo "<p><select id='comboClases' name='" . $nombreCombo . "'>";
        echo "<option value='0'>Elige una modalidad</option>";
        foreach ($arrayOpciones as $indice => $valor) {
            echo "<option value='" . $indice . "'>" . $valor . "</option>";
        }
        echo "</select></p>";
    }


    echo '<div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Hora de Entrada</th>
                    <th scope="col">Hora de Salida</th>
                    <th scope="col">Clase</th>
                    <th scope="col"><a href="../menuAdministrador/FormularioVerAsignacionProfesor.php"> <button type="button"
                                class="btn btn-info">Atras</button>
                        </a></th>';

    $arrayOpciones = obtenerArrayOpciones("modalidad", "NombreModalidad", "NombreModalidad");
    //quitar los registros duplicados
    $arrayOpcionesSinRepetir = array_unique($arrayOpciones);
    echo '<th>';
    echo "<form action='ListaDeClasesConFiltro.php' method='POST'>";

    pintarCombo($arrayOpcionesSinRepetir, "clase");
    echo "<input type='hidden' name='email' value='$Email'>";

    echo "<input type='submit' value='Consultar'>
    </form>";
    echo '</th>
    </thead>';




    $consultaIdprofesor = "SELECT DISTINCT id_clase FROM profesores WHERE usuario like '%" . $Email . "%'";

    $resultIdprofesor = mysqli_query($conexion, $consultaIdprofesor);
    while ($rowIdprofesor = mysqli_fetch_assoc($resultIdprofesor)) {
        $idProfesor = $rowIdprofesor['id_clase'];
        $auxliar = $idProfesor;

        $sentecia3 = "SELECT DISTINCT clase.nombre FROM clase INNER JOIN reserva ON clase.id_clase = reserva.id_clase WHERE clase.id_clase = '$auxliar'";

        $result2 = mysqli_query($conexion, $sentecia3);
        $row2 = mysqli_fetch_assoc($result2);
        $nombreClase = $row2['nombre'];

        //si hay email se ejecuta la consulta 
        if ($_POST['Email'] != "") {
            $sentecia = "SELECT DISTINCT * FROM reserva WHERE id_clase='$auxliar' ";

            $resultado = $conexion->query($sentecia) or die(mysqli_error($conexion));
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";

                echo "<td>";
                echo $fila['email'];
                echo "</td>";
                echo "<td>";
                echo $fila['horaEntrada'];
                echo "</td>";
                echo "<td>";
                echo $fila['horaSalida'];
                echo "</td>";
                echo "<td>";
                echo $nombreClase;
                echo "</td>";
                echo "</tr>";
            }
        }

    }


    ?>
    </table>
    </div>


</body>

</html>