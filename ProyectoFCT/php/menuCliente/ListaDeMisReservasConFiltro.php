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
        <h1>Listado de Clases Con Filtro</h1>
    </center>
    <br>
    <br>

    <?php

    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");

    $clase = $_POST['clase'];
    $ussuario = $_POST['usuario'];

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
    $arrayOpciones2 = obtenerArrayOpciones("clase", "id_clase", "nombre");

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
    </a></th>
                </thead>';

    //muestrame todas todos los id_clase que tengan la misma modalidad que la que he seleccionado de la tabla modalidad
    
    $consulta = "SELECT reserva.horaEntrada, reserva.horaSalida, clase.nombre, reserva.id_reserva, reserva.fecha FROM modalidad INNER JOIN clase ON modalidad.ID_clase=clase.id_clase INNER JOIN reserva ON clase.id_clase=reserva.id_clase  WHERE  modalidad.NombreModalidad='$clase' AND reserva.email='$ussuario'";

    $result = mysqli_query($conexion, $consulta);

    $datos = array();

    while ($fila = mysqli_fetch_assoc($result)) {
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
        echo "<td>";
        echo $fila['nombre'];
        echo "</td>";
        echo "<td>";
        echo "<td><a href='modifReserva_fila1.php?no=" . $fila['id_reserva'] . "&usuario= " . $ussuario . "'> <button type='button' class='btn btn-success'>Modificar Horario</button> </a></td>";
        echo "</td>";
        echo "<td>";
        echo "<form action='../consultasClientes/ModificarClaseInput.php' method='POST'>";

        pintarCombo($arrayOpciones2, "claseModificada");
        echo "<input type='hidden' name='usuario' value='$ussuario'>";
        echo "<input type='hidden' name='id_reserva' value='" . $fila['id_reserva'] . "'>";
        echo "<input type='submit' value='Modificar Clase'>
        </form>";
        echo "</td>";
        echo "<td>";
        echo "<td><a href='eliminarReserva_fila1.php?no=" . $fila['id_reserva'] . "'> <button type='button' class='btn btn-danger'>Eliminar Reserva</button> </a></td>";
        echo "</td>";
        echo "</tr>";
    }
    ?>

    </table>
    </div>
</body>

</html>