<?php

session_start();

//si no existe la variable de sesion usuario, redirigimos a index.php para que inicie sesion primero y si no es admin, redirigimos a index.php
if (!isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'admin') {
    header('Location: ../../html/login.html');
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <link href="../../css/jquery-ui.css" rel="stylesheet" />

</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navCustom navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand girarLogo" href="../admin.php">
                <img src="../../assets/img/logo1.png" alt="Descripción de tu imagen" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="navbar-collapse collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="FormularioVerAsignacionProfesor.php">Listado
                            de clases</a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom" href="AsignarHoraAunaClase.php">Añadir Horario</a>
                    </li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="ListaDeReservas.php">Ver Reservas</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="añadirClase.php">Añadir Clase</a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom" href="añadirModalidad.php">Añadir Modalidad</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="EliminarClase.php">Eliminar clases</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom" href="RecuperarClase.php">Recuperar Clases</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="crearUsuario.php">Registrar Usuario</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom" href="añadirProfesor.php">Añadir profesor</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle me-lg-3" id="navbarDropdown2"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            href="EliminarUsuario.php">Eliminar usuarios</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item navCustom" href="RecuperarUsuario.php">Recuperar Usuarios</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



    <form id="frmAñadirModalidad" enctype="multipart/form-data" class="Customform container-fluid" autocomplete="off">
        <div id="focus"></div>
        <h1>Añadir una modalidad</h1>
        <input type="text" placeholder="Nombre de la Modalidad" autocomplete="off" id="NombreClase" name="NombreClase"
            class="ui-autocomplete-input">
        <input type="text" placeholder="Nombre de la Clase" autocomplete="off" id="NombreModalidad"
            name="NombreModalidad" class="ui-autocomplete-input">
        <span class="palta">Fecha Alta</span>
        <input type="date" half class="fecha " autocomplete="no" readonly name="fecha_alta" id="DateAlta">
        <input type="file" id="foto" name="subirFoto">
        <input class="buttonClass" type="submit" id="registrarClase" value="Dar de Alta">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../js/scripts.js"></script>

    <script src="../../js/scriptsNavBar.js"></script>


</body>

</html>