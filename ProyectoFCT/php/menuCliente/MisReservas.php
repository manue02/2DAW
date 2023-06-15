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
        <h1>Listado de Clases Mis Reservas</h1>
    </center>
    <br>
    <br>




    <?php
    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");
    session_start();

    $usuario = $_GET['usuario'];

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
        echo "<option value='0'>Elige una Opcion</option>";
        foreach ($arrayOpciones as $indice => $valor) {
            echo "<option value='" . $indice . "'>" . $valor . "</option>";
        }
        echo "</select></p>";
    }

    echo '<div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora de Entrada</th>
                    <th scope="col">Hora de Salida</th>
                    <th scope="col">Clase</th>
                    <th scope="col"><a href="../cliente.php"> <button type="button"
                                class="btn btn-info">Atras</button>
                        </a></th>';

    $arrayOpciones = obtenerArrayOpciones("modalidad", "NombreModalidad", "NombreModalidad");
    $arrayOpciones2 = obtenerArrayOpciones("clase", "id_clase", "nombre");

    //quitar los registros duplicados
    $arrayOpcionesSinRepetir = array_unique($arrayOpciones);

    echo '</th>';


    echo '<th>';
    echo "<form action='ListaDeMisReservasConFiltro.php' method='POST'>";

    pintarCombo($arrayOpcionesSinRepetir, "clase");

    echo "<input type='hidden' name='usuario' value='$usuario'>";
    echo "<input type='submit' value='Consultar'>
    </form>";
    echo '</th>';


    echo '</thead>';


    $sentecia2 = "SELECT id_clase FROM reserva WHERE email='$usuario'";
    $result = mysqli_query($conexion, $sentecia2);

    while ($row = mysqli_fetch_assoc($result)) {
        $ID_clase = $row['id_clase'];
        $sentecia3 = "SELECT clase.nombre FROM clase INNER JOIN reserva ON clase.id_clase = reserva.id_clase WHERE clase.id_clase = '$ID_clase'";
        $result2 = mysqli_query($conexion, $sentecia3);
        $row2 = mysqli_fetch_assoc($result2);
        $sentecia = "SELECT * FROM reserva WHERE id_clase='$ID_clase' AND email='$usuario'";

        $resultado = $conexion->query($sentecia) or die(mysqli_error($conexion));
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $fila['fecha'];
            echo "</td>";
            echo "<td>";
            echo $fila['horaEntrada'];
            echo "</td>";
            echo "<td>";
            echo $fila['horaSalida'];
            echo "</td>";
            if ($fila['compartida'] == 'no') {
                echo "<td>";
                echo $row2['nombre'];
                echo "</td>";
                echo "<td>";
                echo "<td><a href='modifReserva_fila1.php?no=" . $fila['id_reserva'] . "&usuario= " . $usuario . "'> <button type='button' class='btn btn-success'>Modificar Horario</button> </a></td>";
                echo "</td>";
                echo "<td>";
                echo "<form action='../consultasClientes/ModificarClaseInput.php' method='POST'>";

                pintarCombo($arrayOpciones2, "claseModificada");
                echo "<input type='hidden' name='usuario' value='$usuario'>";
                echo "<input type='hidden' name='id_reserva' value='" . $fila['id_reserva'] . "'>";
                echo "<input type='submit' value='Modificar Clase'>
            </form>";
                echo "</td>";
                echo "<td>";
                echo "<td><a href='eliminarReserva_fila1.php?no=" . $fila['id_reserva'] . "&usuario=" . $usuario . "'> <button type='button' class='btn btn-danger'>Eliminar Reserva</button> </a></td>";
                echo "</td>";
                echo "</tr>";
            } else {
                echo "<td>";
                echo $row2['nombre'];
                echo "</td>";
                echo "<td>";
                echo "Es una clase Compartida";
                echo "</td>";
            }

            // echo "<pre>";
            // print_r($fila);
            // echo "<pre>";
        }

    }

    ?>
    </table>
    </div>


</body>

</html>