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
    <center>
        <h1>Listado de Reservas</h1>
    </center>
    <br>
    <br>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");

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
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha</th>
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
    echo "<form action='ListaDeReservasConFiltro.php' method='POST'>";

    pintarCombo($arrayOpcionesSinRepetir, "clase");
    echo "<input type='submit' value='Consultar'>
                </form>";
    echo '</th>
                </thead>';



    $sentecia2 = "SELECT DISTINCT id_clase FROM reserva";
    $result = mysqli_query($conexion, $sentecia2);
    while ($row = mysqli_fetch_assoc($result)) {
        $ID_clase = $row['id_clase'];
        $sentecia3 = "SELECT clase.nombre FROM clase INNER JOIN reserva ON clase.id_clase = reserva.id_clase WHERE clase.id_clase = '$ID_clase'";
        $result2 = mysqli_query($conexion, $sentecia3);
        $row2 = mysqli_fetch_assoc($result2);
        $nombreClase = $row2['nombre'];

        $sentecia = "SELECT id_reserva, email, fecha, horaEntrada,horaSalida  FROM reserva WHERE id_clase='$ID_clase'";
        $resultado = $conexion->query($sentecia) or die(mysqli_error($conexion));
        while ($fila = $resultado->fetch_assoc()) {


            echo "<tr>";
            echo "<td>";
            echo $fila['id_reserva'];
            echo "</td>";
            echo "<td>";
            echo $fila['email'];
            echo "</td>";
            echo "<td>";
            echo $fila['fecha'];
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
    ?>
    </table>
    </div>
</body>

</html>