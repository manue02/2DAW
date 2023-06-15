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


    echo '<div class="container">
<table class="table">
    <thead>
        <tr>
            
            <th scope="col">Usuario</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora de Entrada</th>
            <th scope="col">Hora de Salida</th>
            <th scope="col">Clase</th>
                </thead>';

    //muestrame todas todos los id_clase que tengan la misma modalidad que la que he seleccionado de la tabla modalidad
    
    $consulta = "SELECT email, fecha, horaEntrada, horaSalida,nombre FROM modalidad INNER JOIN clase ON modalidad.ID_clase=clase.id_clase INNER JOIN RESERVA ON clase.id_clase=reserva.id_clase WHERE modalidad.NombreModalidad='$clase'";

    $result = mysqli_query($conexion, $consulta);

    $datos = array();

    while ($fila = mysqli_fetch_assoc($result)) {
        echo "<tr>";
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
        echo $fila['nombre'];
        echo "</td>";
        echo "</tr>";
    }







    ?>

    </table>
    </div>
</body>

</html>