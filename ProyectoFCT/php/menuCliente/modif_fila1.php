<?php



$consulta = ConsultarProducto($_GET['no']);
$usuario = $_GET['usuario'];


function ConsultarProducto($id)
{
    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");
    $sentencia = "SELECT * FROM disponibilidad WHERE id_disponibilidad=" . $id . "";

    $resultado = $conexion->query($sentencia) or die("Error al consultar producto" . mysqli_error($conexion));
    $fila = $resultado->fetch_assoc();

    $ID_clase = $fila['id_clase'];
    $sentecia3 = "SELECT clase.nombre FROM clase INNER JOIN disponibilidad ON clase.id_clase = disponibilidad.id_clase WHERE clase.id_clase = '$ID_clase'";

    $result2 = mysqli_query($conexion, $sentecia3);
    $row2 = mysqli_fetch_assoc($result2);


    return [
        $row2['nombre'],
        $fila['id_clase'],
        $fila['usuario'],
        $fila['entrada'],
        $fila['salida'],
    ];
}

?>
<!DOCTYPE html>
<html>

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
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link href="../../css/FormStyle.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />


</head>

<body>
    <div class="container">
        <div>
            <span>
                <h1>Añadir Clase</h1>
            </span>
            <br>
            <form id="frmAñadirClaseReserva" action="../consultasClientes/ConsultaModificarFila.php" method="POST">
                <input type="hidden" name="no" value="<?php echo $_GET['no'] ?>">
                <input type="hidden" name="usuario22" value="<?php echo $usuario ?>">
                <input type="hidden" name="id_clase" value="<?php echo $consulta[1] ?>">

                <label class="col-sm-4 col-form-label">Usuario: </label>
                <div class="col-sm-4">
                    <input type="text" id="Usuario" name="Usuario" value="<?php echo $usuario ?>"><br>
                </div>
                <label class="col-sm-4 col-form-label">Fecha Actual: </label>
                <div class="col-sm-4">
                    <input type="date" id="Fecha" name="Fecha" value="<?php echo date("Y-m-d"); ?>"><br>
                </div>
                <label class="col-sm-4 col-form-label">Hora de entrada: </label>
                <div class="col-sm-4">
                    <input type="text" id="Entrada" name="Entrada" value="<?php echo $consulta[3] ?>"><br>
                </div>
                <label class="col-sm-4 col-form-label">Hora de salida: </label>
                <div class="col-sm-4">
                    <input type="text" id="Salida" name="Salida" value="<?php echo $consulta[4] ?>"><br>
                </div>
                <label class="col-sm-4 col-form-label">Clase: </label>
                <div class="col-sm-4">
                    <input type="text" id="Clase" name="Clase" value="<?php echo $consulta[0] ?>"><br>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="ClasesDisponibles.php?usuario=<?php echo $usuario; ?>" class="btn btn-danger">Cancelar</a>

            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../js/scripts.js"></script>
    <script src="../../js/scriptsNavBar.js"></script>
</body>

</html>