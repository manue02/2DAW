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

    $email = $_GET['usuario'];
    $contador = 0;


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


    $consulta = "SELECT * FROM `reserva` INNER JOIN clase ON clase.id_clase = reserva.id_clase WHERE `email` = '$email' and compartida = 'si'";


    $result = mysqli_query($conexion, $consulta);

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
        echo " te han compartido esta clase  " . $fila['EmailEmisor'];
        echo "</td>";
        echo "</tr>";

        $contador++;
    }

    if ($contador >= 0) {

        $consulta2 = "SELECT * FROM `reserva` INNER JOIN clase ON clase.id_clase = reserva.id_clase WHERE `EmailEmisor` = '$email' and compartida = 'si'";
        $result2 = mysqli_query($conexion, $consulta2);

        while ($fila2 = mysqli_fetch_assoc($result2)) {
            echo "<tr>";
            echo "<td>";
            echo $fila2['fecha'];
            echo "</td>";
            echo "<td>";
            echo $fila2['horaEntrada'];
            echo "</td>";
            echo "<td>";
            echo $fila2['horaSalida'];
            echo "</td>";
            echo "<td>";
            echo $fila2['nombre'];
            echo "</td>";
            echo "<td>";
            echo " le has compartido esta clase a " . $fila2['email'];
            echo "</td>";
            echo "</tr>";
        }
    }




    ?>

    </table>
    </div>
</body>

</html>