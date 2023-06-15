<?php

$consulta = ConsultarProducto($_GET['no']);

function ConsultarProducto($id)
{
    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");
    $sentencia = "SELECT * FROM reserva WHERE id_reserva=" . $id . "";

    $resultado = $conexion->query($sentencia) or die("Error al consultar producto" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();

    $ID_clase = $fila['id_clase'];
    $sentecia3 = "SELECT clase.nombre FROM clase INNER JOIN reserva ON clase.id_clase = reserva.id_clase WHERE clase.id_clase = '$ID_clase'";

    $result2 = mysqli_query($conexion, $sentecia3);
    $row2 = mysqli_fetch_assoc($result2);


    return [
        $row2['nombre'],
        $fila['id_clase'],
        $fila['horaEntrada'],
        $fila['horaSalida'],
    ];
}


$usuario = $_GET['usuario'];

$usuario = substr($usuario, 1);


?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8" />

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Fitness Zone - Sevilla</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../../js/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="../../js/alertifyjs/css/alertify.css">
        <script src="../../js/alertifyjs/alertify.js"></script>
        <script src="../../js/jquery-3.2.1.min.js"></script>
        <script src="../../js/jquery-ui-1.12.1.js"></script>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
            rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
            rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../../assets/img/logo2.png" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous" />
        <link href="../../css/FormStyle.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />


    </head>
</head>

<body>
    <div class="container">
        <div>
            <span>
                <h1>Modificar una Clase</h1>
            </span>
            <br>
            <form id="frmModificarClaseReserva" action="../consultasClientes/ConsultaModificarClase.php" method="POST">
                <input type="hidden" name="no" value="<?php echo $_GET['no'] ?>">
                <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                <input type="hidden" name="id_clase" value="<?php echo $consulta[1] ?>">
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Fecha Actual: </label>
                    <div class="col-sm-12">
                        <input type="date" id="Fecha" name="Fecha" value="<?php echo date("Y-m-d"); ?>"><br>
                    </div>
                </div>
                <label class="col-sm-2 col-form-label">Hora de entrada: </label>
                <div class="col-sm-4">
                    <input type="time" id="Entrada" name="Entrada" value="<?php echo $consulta[2] ?>"><br>
                </div>
                <label class="col-sm-2 col-form-label">Hora de salida: </label>
                <div class="col-sm-4">
                    <input type="time" id="Salida" name="Salida" value="<?php echo $consulta[3] ?>"><br>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="MisReservas.php?usuario=<?php echo $usuario; ?>" class="btn btn-danger">Cancelar</a>

            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../js/scripts.js"></script>
    <script src="../../js/scriptsNavBar.js"></script>
</body>

</html>